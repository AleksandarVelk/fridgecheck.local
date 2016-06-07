<!DOCTYPE html>
<!--
BeyondAdmin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.6
Version: 1.5.0
Purchase: https://wrapbootstrap.com/theme/beyondadmin-adminapp-angularjs-mvc-WB06R48S4
-->

<html xmlns="http://www.w3.org/1999/xhtml">
<!--Head-->
<head>
    <meta charset="utf-8" />
    <title>Login Page</title>

    <meta name="description" content="login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <!--Basic Styles-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />

    <!--Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,600,700,300" rel="stylesheet" type="text/css">

    <!--Beyond styles-->
    <link id="beyond-link" href="assets/css/beyond.min.css" rel="stylesheet" />
    <link href="assets/css/demo.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />

    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="assets/js/skins.min.js"></script>
</head>
<!--Head Ends-->
<!--Body-->
<body>
    <div class="login-container animated fadeInDown">
        <div class="loginbox bg-white">
            <div class="loginbox-title">SIGN IN</div>
            <div class="loginbox-social">
                <div class="social-title ">Connect with Your Social Accounts</div>
                <div class="social-buttons">
                    <a href="" class="button-facebook">
                        <i class="social-icon fa fa-facebook"></i>
                    </a>
                    <a href="" class="button-twitter">
                        <i class="social-icon fa fa-twitter"></i>
                    </a>
                    <a href="" class="button-google">
                        <i class="social-icon fa fa-google-plus"></i>
                    </a>
                </div>
            </div>
            <div class="loginbox-or">
                <div class="or-line"></div>
                <div class="or">OR</div>
            </div>

            {!! Form::open(['route' => 'sessions.store']) !!}

                <div class="loginbox-textbox">
                {!!  Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email', 'required' => 'required']); !!}
                {!! errors_for('email',$errors) !!}
                </div>
                
                <div class="loginbox-textbox">
                {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Password', 'requred' => 'required']); !!}
                {!! errors_for('password', $errors) !!}
                </div>

                <div class="loginbox-textbox">  
                    <label>
                        {!! Form::checkbox('remember', 1, null, ['class' => 'colored-primary']) !!}
                            <span class="text darkgray">Remember me</span>
                    </label>
                </div>

                <div class="loginbox-forgot">
                    <a href="">Forgot Password?</a>
                </div>
                <div class="loginbox-submit">                   
                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-block']);!!}
                </div>

            {!! Form::close() !!}
            
         
         
            
       <!--      <div class="loginbox-signup">
                <a href="register.html">Sign Up With Email</a>
            </div> -->
        </div>
        <div class="logobox">

                @if (session()->has('flash_message'))
                    <div class="alert alert-success">
                        {{ session()->get('flash_message') }}
                    </div>
                @endif

                @if (session()->has('error_message'))
                    <div class="alert alert-danger">
                        {{ session()->get('error_message') }}
                    </div>
                @endif
                
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.js"></script>

    
</body>
<!--Body Ends-->
</html>
