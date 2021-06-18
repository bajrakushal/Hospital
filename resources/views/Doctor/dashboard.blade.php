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
            </ul>
        </nav>
    </div>
@endsection
@section('breadcrumb')
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Dashboard</h4>
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
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-cyan text-center">
                <h1 class="font-light text-white"><i class="fa fa-procedures"></i></h1>
                <h6 class="text-white">Patients</h6>
                <h7 class="text-white"></h7>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-4 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white"><i class="fa fa-user-circle"></i></h1>
                <h6 class="text-white">Doctors</h6>
                <h7 class="text-white"></h7>

            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-md-6 col-lg-2 col-xlg-3">
        <div class="card card-hover">
            <div class="box bg-warning text-center">
                <h1 class="font-light text-white"><i class="fa fa-syringe"></i></h1>
                <h6 class="text-white">Labs</h6>
                <h6 class="text-white"></h6>
            </div>
        </div>
    </div>

@endsection

