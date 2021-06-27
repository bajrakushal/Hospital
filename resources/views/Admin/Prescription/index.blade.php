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
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">View Prescription Details</h5>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Doctor</th>
                            <th>Appointment Reg_date</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prescriptions  as $prescription)
                            <tr>
                                <td>{{$prescription->firstname}}</td>
                                <td>{{$prescription->lastname}}</td>
                                <td>{{$prescription->email}}</td>
                                <td>{{$prescription->phone}}</td>
                                @if($prescription->appointment == null)
                                <td>No Prescription Available</td>
                                @else
                                <td>{{$prescription->appointment->doctor->user->name}}</td>
                                @endif
                                
                                <td>{{$prescription->created_at}}</td>
                                <td>
                                    @if($prescription->status == 'Pending')
                                        <button type="button" class="btn btn-primary">
                                            Pending
                                        </button>
                                    @elseif($prescription->status == 'Confirmed')
                                        <button type="button" class="btn btn-secondary">
                                            Confirmed
                                        </button>
                                    @elseif($prescription->status == 'Cancelled')
                                        <button type="button" class="btn btn-danger">
                                            Cancelled
                                        </button>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-id="{{ $prescription->id }}" data-target="#logoutModal2{{$prescription->id}}" type="button"><i class="fa fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="logoutModal2{{$prescription->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                
                                              <h5 class="modal-title" id="exampleModalLabel">{{ $prescription->firstnname }}  {{ $prescription->lastname }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                             <table>
                                                 <tr>
                                                     <th>Email:</th>
                                                     <td>{{ $prescription->email }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $prescription->phone}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Age</th>
                                                    <td>{{ $prescription->age}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Symptoms</th>
                                                    <td>
                                                       {{ strip_tags($prescription->symptoms)}}                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Description</th>
                                                    <td style="max-width:50px; ">
                                                        {{ strip_tags($prescription->patient_desc)}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Doctor Incharge</th>
                                                    @if($prescription->appointment == null)
                                                        <td>No Prescription Available</td>
                                                    @else
                                                        <td>{{$prescription->appointment->doctor->user->name}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <th>Diagnosis</th>
                                                    <td>{{ $prescription->diagnosis}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Doctor Description</th>
                                                    <td>{{ $prescription->Doctor_desc}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Previous Medicine Name</th>
                                                    <td>{{ $prescription->prev_medicine_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>New Medicine Name</th>
                                                    <td>{{ $prescription->new_medicine_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Amount</th>
                                                    <td>{{ $prescription->total_amount}}</td>
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
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Assigned Doctor</th>
                            <th>Appointment Reg_date</th>
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
