<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KGMedia | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/iCheck/square/blue.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" />
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    

</head>
<body class="login-page" style="background-image: url('<?= base_url(); ?>assets/images/bg-login.jpg');">
<div class="login-box">
<div class="col-md-12">

  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

	<img src="<?= base_url(); ?>assets/images/kgmedia.png" alt="KGMedia Mission" style="width:100%; margin:auto; padding:10%">

    <p class="login-box-msg">Register Form</p>
	
    <form action="#" method="post">
        <div class="form-group has-feedback">
            <input type="text" name="uid" class="form-control" placeholder="NIK">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" placeholder="Your Name">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="pwd" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
                    <div class="form-group ">
                        <div class="col-md-8">
                            <label class="control-label col-form-label">Unit</label>
                        
                            <select class="form-control" name="unit" id="unit" required="required">
                            </select>
                        <span id="error_status" class="text-danger"></span>
                    </div>
                </div>
            </div>
        <div class="row">
                    <div class="form-group ">
                        <div class="col-md-8">
                            <label class="control-label col-form-label">Sub-unit</label>
                        
                            <select class="form-control" name="subunit" id="subunit" required="required">
                            </select>
                        <span id="error_status" class="text-danger"></span>
                    </div>
                </div>
            </div>
        <div class="row">
                <div class="form-group ">
                <div class="col-md-8">
                            <label class="control-label col-form-label">Position</label>
                        
                            <select class="form-control" name="position" id="position" required="required">
                            </select>
                        <span id="error_status" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Your Email" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="tel" name="tel" class="form-control" placeholder="Your Phone Number">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        
              <!-- Date -->
              <div class="form-group">
                <label>Birthdate:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->

        <div class="row">
            <div class="col-xs-8">
            <!--
            <div class="checkbox icheck">
                <label>
                <input type="checkbox"> Remember Me
                </label>
            </div>
            -->
            </div>
            <!-- /.col -->
            <div class="col-xs-12" style="margin:auto; padding:10%">
            <button type="submit" class="btn btn-primary btn-block" style="border-radius:20px;">Submit</button>
            </div>
            
            <!-- /.col -->
        </div>
      
    </form>

  </div></div>
    

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"> Log in using
        Kompas.com eMail</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"> Log in using
        Gmail</a>
    </div> -->
    <!-- /.social-auth-links -->
<!-- 
    <a href="<?= base_url(); ?>login/forgot">Not Remember</a><br>
    <a href="<?= base_url(); ?>register" class="text-center">Register a New Employee</a>

  </div> -->
  <!-- /.login-box-body -->
<!-- </div> -->
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });

    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
        });

  });
</script>

</body>

</html>
