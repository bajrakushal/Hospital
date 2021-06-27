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
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/patient/prescription" aria-expanded="false">
                        <i class="mdi mdi-view-list"></i>
                        <span class="hide-menu">Prescription</span>
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
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <a href="/patient/prescription/create">
                    <button type="button" class="btn btn-primary" style="float: right;margin-bottom: 10px;">
                    <span>
                        <i class="fa fa-plus"></i>
                    </span>
                        Add Prescription
                    </button>
                </a>
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Appointment Code</th>
                            <th>Referred by</th>
                            <th>Symptoms</th>
                            <th>Registration date</th>
                            <th>Payment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($prescriptions as $prescription)
                            <tr>
                                <td>{{$prescription->firstname}}</td>
                                <td>{{$prescription->lastname}}</td>
                                <td>{{$prescription->email}}</td>
                                <td>{{$prescription->appointment->appointment_code}}</td>
                                <td>{{$prescription->appointment->name}}</td>
                                <td>{{ strip_tags($prescription->symptoms)}}</td>
                                <td>{{$prescription->user->created_at}}</td>
                                @if($prescription->status == 'Pending')
                                    <td>
                                        <a href="/doctor/appointment/{{$prescription->id}}/edit"><button class="btn btn-secondary" type="button"><i class="fa fa-eye"></i> Please Contact Doctor to update status
                                            </button>
                                        </a>
                                    </td>
                                @endif
                                <td>
                                <button class="btn btn-outline-primary" data-toggle="modal" data-id="{{ $prescription->id }}" data-target="#logoutModal2{{$prescription->id}}" type="button"><i class="fa fa-eye"></i> View
                                    </button>
                                    <div class="modal fade" id="logoutModal2{{$prescription->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                
                                              <h5 class="modal-title" id="exampleModalLabel">{{ $prescription->firstname}} {{ $prescription->lastname }}</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            
                                            <div class="modal-body">
                                                <form action="/charge" method="post">
                                                  <input type="hidden" id="id" value="{{ $prescription->id }}">  
                                                    <input type="text" name="amount" id="amount" class="form-control mb-3" readonly value="{{ DB::table('prescription_medicines')->where('prescription_id',$prescription->id)->sum('price') }}">
                                                    {{ csrf_field() }}
                                                    <div id="paypal-payment">
                                                        
                                                    </div>
                                                </form>
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
                            <th>Appointment Code</th>
                            <th>Referred by</th>
                            <th>Symptoms</th>
                            <th>Registration date</th>
                            <th>View Invoice</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
<script src="https://www.paypal.com/sdk/js?client-id=AXnUD1Gw2Yb0RUCtxrxU3U0yHzF8-Z0akG5c5pkgvpgICexd5Opbsa_EUbLVyGqMgLJAOGVG9lqMSRsa&disable-funding=credit,card"></script>
<script>
paypal.Buttons({
    createOrder:function(data,actions){
    return actions.order.create({
        purchase_units:[{
            amount:{
                value:document.getElementById('amount').value
            },
          
        }]
    });
},
onApprove:function(data,actions){
    return actions.order.capture().then(function(details){
        let a = document.getElementById('id').value
        window.location.replace('http://127.0.0.1:8000/patient/invoice'+'/'+a);


    });
},
onCancel:function(data){
    alert();
    window.location.replace('http://127.0.0.1:8000/patient/payment');
}
}).render('#paypal-payment');
</script>
@endsection
