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
            <h4 class="page-title">View Doctors</h4>
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
                <h5 class="card-title">View Doctors Details</h5>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="/admin/doctor/create">
                    <button type="button" class="btn btn-primary" style="float: right;margin-bottom: 10px;">
                    <span>
                        <i class="fa fa-plus"></i>
                    </span>
                        Add Doctor
                    </button>
                </a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Registration date</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->user->name}}</td>
                                <td>{{$doctor->user->email}}</td>
                                <td>{{$doctor->specialization}}</td>
                                <td>
                                    <img src="{{asset('/storage/Doctor/'.$doctor->doc_image)}}" width="200" height="200">
                                <td>{{$doctor->user->created_at}}</td>
                                <td>
                                    <button class="btn btn-outline-primary" data-toggle="modal" data-id="{{ $doctor->id }}" data-target="#logoutModal2{{$doctor->id}}" type="button"><i class="fa fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="logoutModal2{{$doctor->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                
                                              <h5 class="modal-title" id="exampleModalLabel">{{ $doctor->user->name}}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                             <table>
                                                 <tr>
                                                     <th>Email:</th>
                                                     <td>{{ $doctor->user->email }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Specialization:</th>
                                                    <td>{{ $doctor->specialization }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Qualification:</th>
                                                    <td>{{ $doctor->qualification }}</td>
                                                 </tr>
                                                 <tr>
                                                    <th>Service Charge:</th>
                                                    <td>{{ $doctor->service_charge }}</td>
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
                                    <a href="/admin/doctor/{{$doctor->id}}/edit"><button class="btn btn-secondary" type="button"><i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-id="{{ $doctor->id }}" type="button" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $doctor->id }}').submit();">
                                        <i class="fa fa-trash">
                                            Delete
                                        </i>
                                    </button>
                                    <form id="delete-form1-{{ $doctor->id }}" id="{{ $doctor->id }}" action="/admin/dashboard/{{ $doctor->id }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Image</th>
                            <th>Registration date</th>
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
