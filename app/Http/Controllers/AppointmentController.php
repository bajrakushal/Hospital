<?php

namespace App\Http\Controllers;

use App\Mail\AppointmentMail;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\AlignFormatter;
use PhpParser\Comment\Doc;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index()
    {
        $doctor = Doctor::where('user_id', \auth()->user()->id)->first();
        $appointments = $doctor->appointments()->get();
        return view('Appointment.index',compact('appointments'));
    }

//    public function display()
//    {
//        $appointments=Appointment::where('user_id',\auth()->user()->id)->get();
//        return view('home',compact('appointments'));
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app = new Appointment();
        $app->name = $request->input('name');
        $app->email = $request->input('email');
        $app->phone = $request->input('phone');
        $app->specialization = $request->input('specialization');
        $app->date = $request->input('date');
        $app->message = $request->input('message');
        $app->user_id=auth()->user()->id;
        $app->doctor_id = $request->input('specialization');
        $app->save();
        return redirect('/')->with('status', 'Data inserted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
//        $appointments = Doctor::with('appointments')->where('user_id', $appointment->id)->first();

//        $appointments = $doctor->appointments()->get();

        $appointments = Appointment::where('id',$appointment->id)->first();
        return view('Appointment.edit',compact('appointments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $appointment->name= $request->name;
        $appointment->email= $request->email;
        $appointment->doctor->specialization= $request->specialization;
        $appointment->status= $request->status;
        $appointment->phone= $request->phone;
        $appointment->message = $request->message;
        $appointment->scheduled_for = $request->scheduled_for;
        if ($request->status == "Confirmed")
        {
            Mail::to($appointment->email)->send(new AppointmentMail($appointment));
        }
        $appointment->update();

        return redirect('/doctor/appointment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
    public function a($id)
    {
        dd($id);
    }
}
