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
            <h4 class="page-title">Update Medicine</h4>
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
<div class="col-lg-2">
</div>
    <div class="col-md-8">
        <div class="card">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="/admin/medicine/{{ $medicines->id }}/update">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <h4 class="card-title">Medicine details</h4>
                    <div class="form-group row">
                        <label for="Name" class="col-sm-3 text-right control-label col-form-label">Medicine Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Medicine name" name="name" value="{{ $medicines->name }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="manufactured_by" class="col-sm-3 text-right control-label col-form-label">Manufactured By</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Manufactured By" name="manufactured_by" value="{{ $medicines->manufactured_by }}">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-3 text-right control-label col-form-label">Medicine Price</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="price" id="price" placeholder="price" value="{{ $medicines->price }}">
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="manufacture_date" class="col-sm-3 text-right control-label col-form-label">Manufacture Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder=">Manufacture Date" name="manufacture_date" value="{{ $medicines->manufacture_date }}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="manufacture_date" class="col-sm-3 text-right control-label col-form-label">	Expire Date</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" placeholder="Expire Date" name="expire_date" value="{{ $medicines->expire_date }}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                        <div class="col-sm-9">
                            <textarea id="ckeditor" name="description" class="ckeditor" rows="10">{{ strip_tags($medicines->description) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="doctor image" class="col-sm-3 text-right control-label col-form-label">Upload Image</label>
                        <div class="col-sm-9">
                            <input type="file"  class="form-control" name="image" id="image">
                            @error('doc_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in-alt"></i> Submit</button>
                        <button type="reset" class="btn btn-secondary"><i class="fa fa-window-close"></i> Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-2">

    </div>
@endsection