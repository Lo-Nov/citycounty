<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <!-- META SECTION -->
    <title>{{ config('global.siteTitle') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('css/theme-default.css') }}"/>
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/images/county.png') }}">
    <!-- EOF CSS INCLUDE -->
</head>
<body>

<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body">
            <div class="login-title"><strong>Log In</strong> to your account</div>
			<div class="profile-image m-5">
                   <center>
						 <img src="assets/images/users/avatar.png" height="150px;" class="mb-15" alt="John Doe"/>
					</center>
                </div>
            @if($errors->any())
                <p class="alert alert-danger">{{$errors->first()}}</p>
            @endif
            <form action="{{ route('nailogin') }}" class="form-horizontal" method="post">
                @csrf
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="email" placeholder="E-mail" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="Password" required/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-login btn-block">Log In</button>
                    </div>
                </div>
                <div class="login-or">OR</div>
                
                <div class="login-subtitle">
                    Don't have an account yet? <a href="#">Create an account</a>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; <?php echo date("Y"); ?> NCCG ePayment Dashbaord
            </div>
            <div class="pull-right">
                <a href="#">About</a> |
                <a href="#">Privacy</a> |
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>

</div>

</body>
<script type="text/javascript">
    var today = new Date()
    var year = today.getFullYear()
    document.write(year)
</script>
</html>






