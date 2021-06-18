<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_asset/assets/images/favicon.png')}}">
    <title>Login - HMS</title>
    <link href="{{asset('admin_asset/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark border-top border-secondary">
            <div id="loginform">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form enctype="multipart/form-data" method="post" action="{{ route('login') }}">
                    @csrf
                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="email" class="form-control form-control-lg" placeholder="email" aria-label="email" name="email" aria-describedby="basic-addon1" required="">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" placeholder="Password" name="password" aria-label="Password" aria-describedby="basic-addon1" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-success " style="align-items: center;margin-left: 40%"  value="submit" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row ">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <h3 style="text-align: center;color: white">Dont have an Account ?</h3>
                                <a href="/register">
                                    <button class="btn btn-secondary" style="align-items: center;margin-left: 40%"  value="submit" type="submit">Register</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin_asset/assets/libs/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('admin_asset/assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
