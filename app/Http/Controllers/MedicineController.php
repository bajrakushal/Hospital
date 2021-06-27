<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicines = Medicine::all();
        return view('Admin.Medicine.index',compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|unique:medicines',
            'manufactured_by'=>'required',
            'description'=>'required',
            'price'=> 'required|numeric',
            'manufacture_date'=>'required',
            'expire_date'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);
        $medicine = new Medicine();
        $medicine->name = $request->name;
        $medicine->manufactured_by = $request->manufactured_by;
        $medicine->description = $request->description;
        $medicine->price = $request->price;
        $medicine->manufacture_date = $request->manufacture_date;
        $medicine->expire_date = $request->expire_date;
        $medicine->status = 1;
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('/storage/Medicine/'),$filename);
            $medicine->image = $request->file('image')->getClientOriginalName();
        }
        $medicine->save();
        return redirect('/admin/medicine')->with('success','Medicine Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        $medicines = Medicine::findOrFail($medicine->id);
        return view('Admin.Medicine.edit',compact('medicines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        $validate = $request->validate([
            'name' => 'required|unique:medicines,name,'.$medicine->id,
            'manufactured_by'=>'required',
            'description'=>'required',
            'price'=> 'required|numeric',
            'manufacture_date'=>'required',
            'expire_date'=>'required',
            'image'=>'mimes:png,jpg,jpeg',
        ]);

        $medicines = Medicine::findOrFail($medicine->id);
        if($request->has('image'))
        {
            Storage::delete($medicines->image);
            $image = $request->file('image');
            $filename = $image->getClientOriginalName();
            $image->move(public_path('/storage/Medicine/'), $filename);
            $medicines->image = $request->file('image')->getClientOriginalName();
        }

        $medicines->name = $request->name;
        $medicines->manufactured_by = $request->manufactured_by;
        $medicines->description = $request->description;
        $medicines->price = $request->price;
        $medicines->manufacture_date = $request->manufacture_date;
        $medicines->expire_date = $request->expire_date;
        $medicines->update();
        return redirect('/admin/medicine')->with('success','Medicine updated  Successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine = Medicine::findOrFail($medicine->id);
        $medicine->delete();
        return redirect('/admin/medicine')->with('success','Medicine Deleted Successfully ');

    }


    public function status($id,$status)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->status = $status;
        $medicine->save();
        return redirect('/admin/medicine')->with('success','Status updated ');
    }
}
