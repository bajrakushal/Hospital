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
            <h4 class="page-title">View Medicine</h4>
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
                <h5 class="card-title">View Medicine Details</h5>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="/admin/medicine/create">
                    <button type="button" class="btn btn-primary" style="float: right;margin-bottom: 10px;">
                    <span>
                        <i class="fa fa-plus"></i>
                    </span>
                        Add Medicine
                    </button>
                </a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Manufactured By</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Manufacture Date</th>
                            <th>Expire Date</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($medicines as $i => $medicine)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$medicine->name}}</td>
                                <td>{{$medicine->manufactured_by}}</td>
                                <td>{{$medicine->price}}</td>
                                <td>{{ strip_tags($medicine->description) }}</td>
                                <td>{{$medicine->manufacture_date}}</td>
                                <td>{{$medicine->expire_date}}</td>
                         
                                <td>
                                    <img src="{{asset('/storage/Medicine/'.$medicine->image)}}" width="200">
                                </td>

                                @if($medicine->status == 1)
                                <td>
                                    <a href="/admin/status/{{ $medicine->id }}/0" class="btn btn-danger btn-sm">
                                        Disable?
                                    </a>
                                </td>
                                @elseif($medicine->status == 0)
                                <td>
                                    <a href="/admin/status/{{ $medicine->id }}/1" class="btn btn-info btn-sm">
                                         Enable?
                                    </a>
                                </td>
                                @endif

                                <td>
                                    
                                    <a href="/admin/medicine/{{$medicine->id}}/edit"><button class="btn btn-secondary btn-sm" type="button"><i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </td>
                                
                                <td>
                                   <a href="/admin/medicine/{{ $medicine->id }}/delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach 
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Manufactured By</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Manufacture Date</th>
                            <th>Expire Date</th>
                            <th>Image</th>
                            <th>Status</th>
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