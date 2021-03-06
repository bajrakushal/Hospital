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
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
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
                            <th>Scheduled For</th>
                            <th>Status</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($appointments  as $appointment)
                            <tr>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->phone}}</td>
                                <td>{{$appointment->doctor->user->name}}</td>
                                <td>{{$appointment->created_at}}</td>
                                @if($appointment->scheduled_for == NULL)
                                <td>pending</td>
                                @else
                                <td> {{ $appointment->scheduled_for }}</td>
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
                                    <form id="delete-form-{{ $appointment->id }}" id="{{ $appointment->id }}" action="/doctor/appointment/{{ $appointment->id }}/delete" method="POST" style="display: none;">
                                        @csrf
                                        @method('POST')
                                    </form>
                                </td>
                                </td>
                            </tr>
                            @empty
                            <p>No  data</p>
                         @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Assigned Doctor</th>
                                <th>Appointment Reg_date</th>
                                <th>Scheduled For</th>
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
