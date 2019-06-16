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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="assets/css/main.min.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
        <link rel="stylesheet" href="assets/css/demo.min.css">
        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
        <!-- ICONS -->
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/img/logo/revenue.png">
        <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    </head>
    <style>
        body {
            background-image: url('assets/img/nairobibg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
        }
    </style>

    <body>

        <!-- WRAPPER -->
        <div id="wrapper" class="login">
            <div class="login-form">
                <div class="content alert alert-success">
                    <div class="header">
                        <div class="logo">
                            <img style="height: 100px; width: 100px;" src="assets/img/logo/revenue.png" alt="">
                        </div>
                        <h1>PARKING</h1>
                        <p class="lead">Sign in to your account</p>
                    </div>
                    @if($errors->any())
                    <p class="alert alert-danger">{{$errors->first()}}</p>
                    @endif
                    <br>
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf

                        <div class="form-group">
                            <label for="username2" class="control-label sr-only">Email</label>
                            <div class="input-group">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your username" required autofocus> @if ($errors->has('email'))
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                                @endif
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label sr-only">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Enter your password" required> @if ($errors->has('password'))
                                <div class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </div> @endif
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>
                        </div>
                        <div class="login-footer">
                            <div class="clearfix">
                                <label class="fancy-checkbox element-left custom-bgcolor-blue pull-left">
                                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <span class="text-muted">Remember me</span>
                                      </label>
                            </div>
                            <button type="submit" class="btn btn-sm colored-buttons" style="text-align: left"><i class="fa fa-sign-in"></i>  {{ __('Sign in') }}</button> @if (Route::has('password.request'))
                            <a class="btn btn-link display-none " href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}</a> @endif
                        </div>
                    </form>
                    <div class="mobile-footer">
                        <img src="assets/img/powered_NBK-dark.png">
                    </div>
                </div>
            </div>
        </div>
        <!-- END WRAPPER -->
    </body>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  
    <!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:25:49 GMT -->

</html>
