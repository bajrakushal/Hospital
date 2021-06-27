@extends('layouts.master')
@section('sidebar')
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/patient/prescription/create" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Prescription</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Create Prescription</h4>
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/patient/prescription">
                @csrf

                <div class="card-body">
                    <h4 class="card-title">Patient Info</h4>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">Appointment Code</label>
                        <div class="col-sm-9">
                            <select name="appointment_code" class="form-control">
                                <option value="null">----------------</option>
                            @forelse($appointments as $appointment)
                                    <option value="{{$appointment->id}}">{{$appointment->appointment_code}}</option>
                                @empty
                                    <option value="null">Please make your appointment first</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">Appointment Code</label>
                        <div class="col-sm-9">
                            <select name="appointment_code1" class="form-control">
                                <option value="null">----------------</option>
                                @forelse($appointments as $appointment)
                                    <option value="{{$appointment->doctor->user->id}}">{{$appointment->doctor->specialization}}</option>
                                @empty
                                    <option value="null">Please make your appointment first</option>
                                @endforelse
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="FirstName" name="firstname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">LastName</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="LastName" name="lastname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 text-right control-label col-form-label">Age</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="age" id="age" placeholder="Age">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 text-right control-label col-form-label">Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date" id="date" placeholder="Date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Symptoms</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="symptoms" class="ckeditor" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="symptoms" class="col-sm-3 text-right control-label col-form-label">Patient Description</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="patient_desc" class="ckeditor" rows="10"></textarea>
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
