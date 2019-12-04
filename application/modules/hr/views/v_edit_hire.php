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
	        Edit Form Hire
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
	                  <select class="form-control chs-select" name="requestor" id="requestor" style="width:100%" required="required">
	                        <option default>Select Requestor</option>
	                        <?php foreach ($person as $person) { ?>
	                        <option value="<?php echo $person['PersonnelID'];?>"><?php echo $person['Name'];?></option>
	                        <?php } ?>
	                </select>
                   <input type="text" class="form-control" id="id-req" name="id-req" value = "<?php echo $row['ID'];?>" required="required" readonly>
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
			
            <h4 class="card-title">Request Information</h4>
            <hr class="mt-0 mb-5">

            <div class="row">
            	<div class="form-group">
	                <div class="col-md-8">
	                  <label class="control-label col-form-label">Choose Organization</label>
	                  <div id="chs-container">
	                    <select class="form-control chs-select" id="chs-div-template" style="width:100%; display: none">
	                        <option default>Select</option>
	                    </select>

	                    <select class="form-control chs-select" name="chs-org" id="chs-org" style="width:100%" required="required">
	                        <option default>Select Organization</option>
	                        <?php foreach ($org as $org) { ?>
	                        <option value="<?php echo $org['ID'];?>"><?php echo $org['Name'];?></option>
	                        <?php } ?>
	                    </select>
	                    <br>

	                    <select class="form-control chs-select" name="chs-dep" id="chs-dep" style="width:100%;display: none" required="required">
	                        <option default>Select</option>
	                    </select>
	                    <br>
	                </div>
	                    <span id="error_position" class="text-danger"></span>
	                </div>
	                <div class="col-sm-12 offset-3">
			            <button type="button" id="display-btn">Display Position in This Unit</button>
			            <br>
			        </div>
	            </div>
	        </div>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                    	<label class="control-label col-form-label">Position</label>
                
                      	<select class="form-control selectpicker" data-show-subtext="true" data-size="5" name="position" id="position" style="width:100%;"  required="required">
                          <option value=""></option>
                        </select>
                        <span id="error_position" class="text-danger"></span>
                      </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label col-form-label">Total Need</label>
                    <select class="form-control" name="ttl" id="ttl" required="required">
                      <option value="" selected>Pilih</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>  
               
                    </select>  
                    <span id="error_ttl" class="text-danger"></span>     
                  </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label col-form-label">Placement</label>
                  
                    <select class="searching form-control" name="placement" id="placement" style="width:100%;"  required="required">
                      <option value=""></option>
                    </select>
                    <span id="error_placement" class="text-danger"></span>
                  </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group ">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Status</label>
                      
	                    <select class="form-control" name="status" id="status" required="required">
	                      <option value="" selected>Pilih</option>
	                      <option value="1">Additional</option>
	                      <option value="2">Replacement</option>
	                      <option value="5">Profesional Contract</option>
	                      <option value="6">Freelence</option>
	                      <option value="7">Internship</option>
	                      <option value="8">Outsourcing</option>  
	                    </select>
                    <span id="error_status" class="text-danger"></span>
                  </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group" style="display: none" id="repname">
                  <div class="col-md-8">
                    <label class="control-label col-form-label">Replacement Name</label>
                  
                   <select class="rep-name form-control" name="ReplacementName" id="ReplacementName" style="width:100%;"  required="required">
                      <option value=""></option>
                    </select>
                    <span id="error_replacementName" class="text-danger"></span>
                  </div>
                </div>
	        </div>
	        <br>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Expected Work Date</label>
                    </div>
                    <div class="col-md-8">
                    	<input class="form-control" type="date" id="workdate" name="workdate" min="2018-01-01" max="2030-12-31" required="required" >
                    </div>
                        <span id="error_workdate" class="text-danger"></span>
                </div>
            </div>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Responsibilities</label>
                    </div>
                    <div class="col-sm-8">
                        ​<!-- <textarea id="responsibility" name="responsibility" rows="7" cols="70" required="required"></textarea> -->
                        <textarea class="ckeditor" id="responsibility"></textarea>
                        <span id="error_responsibility" class="text-danger"></span>
                      </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Requirement</label>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <!-- <textarea id="requirement" name="requirement" rows="7" cols="70" required="required"></textarea> -->
                          <textarea class="ckeditor" id="requirement"></textarea>
                        <span id="error_requirement" class="text-danger"></span>
                        </div>
                        
                      </div>
                </div>
	        </div>

	        <div class="row">
	        	<div class="form-group">
                  	<div style="width:100%;height:100%;vertical-align:middle;text-align:center;">
	                    <button type="button" id="btn-submit" style="margin: auto;" class="btn waves-effect waves-light btn-primary">Request</button>
	                    <button type="button" id="btn-save" style="margin: auto;" class="btn waves-effect waves-light btn-dark">Save as Draft</button>
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
   console.log("<?php echo $row['ID']; ?>");
   function load() {
        var id = " <?php echo $row['ID'];?>";
        if (id != '' ) {

          $('#requestor').val("<?php echo $row['RequestorID']; ?>")

          $('#position')
          .empty()
          .append('<option selected value="<?php echo $row['RequestedPositionID'];?>"><?php echo $row['requested_pos'];?></option>');
          // $('#position').select2('data', {
          //   id: '<?php echo $row['RequestedPositionID'];?>',
          //   label: '<?php echo $row['requested_pos'];?>'
          // });
          $('#position').trigger('change');

          
          $('#ttl').val("<?php echo $row['NumberOfPlacement'];?>");
      
          $('#placement')
          .empty()
          .append('<option selected value="<?php echo $row['PlacementID'];?>"><?php echo $row['Department'];?></option>');
          $('#placement').trigger('change');

          $('#status').val("<?php echo $row['RequisitionTypeID'];?>");

          var datetime = "<?php echo $row['ExpectedWorkStartDate'];?>";
          var d = datetime.split(' ')[0];
          //$('#workdate').val(d);

          if ( "<?php echo $row['ExpectedWorkStartDate'];?>" == '1900-01-01 00:00:00.000') {
            $('#workdate').removeAttr('value');
          }else{
            var datetime = "<?php echo $row['ExpectedWorkStartDate'];?>";
            var d = datetime.split(' ')[0];
            $('#workdate').val(d);
             
          }

          $('#responsibility').append("<?php echo $row['DuttiesAndResponsibilities'];?>");

          $('#requirement').append("<?php echo $row['RequirementDescription'];?>"); 
    }
  }


    window.onload = load;
   
            $('.searching').select2({
                placeholder: 'Department Name',
                ajax:{
                    url: "<?php echo base_url('Hr/select2'); ?>",
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


            $('.requestor').select2({
                placeholder: 'Requestor Name',
                ajax:{
                    url: "<?php echo base_url('Hr/select_personnel'); ?>",
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

            $('#requestor').on('select2:select', function (e) {
              var name = $('#requestor :selected').text();
              console.log($('#requestor :selected').text());
              console.log(name);
              if ($('#requestor :selected').text() != '') {
                $.ajax({
                    url:"<?php echo base_url('Hr/search_info');?>",
                    method:"GET",
                    dataType:'json',
                    data:{ 'Name':name },

                    success:function(data){
                      if (data) {
                        $('#dis-pos').show();
                        $('#dis-org').show();
                        $('#req_position_id').val(data.PositionID);
                        $('#req_org_id').val(data.Organization);
                        $('#req_position').val(data.PositionName);
                        $('#req_org').val(data.OrganizationName);
                        
                        }
                      },
                    error:function(){
                            alert('error ... ');
                    }
                });
             
            }
          });

            $('.req-position').select2({
                placeholder: 'Position Name',
                ajax:{
                    url: "<?php echo base_url('Hr/select_req_position'); ?>",
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


            $('.position').select2({
                placeholder: 'Requested Position',
                ajax:{
                    url: "<?php echo base_url('Hr/select_position'); ?>",
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

            $('.rep-name').select2({
                placeholder: 'Replacement Name',
                ajax:{
                    url: "<?php echo base_url('Hr/select_personnel1'); ?>",
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
            
  $(document).ready(function(){

  $('#status').on('change',function(){
        if( $('#status').val()==="2"){
          $("#repname").show();
          }
          else{
          $("#repname").hide();
          }
    });

    $('#btn-submit').click(function(){
        var requestor_id = $('#requestor').val();
        var req_position_id = $('#req_position_id').val();
        var org_id = $('#org_id').val();
        var position = $('#position').val();
        var ttl = $('#ttl').val();
        var placement = $('#placement').val();
        var status = $('#status').val();
        var workdate = $('#workdate').val();
        var ReplacementName = $('#ReplacementName').val();
        var responsibility = CKEDITOR.instances["responsibility"].getData();
        var requirement = CKEDITOR.instances["requirement"].getData();

        var error_requestor = '';
        var error_req_position = '';
        var error_position = '';
        var error_placement = '';
        var error_status = '';
        var error_workdate = '';
        var error_replacementName = '';
        var error_requirement = '';
        var error_responsibility = '';
        var error_ttl = '';

        if(requestor == ''){
           error_requestor = 'Requestor Name is required';
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

          if(req_position_id == ''){
           error_req_position = 'Requestor Position is required';
           $('#error_req_position').text(error_req_position);
           $('#req_position').css('border-color', '#cc0000');
           req_position_id = '';
          }else{
           error_req_position = '';
           console.log($('#req_position_id').val());
           $('#error_req_position').text(error_req_position);
           $('#req_position_id').css('border-color', '');
           req_position = $('#req_position_id').val();
          }

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
         console.log($('#responsibility').val());
         $('#error_responsibility').text(error_responsibility);
         $('#responsibility').css('border-color', '');
         responsibility = $('#responsibility').val();
        }

        if(requirement == ''){
         error_requirement = 'requirement is required';
         $('#error_requirement').text(error_requirement);
         $('#requirement').css('border-color', '#cc0000');
         requirement = '';
        }else{
         error_requirement = '';
         console.log($('#requirement').val());
         $('#error_requirement').text(error_requirement);
         $('#requirement').css('border-color', '');
         requirement = $('#requirement').val();
        }

        if (error_requestor == '' && error_req_position == '' && error_position == '' && error_placement == '' && error_status == '' && error_workdate == '' && error_responsibility == '' && error_requirement == '' && error_ttl == '' ) {
          $('#myModal').modal('show'); 
        }
          

    });

    $('#btn-save').click(function(){
        var id_req = $('#id-req').val();
        var requestor = $('#requestor').val();
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
        console.log("btn click"+req_position_id);
        console.log(id_req);
        console.log(requestor);
        console.log(total);
        console.log(placement);
        console.log(status);
        console.log(workdate);
        console.log(responsibility);
        console.log(requirement);


        $.ajax({ 
          contentType: false,
          url:"<?php echo base_url('Hr/save_data2');?>",
          method:"POST",
          dataType : 'json',
          processData : false,
          data:{ 'id_req' : id_req,
                 'requestor':requestor,
                 'req_position_id':req_position_id,
                 'req_org_id' : req_org_id,
                 'position':position,
                 'total':total,
                 'placement':placement, 
                 'status':status,
                 'workdate':workdate,
                 'ReplacementName':ReplacementName,
                 'responsibility' : responsibility,
                 'requirement' : requirement},
          success:function(data){
            //window.location.href = '<?php echo base_url('Hr/Hire_history');?>';
            // console.log(data);
            // if (data.status) {
            //         alert('Save as Draft');
            //       }
                },
              error:function(){
                  alert('error ... ');
              }
          });
        });

    $('#button-smt').click(function(){
      var id_req = $('#id-req').val();
      var requestor = $('#requestor').val();
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
        url:"<?php echo base_url('Hr/do_update');?>",
        method:"POST",
        data:{'id_req' : id_req, 
              'requestor' : requestor,
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
          window.location.href = '<?php echo base_url('Hr/hire_history');?>';
    });

  });
</script>
</html>
