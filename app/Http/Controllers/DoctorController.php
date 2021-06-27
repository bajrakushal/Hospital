<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Comment\Doc;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('Admin.Doctor.index',compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'doc_image' => 'required|mimes:png,jpg,jpeg',
            'specialization' => 'required',
            'qualification' => 'required',
            'service_charge' => 'required',
            'name' => 'required',
            'email'=> 'required|unique:users',
            'phone' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $date=Carbon::now();
        $doc_details = new User();
        $doc_details->name = $request->input('name');
        $doc_details->email = $request->input('email');
        $doc_details->phone = $request->input('phone');
        $doc_details->password = bcrypt($request->input('password'));
        $doc_details->role = "doctor";
        $doc_details->email_verified_at = $date;
        $doc_details->save();

        $doctor=new Doctor();
        $doctor->user_id=$doc_details->id;
        if ($request->hasFile('doc_image'))
        {
            $image = $request->file('doc_image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('/storage/Doctor/'),$filename);
            $doctor->doc_image = $request->file('doc_image')->getClientOriginalName();
        }
        $doctor->specialization= $request->input('specialization');
        $doctor->qualification= $request->input('qualification');
        $doctor->service_charge= $request->input('service_charge');
        $doctor->save();
        return redirect('/admin/doctor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $doctor = Doctor::findorfail($doctor->id);
        return view('Admin.Doctor.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $validate = request()->validate([
            'doc_image' => 'mimes:png,jpg,jpeg',
            'specialization' => 'required',
            'qualification' => 'required',
            'service_charge' => 'required',
            'name' => 'required',
            'email'=> 'required|unique:users,email,'.$doctor->user->id,
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
        return redirect('/admin/doctor')->with('status', 'Data inserted!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        DB::table('users')->where('user_id',$doctor->id)->delete();
        return redirect('/admin/doctor')->with('success','Delete Successfully');
    }

    public function dashboard ()
    {
        return view('Doctor.dashboard');
    }

    public function patient()
    {
        $users=User::all()->where('role','=','patient');
        return view('Doctor.Patient.index',compact('users'));
    }

}
