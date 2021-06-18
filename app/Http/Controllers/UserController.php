<?php

namespace App\Http\Controllers;

use App\Models\User;
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
}
