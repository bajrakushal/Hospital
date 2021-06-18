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
            <h4 class="page-title">View Patients</h4>
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
                <h5 class="card-title">View Patient Details</h5>
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
                            <th>Email verified at</th>
                            <th>Registration date</th>
                            <th>Deactivate Patient</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->email_verified_at}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    @if($user->status == '0')
                                        <button type="button" class="btn btn-purple">Not Banned</button>
                                    @elseif($user->status == '1')
                                        <button type="button" class="btn btn-danger">Banned</button>
                                    @endif
                                </td>
                                <td>
                                    <a href="/admin/patient/{{$user->id}}"><button class="btn btn-outline-primary" type="button"><i class="fa fa-eye"></i> View
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="/admin/patient/{{$user->id}}/edit"><button class="btn btn-secondary" type="button"><i class="fa fa-edit"></i> Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <button class="btn btn-danger" data-id="{{ $user->id }}" type="button" onclick="event.preventDefault();
                                        document.getElementById('delete-form-{{ $user->id }}').submit();">
                                        <i class="fa fa-trash">
                                            Delete
                                        </i>
                                    </button>
                                    <form id="delete-form1-{{ $user->id }}" id="{{ $user->id }}" action="/admin/dashboard/{{ $user->id }}" method="POST" style="display: none;">
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
                            <th>Email verified at</th>
                            <th>Registration date</th>
                            <th>Deactivate Patient</th>
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
