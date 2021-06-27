@extends('layouts.master')
@section('sidebar')
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/doctor/dashboard" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/doctor/patient" aria-expanded="false">
                        <i class="fa fa-procedures"></i>
                        <span class="hide-menu">Patient </span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/doctor/appointment" aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="hide-menu">Appointments </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/doctor/prescription" aria-expanded="false">
                        <i class="fa fa-list-ol"></i>
                        <span class="hide-menu">Prescription </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">View Prescription</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="col-lg-1">

    </div>
    <div class="col-md-10">
        <div class="card">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/doctor/prescription/{{ $prescriptions->id }}/update">
                @csrf
                @method("PUT")
                <div class="card-body">
                    <h4 class="card-title">Patient Info</h4>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">Appointment Code</label>
                        <div class="col-sm-9">
                            <select name="appointment_code" class="form-control">
                                @if($prescriptions->appointment == null)
                                    <option value=""> No appointment made </option>
                                @else
                                     <option value="{{$appointments->doctor->user->id}}"selected>{{$appointments->appointment_code}}</option>
                                @endif

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label"> Specialization</label>
                        <div class="col-sm-9">
                            <select name="appointment_code1" class="form-control">
                                @if($prescriptions->appointment == null)
                                    <option value=""> No appointment made </option>
                                @else
                                    <option value="{{$appointments->doctor->user->id}}"selected>{{$appointments->doctor->specialization}}</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="FirstName" name="firstname" value="{{ $prescriptions->firstname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">LastName</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="LastName" name="lastname" value="{{ $prescriptions->lastname }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $prescriptions->email }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{ $prescriptions->phone }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 text-right control-label col-form-label">Age</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="age" id="age" placeholder="Age" value="{{ $prescriptions->age }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 text-right control-label col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" id="date" placeholder="Date" value="{{ $prescriptions->date }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Status</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="status" id="status">
                                <option value="null">-------------</option>
                                <option value="Confirmed">Confirmed</option>
                                <option value="Pending">Pending</option>
                                <option value="Cancel">Cancel</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Symptoms</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="symptoms" class="ckeditor" rows="10">{{ strip_tags($prescriptions->symptoms) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Patient Description</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="patient_desc" class="ckeditor" rows="10">{{ strip_tags($prescriptions->patient_desc) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Previous Medicine Name</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="prev_medicine_name" class="ckeditor" rows="10">{{ strip_tags($prescriptions->prev_medicine_name) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Patient Diagnosis</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="diagnosis" class="ckeditor" rows="10">{{ strip_tags($prescriptions->diagnosis) }}</textarea>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Medicine</th>
                                    <th>Price</th>
                                    <th>
                                        <button type="button" class="btn btn-secondary add">Add +</button>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse ($medicines as $meds )
                                    <tr>
                                        <td>
                                            <input type="text" name="medicine[]" class="form-control" id="medicine" placeholder="Medicine here" value="{{ $meds->medicine }}">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" class="form-control" id="price" placeholder="Price here" value="{{ $meds->price }}">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger remove">Remove -</button>
                                        </td>
                                    </tr>  
                                    @empty
                                    <p>No data</p>
                                @endforelse
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group row" style="margin-left: 20%">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Total</label>
                        <div class="col-sm-6" >
                            <input type="number" name="total" id="total" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in-alt"></i> Submit</button>
                        <button type="reset" class="btn btn-secondary"><i class="fa fa-window-close"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-1">

    </div>
@endsection
