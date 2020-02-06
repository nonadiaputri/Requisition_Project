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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    
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
<div class="login-box" style="width:auto">
<div class="col-sm-6">

  <!-- /.login-logo -->
  <div class="login-box-body" style="border-radius:20px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); ">

	<img src="<?= base_url(); ?>assets/images/kgmedia.png" alt="KGMedia Mission" style="width:20%; margin-left:40%; ">

    <h3 class="login-box-msg">Register Form KGMedia Portal</h3>
	
    <form action="#" method="post">
        <div class="form-group has-feedback">
            <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" required="required">
            <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required="required">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
                    <div class="form-group ">
                        <div class="col-md-8">
                            <label class="control-label col-form-label">Unit</label>
                        
                            <select class="form-control" name="unit" id="unit" required="required">
                            <option value="">--Select Value--</option>
                            <?php foreach($unit as $key){; ?>
                            
                            <option value="<?php echo $key["id"];?>"><?php echo $key["name"];?></option>
                            <?php }; ?>
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
                            
                            <option value="0">--Select Value--</option>
                            
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
                              <option value="0">--Select Value--</option>
                              <?php foreach($pos as $key){;?>
                              <option value="<?php echo $key["id"];?>"><?php echo $key["position"];?></option>
                              <?php }; ?>
                            </select>
                        <span id="error_status" class="text-danger"></span>
                </div>
            </div>
        </div>
        <div class="form-group has-feedback">
            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required="required">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Your Phone Number">
            <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
        </div>
        
              <!-- Date -->
              <div class="form-group">
                <label>Birthdate:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </div>
                  <input type="text" name="bod" id="bod" class="form-control pull-right" >
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
            <div class="col-xs-12" style="margin:auto; padding:10px">
                <button type="button" id="btn-submit" name="btn-submit" class="btn btn-primary btn-block" style="border-radius:20px;">Submit</button>
            </div>
            <div class="col-xs-12" style="margin:auto; padding:10%">
            <a href="<?= base_url(); ?>login/index">Already Registered? Login here</a>
            <div class="col-xs-12" style="margin:auto; padding-top:10px">
            <!-- /.col -->
        </div>
      
    </form>

  </div>
  </div>
    

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
<!-- <script src="<?= base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="<?= base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- iCheck -->
<script src="<?= base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript">
 
  $(document).ready(function () {
   //Date picker
    $('#bod').datetimepicker({ 
        format: 'YYYY/MM/DD'
    });
    
    $("#unit").on('change',function(){
      var pos = $('#unit').val();
      var rep;
      console.log(pos);
				$.ajax({
					url 		: "<?= BASE_URL()?>register/get_subunit/"+$("#unit").val(),
					method 		: "get",
          dataType : "json",
          data : {'id': pos},
					success : function(data){
            console.log(data);
            var output = '';
          
          $.each(data, function (i) {
          //var rep;
          //console.log("data"+data[i]['FullName']);
          if (data[i]['name'] === null) {
            rep = "Empty";
          }else{
            rep = data[i]['name'];
          }
          output += '<option value="' + data[i]['id']+'"data-subtext="'+data[i]['name']+'">' + data[i]['id']+'('+rep+')</option>';
          });
          $('#subunit').append(output);
						//$("#subunit").html(data);
					},
					error : function(XMLHttpRequest, textStatus, errorThrown) {
						alert("Error Code");
					}
				})
      });
			

      $('#btn-submit').click(function(){

      var nik = $('#nik').val();
      var name = $('#name').val();
      var pass = $('#pass').val();
      var unit = $('#unit').val();
      var subunit = $('#subunit').val();
      var position = $('#position').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var bod = $('#bod').val();

      $.ajax({
        url:"<?php echo base_url('register/submit_register');?>",
        method:"POST",
        data:{ 'nik':nik,
               'name':name,
               'pass' : pass,
               'unit' : unit,
               // 'req_position':req_position,
               // 'req_org' : req_org,
               'subunit':subunit,
               'position':position,
               'email':email, 
               'phone':phone,
               'bod':bod},
        success:function(data){
          console.log(data);
          
          if (data !== null) {
                  alert('New employee data successfully created!');
                  window.location.href = '<?php echo base_url('login/index');?>';
                }
              },
            error:function(){
                alert('error ... ');
          }
  });
});
  });

    
</script>

</body>

</html>
