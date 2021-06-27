<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use Barryvdh\DomPDF\Facade as PDF;//use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::with('appointment')->where('user_id',auth()->user()->id)->get();
        return view('Patient.Prescription.index',compact('prescriptions'));
    }

    public function doctorindex()
    {
        $prescriptions = Prescription::with('appointment')->where('doctor_id',auth()->user()->id)->get();
        return view('Doctor.Prescription.index',compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appointments = Appointment::where('user_id',auth()->user()->id)->get();
        return view('Patient.Prescription.create',compact('appointments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $prescrip = new Prescription();
       $prescrip->firstname = $request->firstname;
       $prescrip->lastname = $request->lastname;
       $prescrip->email = $request->email;
       $prescrip->phone = $request->phone;
       $prescrip->age = $request->age;
       $prescrip->date = $request->date;
       $prescrip->symptoms = $request->symptoms;
       $prescrip->patient_desc = $request->patient_desc;
       $prescrip->appointment_id = $request->appointment_code;
       $prescrip->doctor_id = $request->appointment_code1;
        $prescrip->user_id = auth()->user()->id;
       $prescrip->save();
       return redirect('/patient/prescription');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        $prescriptions = Prescription::where('id',$prescription->id)->first();
        $appointments = Appointment::where('id',$prescriptions->appointment_id)->first();
        $medicines = DB::table('prescription_medicines')->where('prescription_id',$prescription->id)->get();
        return view('Doctor.Prescription.edit',compact('prescriptions','appointments','medicines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        $prescriptions = Prescription::findOrFail($prescription->id);
        $prescriptions->prev_medicine_name = $request->prev_medicine_name;
        $prescriptions->status = $request->status;
        $prescriptions->diagnosis = $request->diagnosis;
        $prescriptions->save();
        foreach ($request->medicine as $key => $medicine) {
            $new = new PrescriptionMedicine();
            $new->medicine = $request->medicine[$key];
            $new->price = $request->price[$key];
            $new->total = $request->total;
            $new->prescription_id = $prescription->id;
            $new->save();
        }
        return redirect('/doctor/prescription')->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }

    public function invoice($id)
    {
        $prescription =Prescription::with('appointment')->findOrfail($id);
        $pres_med = Prescription::with('prescriptionmedicines')->findOrFail($id);
        $max = PrescriptionMedicine::findOrfail($id)->sum('price');
        $pdf = PDF::loadView('Patient.pdf.invoice',compact('prescription','pres_med','max'))->setPaper('a4', 'portrait');
        $fileName = $prescription->id;
        return $pdf->stream($fileName.'.pdf');
    }

    public function prescripShow(){
        $prescriptions = Prescription::orderBy('created_at','desc')->get();
        return view('Admin.Prescription.index',compact('prescriptions'));
    }

    // public function showPayment($id){
    //     $maxs = PrescriptionMedicine::findOrfail($id)->sum('price');
    //     return view('Patient.Prescription.index',compact('maxs'));
    // }
}
