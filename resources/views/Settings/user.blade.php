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
                @if (isset($appointment) != null)
                    @if($appointment->status == 'Pending')
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
                                <i class="mdi mdi-account-alert"></i>
                                <span class="hide-menu">Please confirm your appointment</span>
                            </a>
                        </li>
                    @elseif($appointment->status == 'Confirmed')
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/patient/prescription" aria-expanded="false">
                                    <i class="mdi mdi-view-list"></i>
                                    <span class="hide-menu">Prescription</span>
                                </a>
                            </li>
                    @endif
                @endif
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
<div class="container">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
        <div class="card">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                <div class="mt-3">
                <h4>{{ $users->name }}</h4>
                <p class="text-secondary mb-1">{{ $users->role }}</p>
                <p class="text-muted font-size-sm">{{ $users->created_at }}</p>
                <button class="btn btn-primary">Follow</button>
                <button class="btn btn-outline-primary">Message</button>
                </div>
            </div>
            </div>
        </div>
        <div class="card mt-3">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                    <span class="text-secondary">bootdey</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                    <span class="text-secondary">bootdey</span>
                </li>
            </ul>
        </div>
        </div>
        <div class="col-md-8">
        <div class="card mb-3">
            <div class="card-body">
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                {{ $users->name }}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $users->email}}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $users->phone }}
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                <a class="btn btn-info " href="/profile/user/edit/{{ auth()->user()->id }}">Edit</a>
                </div>
            </div>
            </div>
        </div>
    </div>
  </div>
@endsection