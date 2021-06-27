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

{{--                @if (isset($appointment))--}}
{{--                    <ul>--}}
{{--                        @if ($appointment->status == 'Pending')--}}
{{--                            <li class="sidebar-item">--}}
{{--                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">--}}
{{--                                    <i class="mdi mdi-account-alert"></i>--}}
{{--                                    <span class="hide-menu">Please confirm your appointment</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        @endif--}}
{{--                    </ul>--}}
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
    <h2>Welcome {{auth()->user()->name}}</h2>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Appointment Details</h5>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Appointment Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Doctor</th>
                            <th>Appointment Reg_date</th>
                            <th>Scheduled Data</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($appointments  as $appointment)
                            <tr>
                                <td>{{$appointment->appointment_code}}</td>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->phone}}</td>
                                <td>{{$appointment->doctor->user->name}}</td>
                                <td>{{$appointment->created_at}}</td>
                                @if($appointment->scheduled_for == NULL)
                                <td>pending</td>
                                @else
                                <td>{{ $appointment->scheduled_for }}</td>
                                @endif
                                <td>
                                    @if($appointment->status == 'Pending')
                                        <button type="button" class="btn btn-primary">
                                            Pending
                                        </button>
                                    @elseif($appointment->status == 'Confirmed')
                                        <button type="button" class="btn btn-success">
                                            Confirmed
                                        </button>
                                    @elseif($appointment->status == 'Cancelled')
                                        <button type="button" class="btn btn-danger">
                                            Cancelled
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <a href=""><button class="btn btn-secondary" type="button"><i class="fa fa-eye"></i> View
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
                                <th>Appointment Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Assigned Doctor</th>
                                <th>Appointment Reg_date</th>
                                <th>Scheduled Data</th>
                                <th>Status</th>
                                <th>View</th>
                                <th>Delete</th>
    
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

