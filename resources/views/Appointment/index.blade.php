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
            <h4 class="page-title">View Appointment</h4>
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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Appointment Details</h5>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Doctor</th>
                            <th>Appointment Reg_date</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($appointments  as $appointment)
                            <tr>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->phone}}</td>
                                <td>{{$appointment->doctor->user->name}}</td>
                                <td>{{$appointment->created_at}}</td>
                                <td>
                                    @if($appointment->status == 'Pending')
                                        <button type="button" class="btn btn-primary">
                                            Pending
                                        </button>
                                            @elseif($appointment->status == 'Confirmed')
                                        <button type="button" class="btn btn-secondary">
                                            Confirmed
                                        </button>
                                            @elseif($appointment->status == 'Cancelled')
                                        <button type="button" class="btn btn-danger">
                                            Cancelled
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a href="/doctor/appointment/{{$appointment->id}}/edit"><button class="btn btn-secondary" type="button"><i class="fa fa-eye"></i> View
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="/doctor/appointment/{{$appointment->id}}/edit"><button class="btn btn-cyan" type="button"><i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-id="{{ $appointment->id }}" type="button" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $appointment->id }}').submit();">
                                        <i class="fa fa-trash">
                                            Delete
                                        </i>
                                    </button>
                                    <form id="delete-form-{{ $appointment->id }}" id="{{ $appointment->id }}" action="/doctor/appointment/{{ $appointment->id }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                </td>
                            </tr>
                         @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Doctor</th>
                            <th>Appointment Reg_date</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
