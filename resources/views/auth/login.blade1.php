<!doctype html>
<html lang="en" class="fullscreen-bg">

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:25:49 GMT -->
<head>
    <title>Login | Nairobi</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendor/themify-icons/css/themify-icons.css">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
    <link rel="stylesheet" href="assets/css/demo.min.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>
{{--<style>--}}
{{--body{--}}
{{--background-image: url('assets/img/nairobi.jpg');--}}
{{--background-size:     cover;                      /* <------ */--}}
{{--background-repeat:   no-repeat;--}}
{{--background-position: center center;--}}
{{--background-attachment: fixed;--}}


{{--}--}}
{{--</style>--}}
<body>
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content alert alert-success">
                        <div class="header">
                            <div class="logo">
                                <img style="height: 100px; width: 100px;" src="assets/img/logo/revenue.png" alt="">

                            </div>
                            <p class="lead">Welcome to Nairobi County Sign In Portal</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="signin-email" class="control-label sr-only">Email</label>
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your E-mail address" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="signin-password" class="control-label sr-only">Password</label>
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left custom-bgcolor-blue">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="text-muted">Remember me</span>
                                </label>
                                <span class="helper-text element-right">Don't have an account? <a href="#">Register</a></span>
                            </div>
                            <button type="submit" class="btn btn-success pull-left">
                                <i class="fa fa-sign-in"></i>  {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
                <div class="right" style=" background-image: url('{{asset('assets/img/nairobi.jpg')}}');">
                    <div class="overlay"></div>
                    <div class="content text" style="margin-top: 30px;">
                        <h1 class="heading">Welcome to Nairobi City County Portal</h1>
                        <hr>
                        <blockquote>
                            <h4>Ussd code:</h4>
                        </blockquote>
                        <blockquote>
                            Download app
                        </blockquote>

                        <blockquote>
                            Customer Support
                        </blockquote>   <br>


                        <div class="pull-right ">
                            <p>Powered by:</p>
                            <p > <img style="height: 100px; width: 350px;" src="assets/img/logo/logo_hr.png" style="background:none;"></p>

                        </div>


                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:25:49 GMT -->
</html>

