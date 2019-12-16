<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KGMedia | <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2));?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  	<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
  
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
 
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">
    <?php echo $header;?>
    <?php echo $sidebar;?>
      <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      	<section class="content-header">
	      <h1>
	        Add Member Organization Form
	        <small>Preview</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">Forms</a></li>
	        <li class="active">Advanced Elements</li>
	      </ol>
	    </section>
	    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Request Hire Form</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body">
            <h4 class="card-title">Requestor Information</h4>
            <hr class="mt-0 mb-5">

            <div class="row">
	          	<div class="col-md-8">
	                <label class="control-label">Organization Name</label>
                  <?php foreach($org as $org){ ?>
	                <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "<?php echo $org['OrganizationName']; ?>" required="required" readonly>
                  <?php } ?>

                  <?php foreach($user as $user){ ?>
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value = "<?php echo $user['UserID']; ?>" required="required" readonly>
                  <?php } ?>
                  <span id="error_req_org" class="text-danger"></span>
	          </div>
	        </div>


	        <div class="row">
	          	<div class="form-group">
	                <div class="col-md-8">
	                  <label class="control-label col-form-label">Employee Name</label>

	                  <select onchange="cek_database()" class="form-control chs-select" name="member" id="member" style="width:100%" required="required">
	                        <option default>Select Employee Name</option>
	                        <?php foreach ($member as $member) { ?>
	                        <option id="personnel_id"value="<?php echo $member['PersonnelID'];?>"><?php echo $member['PersonnelName'];?></option>
	                        <?php } ?>
	                    </select>
                      <!-- <input type="text" class="form-control" id="member_name" name="member_name" required="required">
                      <input type="hidden" class="form-control" id="member_id" name="member_id" required="required" > -->
                     
                      <!-- <select class="member form-control" name="member_name" id="member_name" style="width:500px"  required="required">
                          <option value=""></option>
                       </select> -->
                     
                     
                      <span id="error_requestor" class="text-danger"></span>
                    
	                </div>
	                  
	            </div>
	            </div>
	        

	        <div class="row">
	         	<div class="form-group">
		              <div class="col-md-8">
		                <label class="control-label col-form-label">Position Name</label>
		                  <input type="text" class="form-control" name="req_position" id="req_position" required="required" readonly>
		                  <input type="hidden" class="form-control" name="req_position_id" id="req_position_id"  required="required" readonly>
		                  <span id="error_req_position" class="text-danger"></span>
		                </div>
		            </div>
			</div>
			<br>



	        <div class="row">
	        	<div class="form-group">
                  	<div style="width:100%;height:100%;vertical-align:middle;text-align:center;">
	                    <button type="button" id="btn-save" style="margin: auto;" class="btn waves-effect waves-light btn-primary">Save</button>
                  </div>
                </div>  	
	        </div>
	        


        </div>
          <!-- /.row -->
       </div>
    </div>
      
  </section>
</div>

<div class="modal fade" role="dialog" id="myModal">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
     	<div class="modal-body">
    	<p align="center">Are you sure you want to request ?</p>
  	</div>
  	<div class="modal-footer">
    	<button type="button" id="button-smt" class="btn btn-primary mr-auto" >Yes</button>
    	<button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
  	</div>
		</div>
	</div>
</div>
      <!-- /.box -->

    </section>
   
            <!-- ============================================================== -->
            
</body>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
<!-- ./wrapper -->


</body>
<script src="<?= base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url(); ?>assets/bower_components/chart.js/Chart.js"></script>

<script type="text/javascript">



   var option_value;
   
            

            // function cek_database(){
            //       var member = $("#member").val();
            //       $.ajax({
            //           url: "<?php echo base_url('Hr/search_member');?>",
            //           data:"member="+member ,
            //       }).success(function (data) {
            //           var json = data,
            //           obj = JSON.parse(json);
            //           $('#req_position').val(obj.PositionName);
            //       });
          
            //   }


            
  $(document).ready(function(){
    // To allow the dynamic element to able to use this change event
    // See here for more info, https://stackoverflow.com/questions/1359018/how-do-i-attach-events-to-dynamic-html-elements-with-jquery
   

  $('#status').on('change',function(){
        if( $('#status').val()=="2"){
          $("#repname").show();
          }
          else{
          $("#repname").hide();
          }
    });

  $('#btn-save').click(function(e){
  e.preventDefault();   
      var user_id = $('#user_id').val();
      var personnel_id = $('#personnel_id').val();

      $.ajax({
        url:"<?php echo base_url('hr/save_data_personnel');?>",
        method:"POST",
        data:{ 'user_id' : user_id,
               'personnel_id':personnel_id
               },
        success:function(data){
         // window.location.href = '<?php echo base_url('hr/Hire_history');?>';
          console.log(data);
          if (data.status) {
                  alert('Save as Draft');
                }
              },
            error:function(){
                alert('error ... ');
            }
        });
      });

    
       $('#myModal').hide();
          $('.modal-fade').hide();
          $(".modal-backdrop").remove();
        //  window.location.href = '<?php echo base_url('hr/index');?>';
  //  });


    

  });

    
</script>
</html>
