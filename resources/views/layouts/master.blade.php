<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <title>HMS</title>
    <link href="{{asset('admin_asset/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin_asset/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">


</head>

<body>

<div id="main-wrapper">
    <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <div class="navbar-header" data-logobg="skin5">
                <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                <a class="navbar-brand" href="index.html">
                    <b class="logo-icon p-l-10">
                        <img src="{{asset('admin_asset/assets/images/logo-icon.png')}}" alt="homepage" class="light-logo" />
                    </b>
                    <span class="logo-text">
                             <img src="{{asset('admin_asset/assets/images/logo-text.png')}}" alt="homepage" class="light-logo" />
                        </span>
                </a>
                <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
            </div>
            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                <ul class="navbar-nav float-left mr-auto">
                    <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                </ul>
                <!--notification section-->
                <ul class="navbar-nav float-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="font-24 mdi mdi-comment-processing"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                            <ul class="list-style-none">
                                <li>
                                    <div class="">
                                        <a href="javascript:void(0)" class="link border-top">
                                            <div class="d-flex no-block align-items-center p-10">
                                                <span class="btn btn-danger btn-circle"><i class="fa fa-link"></i></span>
                                                <div class="m-l-10">
                                                    <h5 class="m-b-0">Luanch Admin</h5>
                                                    <span class="mail-desc">Just see the my new admin!</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <b>{{auth()->user()->role}}</b></a>
                        <div class="dropdown-menu dropdown-menu-right user-dd animated">
                            <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>Welcome {{auth()->user()->name}}</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/profile/{{ auth()->user()->id }}"><i class="ti-settings m-r-5 m-l-5"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout
                                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </a>
                            <div class="dropdown-divider"></div>
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar" data-sidebarbg="skin5">
        @yield('sidebar')
    </aside>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            @yield('breadcrumb')
        </div>
        <div class="container-fluid">
            <div class="row">
                @yield('content')
            </div>
        </div>
        <footer class="footer text-center" style="margin-top: 15px;">
            All Rights Reserved &nbsp; || &nbsp; Designed and Developed by ❤ Nasib ❤</a>.
        </footer>
    </div>
</div>

<script src="{{asset('admin_asset/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/extra-libs/sparkline/sparkline.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin_asset/dist/js/waves.js')}}"></script>
<!--Menu sidebar -->
<script src="{{asset('admin_asset/dist/js/sidebarmenu.js')}}"></script>
<!--Custom JavaScript -->
<script src="{{asset('admin_asset/dist/js/custom.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/excanvas.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/jquery.flot.pie.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/jquery.flot.time.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/jquery.flot.stack.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('admin_asset/dist/js/pages/chart/chart-page-init.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{asset('admin_asset/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
<script src="{{asset('admin_asset/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
<script src="{{asset('admin_asset/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script type="text/javascript">

    $(document).ready(function() {

        $('.ckeditor').ckeditor();

    });

</script>

<script type="text/javascript">
    $('#data-table').DataTable();
</script>
<script type="text/javascript">
    $('.add').on('click',function (){
        addSymptoms();
    });
    function addSymptoms() {
        var tr= '<tr>'+
            '<td>'+
            '<input type="text" name="medicine[]" class="form-control" id="medicine" placeholder="Symptoms here"/>'+
            '</td>'+
            '<td>'+
            '<input type="number" name="price[]" class="form-control" id="price" placeholder="Price here"/>'+
            '</td>'+
            '<td>'+
            '<button type="button" class="btn btn-danger remove">Remove -</button> '+
            '</td>'+
            '</tr>';
        $('tbody').append(tr);
    }
    $('tbody').on('click','.remove',function (){
        
        $(this).parent().parent().remove();
    });

    $(document).ready(function () {

        $(".table").on('input', '#price', function () {
            var calculated_total_sum = 0;

            $(".table #price").each(function () {
                var get_textbox_value = $(this).val();
                if ($.isNumeric(get_textbox_value)) {
                    calculated_total_sum += parseFloat(get_textbox_value);
                }
            });
            let a = document.getElementById('total').value = calculated_total_sum;
        });
    });

    //*
</script>


</body>
</html>
