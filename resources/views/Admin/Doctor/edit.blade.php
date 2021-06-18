@extends('layouts.master')
@section('sidebar')
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/dashboard" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin/patient" aria-expanded="false">
                        <i class="fa fa-procedures"></i>
                        <span class="hide-menu">Patient </span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin/doctor" aria-expanded="false">
                        <i class="fa fa-user-md"></i>
                        <span class="hide-menu">Doctor </span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Edit Doctor</h4>
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
    <div class="col-lg-2">

    </div>
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/admin/doctor/{{$doctor->id}}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                    <h4 class="card-title">Doctor Info</h4>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Full name" name="name" value="{{old('name')??$doctor->user->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')??$doctor->user->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3 text-right control-label col-form-label">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number Here" value="{{old('phone')??$doctor->user->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="age" class="col-sm-3 text-right control-label col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lab number" class="col-sm-3 text-right control-label col-form-label">Confirm Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group row" id="row">
                        <label for="lab number" class="col-sm-3 text-right control-label col-form-label">Specialist</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="specialization" id="specialization" placeholder="specialization" value="{{old('specialization')??$doctor->specialization}}">
                        </div>
                    </div>
                    <input type="hidden" value="{{$doctor->user->id}}">
                    <div class="form-group row">
                        <label for="lab number" class="col-sm-3 text-right control-label col-form-label">Qualification</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control" name="qualification" id="qualification" placeholder="Qualification" value="{{old('qualification')??$doctor->qualification}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lab number" class="col-sm-3 text-right control-label col-form-label">Service Charge</label>
                        <div class="col-sm-9">
                            <input type="text"  class="form-control" name="service_charge" id="service_charge" placeholder="service_charge" value="{{old('service_charge')??$doctor->service_charge}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="doctor image" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
                        <div class="col-sm-9">
                            <input type="file"  class="form-control" name="doc_image" id="doc_image">
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
    <div class="col-lg-2">

    </div>
@endsection
