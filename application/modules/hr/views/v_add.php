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
	                <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "<?php echo $this->session->userdata('organization'); ?>" required="required" readonly>
	                <input type="text" class="form-control" name="org_id" id="org_id" value = "<?php echo $this->session->userdata('dept_id'); ?>" required="required" readonly>
	                <span id="error_req_org" class="text-danger"></span>
	          </div>
	        </div>


	        <div class="row">
	          	<div class="form-group">
	                <div class="col-md-8">
	                  <label class="control-label col-form-label">Member Name</label>

	                  <select class="form-control chs-select" name="chs-member" id="chs-member" style="width:100%" required="required">
	                        <option default>Select Member Name</option>
	                        <?php foreach ($member as $member) { ?>
	                        <option value="<?php echo $member['ID'];?>"><?php echo $member['PersonnelName'];?></option>
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
		                  <input type="text" class="form-control" name="req_position" id="req_position" value = "<?php echo $this->session->userdata('position'); ?>" required="required" readonly>
		                  <input type="hidden" class="form-control" name="req_position_id" id="req_position_id" value = "<?php echo $this->session->userdata('id_position'); ?>" required="required" readonly>
		                  <span id="error_req_position" class="text-danger"></span>
		                </div>
		            </div>
			</div>
			<br>



	        <div class="row">
	        	<div class="form-group">
                  	<div style="width:100%;height:100%;vertical-align:middle;text-align:center;">
	                    <button type="button" id="btn-submit" style="margin: auto;" class="btn waves-effect waves-light btn-primary">Save</button>
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
   
            $('.searching').select2({
                placeholder: 'Department Name',
                ajax:{
                    url: "<?php echo base_url('hr/select2'); ?>",
                    dataType: "json",
                    delay: 250,
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

          //   $('#requestor').on('select2:select', function (e) {
          //     var name = $('#requestor :selected').text();
          //     console.log($('#requestor :selected').text());
          //     console.log(name);
          //     if ($('#requestor :selected').text() != '') {
          //       $.ajax({
          //           url:"<?php echo base_url('hr/search_info');?>",
          //           method:"GET",
          //           dataType:'json',
          //           data:{ 'Name':name },

          //           success:function(data){
          //             if (data) {
          //               $('#dis-pos').show();
          //               $('#dis-org').show();
          //               $('#req_position_id').val(data.PositionID);
          //               $('#req_org_id').val(data.Organization);
          //               $('#req_position').val(data.PositionName);
          //               $('#req_org').val(data.OrganizationName);
                        
          //               }
          //             },
          //           error:function(){
          //                   alert('error ... ');
          //           }
          //       });
             
          //   }
          // });

            // $('.position').select2({
            //     placeholder: 'Requested Position',
            //     ajax:{
            //         url: "<?php echo base_url('hr/select_position'); ?>",
            //         dataType: "json",
            //         delay: 250,
            //         processResults: function(data){
            //             var results = [];

            //             $.each(data, function(index, item){
            //                 results.push({
            //                     id: item.ID,
            //                     text: item.Name,
            //                     option_value:item.ID
            //                 });     
            //             });
            //             return{
            //                 results: results,
            //                 cache: true,
            //             };
            //         },
            //     }
            // });

          //   $('.member').select2({
          //       placeholder: 'Enter The Request Name',
          //       ajax:{
          //           url: "<?php echo base_url('Hr/member'); ?>",
          //           dataType: "json",
          //           delay: 250,
          //      processResults: function(data){
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

          //   $('#member_name').on('select2:select', function (e) {
          //     var member = $('#member_name :selected').text();
          //     console.log($('#member_name :selected').text());

          //     if ($('#member_name :selected').text() != '') {
          //       $.ajax({
          //           url:"<?php echo base_url('Hr/search_member');?>",
          //           method:"GET",
          //           dataType:'json',
          //           data:{ 'dept_id': member },
                
          //           success:function(data){
          //             if (data) {
          //               // $('#dis-pos').show();
          //              // $('#c-position').show();
          //               console.log(data);
          //               console.log(data.Position);
          //               console.log(data.PositionID);
                        
          //             //  $('#req_position_id').val(data.PositionID);
          //               $('#current_position_id').val(data.PositionID);
          //            //   $('#req_position').val(data.PositionName);
          //               $('#current_position').val(data.Position);
          //               $('#current_org_id').val(data.OrganizationID);
                        
          //               }
          //             },
          //           error:function(){
          //                   alert('error ... ');
          //           }
          //       });
             
          //   }
          // });
            
  $(document).ready(function(){
    // To allow the dynamic element to able to use this change event
    // See here for more info, https://stackoverflow.com/questions/1359018/how-do-i-attach-events-to-dynamic-html-elements-with-jquery
    var arr_id=[];
    var temp;
    
   var rep;
   $('#display-btn').click(function(e){
     for (var i = 0; i <= arr_id.length-1; i++) {
      if (i==(arr_id.length-1)) {
        temp = arr_id[i];
         console.log(temp);   
      }    
     }
     $.ajax({
        url:"<?php echo base_url('hr/search_position');?>",
        method:"POST",
        dataType : "json",
        data:{ 'ID' : temp},
        success:function(data){
          console.log(data);
          var output = '';
          $.each(data, function (i) {
            //var rep;
            //console.log("data"+data[i]['FullName']);
            if (data[i]['FullName'] === null) {
              rep = "Empty";
            }else{
              rep = data[i]['FullName'];
            }
            output += '<option value="' + data[i]['ID']+'"data-subtext="'+data[i]['FullName']+'">' + data[i]['Position']+'('+rep+')</option>';
          });
          $('#position').append(output);
        },
        error:function(){
                alert('error ... ');
            }
        });
   });

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
      var requestor_id = $('#requestor_id').val();
      var req_position_id = $('#req_position_id').val();
      var org_id = $('#org_id').val();
      var position = $('#position').val();
      var total = $('#ttl').val();
      var placement = $('#placement').val();
      var status = $('#status').val();
      var workdate = $('#workdate').val();
      var ReplacementName = $('#ReplacementName').val();
      var responsibility = CKEDITOR.instances["responsibility"].getData();
      var requirement = CKEDITOR.instances["requirement"].getData();
      //console.log("btn click"+req_position_id);

      $.ajax({
        url:"<?php echo base_url('hr/save_data');?>",
        method:"POST",
        data:{ 'requestor_id' : requestor_id,
               'req_position_id':req_position_id,
               'org_id' : org_id,
               'position':position,
               'total':total,
               'placement':placement, 
               'status':status,
               'workdate':workdate,
               'ReplacementName':ReplacementName,
               'responsibility' : responsibility,
               'requirement' : requirement},
        success:function(data){
          window.location.href = '<?php echo base_url('hr/Hire_history');?>';
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

        var requestor_id = $('#requestor_id').val();
        var req_position_id = $('#req_position_id').val();
        var org_id = $('#org_id').val();
        var position = $('#position').val();
        var total = $('#total').val();
        var placement = $('#placement').val();
        var status = $('#status').val();
        var workdate = $('#workdate').val();
        var ReplacementName = $('#ReplacementName').val();
        var responsibility = CKEDITOR.instances["responsibility"].getData();
        var requirement = CKEDITOR.instances["requirement"].getData();
        var ttl = $('#ttl').val();

        var error_requestor = '';
        var error_req_position = '';
        var error_req_org = '';
        var error_position = '';
        var error_total = '';
        var error_placement = '';
        var error_status = '';
        var error_workdate = '';
        var error_replacementName = '';
        var error_requirement = '';
        var error_responsibility = '';
        var error_ttl = '';

        // if(requestor == ''){
        //  error_requestor = 'Requestor Name is required';
        //  $('#error_requestor').text(error_requestor);
        //  $('#requestor').css('border-color', '#cc0000');
        //  requestor = '';
        // }else{
        //  error_requestor = '';
        //  console.log($('#requestor').val());
        //  $('#error_requestor').text(error_requestor);
        //  $('#requestor').css('border-color', '');
        //  requestor = $('#requestor').val();
        // }

        // if(req_position == ''){
        //  error_req_position = 'Requestor Position is required';
        //  $('#error_req_position').text(error_req_position);
        //  $('#req_position').css('border-color', '#cc0000');
        //  req_position = '';
        // }else{
        //  error_req_position = '';
        //  console.log($('#req_position').val());
        //  $('#error_req_position').text(error_req_position);
        //  $('#req_position').css('border-color', '');
        //  req_position = $('#req_position').val();
        // }

        // if(req_org == ''){
        //  error_req_org = 'Organization is required';
        //  $('#error_req_org').text(error_req_org);
        //  $('#req_org').css('border-color', '#cc0000');
        //  req_org = '';
        // }else{
        //  error_req_org = '';
        //  console.log($('#req_org').val());
        //  $('#error_req_org').text(error_req_org);
        //  $('#req_org').css('border-color', '');
        //  req_org = $('#req_org').val();
        // }

        if(position == ''){
         error_position = 'Position is required';
         $('#error_position').text(error_position);
         $('#position').css('border-color', '#cc0000');
         position = '';
        }else{
         error_position = '';
         console.log($('#position').val());
         $('#error_position').text(error_position);
         $('#position').css('border-color', '');
         position = $('#position').val();
        }

        if(ttl == ''){
         error_ttl = 'Total is required';
         $('#error_ttl').text(error_ttl);
         $('#ttl').css('border-color', '#cc0000');
         ttl = '';
        }else{
         error_ttl = '';
         console.log($('#ttl').val());
         $('#error_ttl').text(error_ttl);
         $('#ttl').css('border-color', '');
         ttl = $('#ttl').val();
        }  

        if(placement == ''){
         error_placement = 'Placement is required';
         $('#error_placement').text(error_placement);
         $('#placement').css('border-color', '#cc0000');
         placement = '';
        }else{
         error_placement = '';
         console.log($('#placement').val());
         $('#error_placement').text(error_placement);
         $('#placement').css('border-color', '');
         placement = $('#placement').val();
        }

        if(status == ''){
         error_status = 'Status is required';
         $('#error_status').text(error_status);
         $('#status').css('border-color', '#cc0000');
         status = '';
        }else{
         error_status = '';
         console.log($('#status').val());
         $('#error_status').text(error_status);
         $('#status').css('border-color', '');
         status = $('#status').val();
        }

        if ($('#status').val() == '2') {
          if($('#ReplacementName').val() == ''){
            error_replacementName = 'Replacement Name is required';
           $('#error_replacementName').text(error_replacementName);
           $('#ReplacementName').css('border-color', '#cc0000');
           ReplacementName = '';
          }else{
           error_replacementName = '';
           console.log($('#ReplacementName').val());
           $('#error_replacementName').text(error_status);
           $('#ReplacementName').css('border-color', '');
           ReplacementName = $('#ReplacementName').val();
          }

          }

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

        if(responsibility == ''){
         error_responsibility = 'Responsibility is required';
         $('#error_responsibility').text(error_responsibility);
         $('#responsibility').css('border-color', '#cc0000');
         responsibility = '';
        }else{
         error_responsibility = '';
         console.log(responsibility);
         $('#error_responsibility').text(error_responsibility);
         $('#responsibility').css('border-color', '');
         responsibility = $('#responsibility').val();
        }

        if(requirement == ''){
         error_requirement = 'Requirement is required';
         $('#error_requirement').text(error_requirement);
         $('#requirement').css('border-color', '#cc0000');
         requirement = '';
        }else{
         error_requirement = '';
         console.log(requirement);
         $('#error_requirement').text(error_requirement);
         $('#requirement').css('border-color', '');
         requirement = $('#requirement').val();
        }

        if (error_requestor == '' && error_req_position == '' && error_req_org == '' && error_position == '' && error_total == '' && error_placement == '' && error_status == '' && error_workdate == '' && error_responsibility == '' && error_requirement == '' && error_ttl == '' ) {
          $('#myModal').modal('show'); 
        }
          

    });
    

    $('#button-smt').click(function(){
      var requestor_id = $('#requestor_id').val();
      var req_position_id = $('#req_position_id').val();
      var org_id = $('#org_id').val();
      var position = $('#position').val();
      var total = $('#ttl').val();
      var placement = $('#placement').val();
      var status = $('#status').val();
      var workdate = $('#workdate').val();
      var ReplacementName = $('#ReplacementName').val();
      var responsibility = CKEDITOR.instances["responsibility"].getData();
      var requirement = CKEDITOR.instances["requirement"].getData();

      $.ajax({
        url:"<?php echo base_url('hr/submit_hire');?>",
        method:"POST",
        data:{ 'requestor_id':requestor_id,
               'req_position_id':req_position_id,
               'org_id' : org_id,
               // 'req_position':req_position,
               // 'req_org' : req_org,
               'position':position,
               'total':total,
               'placement':placement, 
               'status':status,
               'workdate':workdate,
               'ReplacementName':ReplacementName,
               'responsibility' : responsibility,
               'requirement' : requirement},
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
         // window.location.href = '<?php echo base_url('hr/hire_history');?>';
    });


    

  });

    
</script>
</html>
