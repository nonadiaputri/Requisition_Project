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
	        Request Form Movement
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
	          	<div class="form-group">
	                <div class="col-md-8">
	                  <label class="control-label col-form-label">Requestor Name</label>
	                  <!-- <select class="form-control chs-select" name="requestor" id="requestor" style="width:80%" required="required">
	                        <option default>Select Requestor</option>
	                        <?php foreach ($person as $person) { ?>
	                        <option value="<?php echo $person['PersonnelID'];?>"><?php echo $person['Name'];?></option>
	                        <?php } ?>
	                </select> -->
                  <input type="text" class="form-control" id="requestor" name="requestor" value = "<?php echo $this->session->userdata('name'); ?>" required="required" readonly>
	                    <input type="hidden" class="form-control" id="requestor_id" name="requestor_id" value = "<?php echo $this->session->userdata('ID'); ?>" required="required" readonly>
	                </div>
	                  <!-- <div class="col-md-7">
	                    <input type="text" class="form-control" id="requestor" name="requestor" value = "<?php echo $this->session->userdata('name'); ?>" required="required" readonly>
	                    <input type="hidden" class="form-control" id="requestor_id" name="requestor_id" value = "<?php echo $this->session->userdata('PersonnelIDList'); ?>" required="required" readonly>
	                    <span id="error_requestor" class="text-danger"></span>
	                  </div> -->
	            </div>
	            </div>
	        <div class="row">
	          	<div class="col-md-8">
	                <label class="control-label">Organization Name</label>
	                <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "<?php echo $this->session->userdata('organization'); ?>" required="required" readonly>
	                <input type="hidden" class="form-control" name="org_id" id="org_id" value = "<?php echo $this->session->userdata('OrganizationID'); ?>" required="required" readonly>
	                <span id="error_req_org" class="text-danger"></span>
	          </div>
	        </div>

	        <div class="row">
	         	<div class="form-group">
		              <div class="col-md-8">
		                <label class="control-label col-form-label">Position Name</label>
		                  <input type="text" class="form-control" name="req_position" id="req_position" value = "<?php echo $this->session->userdata('position'); ?>" required="required" readonly>
		                  <input type="hidden" class="form-control" name="req_position_id" id="req_position_id" value = "<?php echo $this->session->userdata('PositionID'); ?>" required="required" readonly>
		                  <span id="error_req_position" class="text-danger"></span>
		                </div>
		            </div>
			</div>
			<br>
			
            <h4 class="card-title">Request Movement Information</h4>
            <hr class="mt-0 mb-5">

            <div class="row">
            	<div class="form-group">
	                <div class="col-md-8">
	                  <label class="control-label col-form-label">Movement Request Type</label>
	                  <div id="chs-container">
	                    <!-- <select class="form-control chs-select" id="request_type" style="width:80%; display: none">
	                        <option default>Select</option>
	                    </select> -->

	                    <select class="form-control chs-select" name="chs-org" id="chs-org" style="width:80%" required="required">
	                        <option default>Select Movement Request Type</option>
	                        <?php foreach ($type as $type) { ?>
	                        <option value="<?php echo $type['ID'];?>"><?php echo $type['Name'];?></option>
	                        <?php } ?>
	                    </select>
	                    <br>

	                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Request Name</label>
                                      </div>
                                      
                                    </div>

                                    <div class="form-group row">
                                      
                                      <div class="col-sm-6">
                                        <select class="request form-control" name="request_name" id="request_name" style="width:500px"  required="required">
                                          <option value=""></option>
                                        </select>
                                        
                                        <span id="error_request" class="text-danger"></span>
                                      </div>
                                    </div>

                                    <br> <br>

                                    
                                    


                                    <div class="form-group row";>
                                      <div class="col-sm-6">
                                        <label class="control-label col-form-label">Current Position</label>
                                        
                                        <input type="text" name="current_position" id="current_position" required="required" class="form-control" readonly>
                                        <input type="hidden" name="current_position_id" id="current_position_id" required="required" class="form-control">
                                        <input type="hidden" name="current_org_id" id="current_org_id" required="required" class="form-control">
                                        <span id="error_current_position" class="text-danger"></span>
                                      </div>

                                      <div class="col-sm-6">
                                             <label class="control-label col-form-label">New Position</label>
                                            

                                              <select class="form-control chs-select" name="new_position" id="new_position" style="width:90%" required="required">
                                                  <option default>Select New Position</option>
                                                  <?php foreach ($pos as $pos) { ?>
                                                  <option value="<?php echo $pos['ID'];?>"><?php echo $pos['Name'];?></option>
                                                  <?php } ?>
                                              </select>
                                              <input type="hidden" name="new_org_id" id="new_org_id" required="required" class="form-control">
                                              <span id="error_new_position" class="text-danger"></span>
                                      </div>

                                      
                                    </div>


                                     
                                    <div class="form-group row">
                                      <div class="col-sm-6">
                                        <label class="control-label col-form-label">Started Work Date from Current Position</label>
                                        <input type="date" id="startdate" name="startdate" min="2018-01-01" max="2030-12-31" required="required" class="form-control">
                                        <span id="error_startdate" class="text-danger"></span>
                                      </div>
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Expected Work Date for New Position</label>
                                        <input type="date" id="workdate" name="workdate" min="2018-01-01" max="2030-12-31" required="required" class="form-control">
                                        <span id="error_workdate" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-6">
                                        <label class="control-label col-form-label">Current Responsibilities</label>
                                        ​<textarea class="ckeditor" id="current_responsibilities" name="current_responsibilities"></textarea>
                                        <span id="error_current_responsibilities" class="text-danger"></span>
                                      </div>
                                      <div class="col-sm-6">
                                        <label class="control-label col-form-label"> New Responsibilities</label>
                                        ​<textarea class="ckeditor" id="new_responsibilities" name="new_responsibilities"></textarea>
                                        <span id="error_new_responsibilities" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <!-- <div class="form-group row">
                                      <div class="col-sm-6">
                                        
                                      </div>
                                      <div class="col-sm-6">
                                         <label class="control-label col-form-label">New Requirement</label>
                                         ​<textarea class="ckeditor" id="new_requirement" name="new_requirement"></textarea>
                                        <span id="error_new_requirement" class="text-danger"></span>
                                      </div>
                                    </div>
                                  </div> -->
                                  <div class="form-group row">
                                  <div style="width:100%;height:100%;vertical-align:middle;text-align:center;">
                                    <button type="button" id="btn-submit" style="margin: auto;" class="btn waves-effect waves-light btn-primary">Request</button>
                                    <button type="button" id="btn-save" style="margin: auto;" class="btn waves-effect waves-light btn-dark">Save as Draft</button>
                                  </div>
                                </div>

                                </div>
                                
                                </form>
                        </div>
          
                        </div>
                    </div>
                </div>
                <!-- End Row -->
                <!-- Row -->
             
      <div>
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
    </div>

            
                

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

  //  $('.requestor').select2({
  //               placeholder: 'Enter The Requestor Name',
  //               ajax:{
  //                   url: "<?php echo base_url('Promotion_4/requestor'); ?>",
  //                   dataType: "json",
  //                   delay: 250,
  //         processResults: function(data){
  //                       var results = [];

  //                       $.each(data, function(index, item){
  //                           results.push({
  //                               id: item.ID,
  //                               text: item.FullName,
  //                               option_value:item.ID
  //                           });
  //                       });
  //                       return{
  //                           results: results,
  //                           cache: true,
  //                       };
  //                   },
  //               }

  //           });

  //  $('#requestor_name').on('select2:select', function (e) {
  //             var name = $('#requestor :selected').text();
  //             console.log($('#requestor :selected').text());
  //             console.log(name);
  //             if ($('#requestor_name :selected').text() != '') {
  //               $.ajax({
  //                   url:"<?php echo base_url('Promotion_4/search_info');?>",
  //                   method:"GET",
  //                   dataType:'json',
  //                   data:{ 'Name':name },

  //                   success:function(data){
  //                     if (data) {
  //                       $('#dis-pos').show();
  //                       $('#dis-org').show();
  //                       console.log(data);
  //                       console.log(data.PositionName);
  //                       $('#req_position_id').val(data.PositionID);
  //                       $('#req_org_id').val(data.Organization);
  //                       $('#req_position').val(data.PositionName);
  //                       $('#req_org').val(data.OrganizationName);
                        
  //                       }
  //                     },
  //                   error:function(){
  //                           alert('error ... ');
  //                   }
  //               });
             
  //           }
  //         });


        // $('.position').select2({
        //         placeholder: 'Enter The Requestor Position',
        //         ajax:{
        //             url: "<?php echo base_url('Promotion_4/position'); ?>",
        //             dataType: "json",
        //             delay: 250,
        //   processResults: function(data){
        //                 var results = [];

        //                 $.each(data, function(index, item){
        //                     results.push({
        //                         id: item.ID,
        //                         text: item.Name,
        //                         option_value:item.ID
        //                     });
        //                 });
        //                 return{
        //                     results: results,
        //                     cache: true,
        //                 };
        //             },
        //         }

        //     });

            
         $('.request').select2({
                placeholder: 'Enter The Request Name',
                ajax:{
                    url: "<?php echo base_url('Hr_movement/request'); ?>",
                    dataType: "json",
                    delay: 250,
          processResults: function(data){
                        var results = [];

                        $.each(data, function(index, item){
                            results.push({
                                id: item.ID,
                                text: item.FullName,
                                option_value:item.ID
                            });
                        });
                        return{
                            results: results,
                            cache: true,
                        };
                    },
                }

            });

          //   $('.request_type').select2({
          //       placeholder: 'Enter The Movement Request Type',
          //       ajax:{
          //           url: "<?php echo base_url('Promotion_4/request_type'); ?>",
          //           dataType: "json",
          //           delay: 250,
          // processResults: function(data){
          //               var results = [];

          //               $.each(data, function(index, item){
          //                   results.push({
          //                       id: item.ID,
          //                       text: item.Name,
          //                       option_value:item.ID
          //                   });
          //               });
          //               return{
          //                   results: results,
          //                   cache: true,
          //               };
          //           },
          //       }

          //   });

            $('#request_name').on('select2:select', function (e) {
              var req = $('#request_name :selected').text();
              console.log($('#request_name :selected').text());

              if ($('#request_name :selected').text() != '') {
                $.ajax({
                    url:"<?php echo base_url('Hr_movement/search_requestor_pro');?>",
                    method:"GET",
                    dataType:'json',
                    data:{ 'Request': req },
                
                    success:function(data){
                      if (data) {
                        // $('#dis-pos').show();
                       // $('#c-position').show();
                        console.log(data);
                        console.log(data.Position);
                        console.log(data.PositionID);
                        
                      //  $('#req_position_id').val(data.PositionID);
                        $('#current_position_id').val(data.PositionID);
                     //   $('#req_position').val(data.PositionName);
                        $('#current_position').val(data.Position);
                        $('#current_org_id').val(data.OrganizationID);
                        
                        }
                      },
                    error:function(){
                            alert('error ... ');
                    }
                });
             
            }
          });

            $('.current-position').select2({
                placeholder: 'Enter The Current Position',
                ajax:{
                    url: "<?php echo base_url('Promotion_4/current_position'); ?>",
                    dataType: "json",
                    delay: 250,
          //           processResults: function (param) {
          //   return {
          //     compClue: param.term,
              
          //   };
          // },
          processResults: function(data){
                        var results = [];

                        $.each(data, function(index, item){
                            results.push({
                                id: item.ID,
                                text: item.Name,
                                option_value:item.ID
                            });
                        });
                        return{
                            results: results,
                            cache: true,
                        };
                    },
                }

            });

          //   $('#new_position').on('select2:select', function (e) {
          //     var newpos = $('#new_position :selected').text();
          //     console.log($('#new_position :selected').text());

          //     if ($('#new_position :selected').text() != '') {
          //       $.ajax({
          //           url:"<?php echo base_url('Promotion_4/search_new_position');?>",
          //           method:"GET",
          //           dataType:'json',
          //           data:{ 'Position': newpos },
                
          //           success:function(data){
          //             if (data) {
          //               // $('#dis-pos').show();
          //               //$('#c-position').show();
          //               console.log(data);
          //              // console.log(data.NewPosition);
          //               console.log(data.NewPositionID);
                        
          //             //  $('#req_position_id').val(data.PositionID);
          //               $('#new_position_id').val(data.NewPositionID);
          //            //   $('#req_position').val(data.PositionName);
          //             //  $('#new_position').val(data.NewPosition);
          //               $('#new_org_id').val(data.NewOrganizationID);
                        
          //               }
          //             },
          //           error:function(){
          //                   alert('error ... ');
          //           }
          //       });
             
          //   }
          // });

          //   $('.new-position').select2({
          //       placeholder: 'Enter The New Position',
          //       ajax:{
          //           url: "<?php echo base_url('Promotion_4/new_position'); ?>",
          //           dataType: "json",
          //           delay: 250,
          // //           processResults: function (param) {
          // //   return {
          // //     compClue: param.term,
              
          // //   };
          // // },
          // processResults: function(data){
          //               var results = [];

          //               $.each(data, function(index, item){
          //                   results.push({
          //                       id: item.ID,
          //                       text: item.Name,
          //                       option_value:item.ID
          //                   });
          //               });
          //               return{
          //                   results: results,
          //                   cache: true,
          //               };
          //           },
          //       }

          //   });

        
            
  $(document).ready(function(){

  var option_value;

  


//   $('#status').on('change',function(){
//         if( $('#status').val()==="2"){
//           $("#repname").show();
//           }
//           else{
//           $("#repname").hide();
//           }
//     });

  $('#btn-save').click(function(e){
  e.preventDefault();   
  var requestor_id = $('#requestor_id').val();
        var req_position_id = $('#req_position_id').val();
        var req_org_id = $('#req_org_id').val();
        var request_type = $('#request_type').val();
        var request_name = $('#request_name').val();
        var current_position_id = $('#current_position_id').val();
        var current_org_id = $('#current_org_id').val();
        var new_position = $('#new_position').val();
        var new_org_id = $('#new_org_id').val();
        var workdate= $('#workdate').val();
        var current_responsibilities = CKEDITOR.instances["current_responsibilities"].getData();
        var new_responsibilities = CKEDITOR.instances["new_responsibilities"].getData();
      //  var new_requirement = CKEDITOR.instances["new_requirement"].getData();
      //console.log("btn click"+req_position_id);

      $.ajax({
        url:"<?php echo base_url('Promotion_4/save_data');?>",
        method:"POST",
        data:{ 'requestor_id':requestor_id,
               'req_position_id':req_position_id,
               'req_org_id' : req_org_id,
               'request_type':request_type,
               'request_name':request_name, 
               'current_position_id':current_position_id,
               'current_org_id':current_org_id,
               'new_position':new_position,
               'new_org_id':new_org_id,
               'workdate':workdate,
               'current_responsibilities' : current_responsibilities,
               'new_responsibilities' : new_responsibilities
              // 'new_requirement' : new_requirement
               },

        success:function(data){
          window.location.href = '<?php echo base_url('Promotion_4/Promotion_history');?>';
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


    $('#btn-submit').click(function(){
        // var requestor_name = $('#requestor_name').val();
        var requestor = $('#requestor').val();
        var req_org = $('#req_org').val();
        var req_position = $('#req_position').val();
        var request_type = $('#request_type').val();
        var request_name = $('#request_name').val();
        var current_position = $('#current_position').val();
        var new_position = $('#new_position').val();
        // var startdate= $('#startdate').val();
        var workdate= $('#workdate').val();
        var current_responsibilities = CKEDITOR.instances["current_responsibilities"].getData();
        var new_responsibilities = CKEDITOR.instances["new_responsibilities"].getData();
      //  var new_requirement = CKEDITOR.instances["new_requirement"].getData();
        // var responsibility = $('#responsibility').val();
        // var requirement = $('#requirement').val();
        // var ttl = $('#ttl').val();

        var error_requestor = '';
        var error_req_org = '';
        var error_req_position = '';
        var error_req_org = '';
        var error_request_type = '';
        var error_request = '';
        var error_current_position = '';
        var error_new_position = '';
        // var error_startdate = '';
        var error_workdate = '';
        var error_current_responsibilities = '';
        var error_new_responsibilities = '';
      //  var error_new_requirement = '';
        
        // var error_ttl = '';

        if(requestor == ''){
         error_requestor = 'Requestor is required';
         $('#error_requestor').text(error_requestor);
         $('#requestor').css('border-color', '#cc0000');
         requestor = '';
        }else{
         error_requestor = '';
         console.log($('#requestor').val());
         $('#error_requestor').text(error_requestor);
         $('#requestor').css('border-color', '');
         requestor = $('#requestor').val();
        }

        if(req_position == ''){
         error_req_position = 'Position Name is required';
         $('#error_req_position').text(error_req_position);
         $('#req_position').css('border-color', '#cc0000');
         position = '';
        }else{
          error_req_position = '';
         console.log($('#req_position').val());
         $('#error_req_position').text(error_req_position);
         $('#req_position').css('border-color', '');
         req_position = $('#req_position').val();
        }

        if(req_org == ''){
         error_req_org = 'Organization is required';
         $('#error_req_org').text(error_req_org);
         $('#req_org').css('border-color', '#cc0000');
         req_org = '';
        }else{
          error_req_org = '';
         console.log($('#req_org').val());
         $('#error_req_org').text(error_req_org);
         $('#req_org').css('border-color', '');
         req_org = $('#req_org').val();
        }

        
        if(request_type == ''){
            error_request_type = 'Movement Request Type is required';
         $('#error_request_type').text(error_request);
         $('#request_type').css('border-color', '#cc0000');
         position = '';
        }else{
          error_request_type = '';
         console.log($('#request_type').val());
         $('#error_request_type').text(error_request_type);
         $('#request_type').css('border-color', '');
         position = $('#request_type').val();
        }

        if(request_name == ''){
            error_request = 'Request Name is required';
         $('#error_request').text(error_request);
         $('#request_name').css('border-color', '#cc0000');
         position = '';
        }else{
          error_request = '';
         console.log($('#request_name').val());
         $('#error_request').text(error_request);
         $('#request_name').css('border-color', '');
         position = $('#request_name').val();
        }

        if(current_position == ''){
            error_current_position = 'Current Position is required';
         $('#error_current_position').text(error_current_position);
         $('#current_position').css('border-color', '#cc0000');
         position = '';
        }else{
          error_current_position = '';
         console.log($('#current_position').val());
         $('#error_current_position').text(error_current_position);
         $('#current_position').css('border-color', '');
         position = $('#current_position').val();
        }

        if(new_position == ''){
          error_new_position = 'New Position is required';
         $('#error_new_position').text(error_new_position);
         $('#new_position').css('border-color', '#cc0000');
         position = '';
        }else{
          error_new_position = '';
         console.log($('#new_position').val());
         $('#error_new_position').text(error_new_position);
         $('#new_position').css('border-color', '');
         position = $('#new_position').val();
        }

        // if(startdate == ''){
        //  error_startdate = 'Startdate is required';
        //  $('#error_startdate').text(error_startdate);
        //  $('#startdate').css('border-color', '#cc0000');
        //  startdate = '';
        // }else{
        //  error_startdate = '';
        //  console.log($('#startdate').val());
        //  $('#error_startdate').text(error_startdate);
        //  $('#startdate').css('border-color', '');
        //  startdate = $('#startdate').val();
        // }

        if(workdate == ''){
         error_workdate = 'Workdate is required';
         $('#error_workdate').text(error_workdate);
         $('#workdate').css('border-color', '#cc0000');
         workdate = '';
        }else{
         error_workdate = '';
         console.log($('#workdate').val());
         $('#error_workdate').text(error_workdate);
         $('#workdate').css('border-color', '');
         workdate = $('#workdate').val();
        }

        if(current_responsibilities == ''){
         error_current_responsibilities = 'Current Responsibilities is required';
         $('#error_current_responsibilities').text(error_current_responsibilities);
         $('#current_responsibilities').css('border-color', '#cc0000');
         current_responsibilities = '';
        }else{
         error_current_responsibilities = '';
         console.log($('#current_responsibilities').val());
         $('#error_current_responsibilities').text(error_current_responsibilities);
         $('#current_responsibilities').css('border-color', '');
         current_responsibilities = $('#current_responsibilities').val();
        }

        if(new_responsibilities == ''){
         error_new_responsibilities = 'New Responsibilities is required';
         $('#error_new_responsibilities').text(error_new_responsibilities);
         $('#new_responsibilities').css('border-color', '#cc0000');
         new_responsibilities = '';
        }else{
         error_new_responsibilities = '';
         console.log($('#new_responsibilities').val());
         $('#error_new_responsibilities').text(error_new_responsibilities);
         $('#new_responsibilities').css('border-color', '');
         new_responsibilities = $('#new_responsibilities').val();
        }

        // if(new_requirement == ''){
        //  error_new_requirement = 'New requirement is required';
        //  $('#error_new_requirement').text(error_new_requirement);
        //  $('#new_requirement').css('border-color', '#cc0000');
        //  new_requirement = '';
        // }else{
        //  error_new_requirement = '';
        //  console.log($('#new_requirement').val());
        //  $('#error_new_requirement').text(error_new_requirement);
        //  $('#new_requirement').css('border-color', '');
        //  new_requirement = $('#new_requirement').val();
        // }

        if (error_requestor == '' && error_req_position == '' && error_req_org == '' && error_request == '' && error_current_position == '' && error_new_position == '' && error_workdate == '' && error_current_responsibilities == '' && error_new_responsibilities == '' ) {
          $('#myModal').modal('show'); 
        }
          

    });

    

    $('#button-smt').click(function(){
        var requestor_id = $('#requestor_id').val();
        var req_position_id = $('#req_position_id').val();
        var req_org_id = $('#req_org_id').val();
        var request_type = $('#request_type').val();
        var request_name = $('#request_name').val();
        var current_position = $('#current_position').val();
        var current_position_id = $('#current_position_id').val();
        var current_org_id = $('#current_org_id').val();
        var new_position = $('#new_position').val();
        var new_org_id = $('#new_org_id').val();
        var workdate= $('#workdate').val();
        var current_responsibilities = CKEDITOR.instances["current_responsibilities"].getData();
        var new_responsibilities = CKEDITOR.instances["new_responsibilities"].getData();
       // var new_requirement = CKEDITOR.instances["new_requirement"].getData();

     // var form_data = $('#myform').serialize();
     // console.log(form_data);
       $.ajax({
        url:"<?php echo base_url('Promotion_4/submit_promotion');?>",
        method:"POST",
        data:{'requestor_id':requestor_id,
               'req_position_id':req_position_id,
               'req_org_id' : req_org_id,
               'request_type':request_type,
               'request_name':request_name, 
               'current_position':current_position,
               'current_position_id':current_position_id,
               'current_org_id':current_org_id,
               'new_position':new_position,
               'new_org_id':new_org_id,
               'workdate':workdate,
               'current_responsibilities' : current_responsibilities,
               'new_responsibilities' : new_responsibilities
              // 'new_requirement' : new_requirement
               },



        success:function(data){
          console.log(data);
          if (data.status) {
                  alert('sukses!');
                }
              },
            error:function(){
                alert('error ... ');
        }
    });
       $('#myModal').hide();
          $('.modal-fade').hide();
          $(".modal-backdrop").remove();
          // window.location.href = '<?php echo base_url('Promotion_4/promotion_history');?>';
    });

  });

    
</script>
</html>
