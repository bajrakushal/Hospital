<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit(User $user)
    {
        return view('Admin.patient.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password= $request->password;
        $user->status= $request->status;
        $user->update();
        return redirect('/admin/patient')->with('status', 'Data Updated!');

    }
    public function viewProfile($id)
    {
        $role= auth()->user()->role;
        if($role == 'doctor'){
            $users = Doctor::with('user')->where('user_id',$id)->first();
            return view('Settings.doctor',compact('users'));
        }
        elseif($role == 'patient')
        {
            $users = User::where('id',$id)->first();
            return view('Settings.user',compact('users'));
        }
        elseif($role == 'admin')
        {
            $users = User::where('id',$id)->first();
            return view('Settings.admin',compact('users'));
        }
        
    }
    public function editProfile($id)
    {
        $role= auth()->user()->role;
        if($role == 'doctor'){
            $users = Doctor::with('user')->where('user_id',$id)->first();
            return view('Settings.doctorEdit',compact('users'));
        }
        elseif($role == 'patient')
        {
            $users = User::where('id',$id)->first();
            return view('Settings.userEdit',compact('users'));
        }
        elseif($role == 'admin')
        {
            $users = User::where('id',$id)->first();
            return view('Settings.adminEdit',compact('users'));
        }
    }
    public function profileUpdate(Request $request, Doctor $doctor)
    {
        $validate = request()->validate([
            'doc_image' => 'mimes:png,jpg,jpeg',
            'specialization' => 'required',
            'qualification' => 'required',
            'service_charge' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

            if($request->has('doc_image'))
            {
                Storage::delete($doctor->doc_image);
                $image = $request->file('doc_image');
                $filename = $image->getClientOriginalName();
                $image->move(public_path('/storage/Doctor/'), $filename);
                $doctor->doc_image = $request->file('doc_image')->getClientOriginalName();
            }
            $doctor->specialization= $request->specialization;
            $doctor->qualification= $request->qualification;
            $doctor->service_charge= $request->service_charge;
            $doctor->update();
            $profile=User::with('doctors')->where('id', $doctor->user_id)->first();
            $date=Carbon::now();
            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->phone = $request->phone;
            $profile->password = bcrypt($request->password);
            $profile->role = "doctor";
            $profile->email_verified_at = $date;
            $profile->update();
            return redirect('/profile/'.$profile->id)->with('success','Profile Updated Successfully');
        
    }
        
    
    public function userUpdate(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email,'.$id,
            'phone' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect('/profile/'.$user->id)->with('success','Profile Update Successfully');
    }

    public function adminUpdate(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email'=> 'required|unique:users,email,'.$id,
            'password' => 'min:4|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:4',
        ]);
        $user = User::findOrFail($id);
        $user->name = ucwords($request->name);
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->update();
        return redirect('/profile/'.$user->id)->with('success','Profile Update Successfully');
    }
    
}
