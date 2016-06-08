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
    <title>Register Page</title>

    <meta name="description" content="register page" />
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
    <div class="register-container animated fadeInDown">
        <div class="registerbox bg-white">
            <div class="registerbox-title">Register</div>

            <div class="registerbox-caption ">Please fill in your information</div>
            {!! Form::open(['route' => 'registration.store']) !!}
             
                <div class="registerbox-textbox">
                {!!  Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Username', 'required' => 'required']); !!}
                {!! errors_for('email',$errors) !!}
                </div>               
                
                <div class="registerbox-textbox">
                {!! Form::password('password', ['class' => 'form-control','placeholder' => 'Enter Password', 'required' => 'required']); !!}
                {!! errors_for('password', $errors)!!}
                </div>

                 <div class="registerbox-textbox">
                {!! Form::password('password_confirmation', array('class' => 'form-control','placeholder' => 'Confirm Password')); !!}

                </div>

                <div class="registerbox-textbox">
                {!!  Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Fisrst Name', 'required' => 'required']); !!}
                {!! errors_for('first_name', $errors)!!}
                </div>

                <div class="registerbox-textbox">
                {!!  Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name', 'required' => 'required']); !!}
                {!! errors_for('last_name', $errors)!!}

                </div>
                <div class="registerbox-textbox">
                <select name = "roles" class="selectpicker" required="required">
                <option value="" disabled selected>Select Role</option>
                @foreach ($roles as $role)
                    <option>{{$role->name}}</option>
                @endforeach                  
                </select>
                {!! errors_for('roles',$errors) !!}
                    <div class="registerbox-textbox no-padding-bottom">
                        <div class="checkbox">
                            <label>
                        
                            {!! Form::checkbox('checkbox', 1, null, ['class' => 'colored-primary']) !!}
                                <span class="text darkgray">I agree to the Company <a class="themeprimary">Terms of Service</a> and Privacy Policy</span>
                            </label>
                        </div>
                        {!! errors_for('checkbox', $errors) !!}
                    </div>
             
                <div class="registerbox-submit">                 
                    {!! Form::submit('SUBMIT', ['class' => 'btn btn-primary pull-right']) !!}
                </div>

            {!! Form::close() !!}    
            
            
        </div>
        <div class="logobox">
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>

    <!--Beyond Scripts-->
    <script src="assets/js/beyond.min.js"></script>
    
</body>
<!--Body Ends-->
</html>
