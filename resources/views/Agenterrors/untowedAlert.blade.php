<!doctype html>
<html lang="en" class="fullscreen-bg">

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:25:49 GMT -->
<head>
    <title>404 Page Not Found | Klorofil Pro - Bootstrap Admin Dashboard Template</title>
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
<body class="page-error">
<!-- WRAPPER -->
<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <h1>
						<span class="clearfix title">
								<br/>Data Not Found</span>
                </span>
            </h1>
            <p>{{ $untowedAgent->message }}.</p>

            <div>
                <a href="javascript:history.go(-1)" class="btn btn-default"><i class="fa fa-arrow-left"></i> <span>Go Back</span></a>
                <a href="{{ route('agent') }}" class="btn btn-default"><i class="fa fa-home"></i> <span>Home</span></a>
            </div>
        </div>
    </div>
</div>
<!-- END WRAPPER -->
</body>

<!-- Mirrored from demo.thedevelovers.com/dashboard/klorofilpro-v1.6/html/page-404.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 08 Apr 2019 17:25:49 GMT -->
</html>