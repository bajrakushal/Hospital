<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin_asset/assets/images/favicon.png')}}">
    <title>Register - HMS</title>
    <link href="{{asset('admin_asset/dist/css/style.min.css')}}" rel="stylesheet">
</head>

<body>
<div class="main-wrapper">
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
        <div class="auth-box bg-dark">
            <div id="loginform">
                <form enctype="multipart/form-data" method="post" action="/register">
                    @csrf
                    <div class="row p-b-30">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                </div>
                                <input type="name" class="form-control form-control-lg" placeholder="name" aria-label="name" name="name" aria-describedby="basic-addon1" required="">
                            </div>
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
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                </div>
                                <input type="password" class="form-control form-control-lg" placeholder="Confirm Password" name="password_confirmation" aria-label="Password" aria-describedby="basic-addon1" required="">
                            </div>
                        </div>
                    </div>
                    <div class="row border-top border-secondary">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="p-t-20">
                                    <button class="btn btn-success " style="align-items: center;margin-left: 40%"  value="submit" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row ">
                    <div class="col-12">
                        <div class="form-group">
                            <div class="p-t-20">
                                <h3 style="text-align: center;color: white">Already have an Account ?</h3>
                                <a href="/login">
                                    <button class="btn btn-secondary" style="align-items: center;margin-left: 40%"  value="submit" type="submit">Login</button>
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
