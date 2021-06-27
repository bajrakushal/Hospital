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
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin/appointment" aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="hide-menu">Apponitment</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin/prescription" aria-expanded="false">
                        <i class="fas fa-prescription-bottle-alt"></i>
                        <span class="hide-menu">Prescription</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark" href="/admin/medicine" aria-expanded="false">
                        <i class="fas fa-tablets"></i>
                        <span class="hide-menu">Medicine</span>
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Date</th>
                            <th>Doctor Name</th>
                            <th>Doctor Specialization</th>
                            <th>Message</th>
                            <th>Schedule For</th>
                            <th>Status</th>
                            <th>View</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone }}</td>
                                <td>{{ $appointment->date}}</td>
                                <td>{{ $appointment->doctor->user->name }}</td>
                                <td>{{ $appointment->doctor->specialization}}</td>
                                <td>{{ $appointment->message }}</td>
                                @if($appointment->scheduled_for == NULL)
                                <td>pending</td>
                                @else
                                <td> {{ $appointment->scheduled_for }}</td>
                                @endif
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-id="{{ $appointment->id }}" data-target="#logoutModal2{{$appointment->id}}" type="button"><i class="fa fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="logoutModal2{{$appointment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                
                                              <h5 class="modal-title" id="exampleModalLabel">{{ $appointment->name}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                             <table>
                                                 <tr>
                                                     <th>Email:</th>
                                                     <td>{{ $appointment->email }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Phone:</th>
                                                    <td>{{ $appointment->phone }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Message:</th>
                                                    <td>{{ $appointment->message }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Doctor incharge:</th>
                                                    <td>{{ $appointment->doctor->user->name }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Status:</th>
                                                    <td>{{ $appointment->status }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Scheduled For:</th>
                                                    <td>{{ $appointment->scheduled_for }}</td>
                                                 </tr>
                                             </table>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Date</th>
                                <th>Doctor Name</th>
                                <th>Doctor Specialization</th>
                                <th>Message</th>
                                <th>Schedule For</th>
                                <th>Status</th>
                                <th>View</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
