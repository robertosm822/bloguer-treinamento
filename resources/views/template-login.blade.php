<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('/bootstrap/css/bootstrap-responsive.min.css')}}" rel="stylesheet" media="screen">
    <link href="{{ asset('/assets/styles.css')}}" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="{{ asset('/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js')}}"></script>
</head>
<body id="login">
<div class="container">


    @yield('content')

</div> <!-- /container -->
<script src="{{ asset('/vendors/jquery-1.9.1.min.js')}}"></script>
<script src="{{ asset('/bootstrap/js/bootstrap.min.js')}}"></script>
</body>
</html>