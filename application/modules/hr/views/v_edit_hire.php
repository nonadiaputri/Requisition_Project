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
                    <input type="hidden" name="id-req" id="id-req" value="<?php echo $row['ID'];?>">
                    <select class="form-control chs-select" name="requestor_id" id="requestor_id" style="width:100%" required="required">
                      <option value="">Select Requestor</option>
                      <?php foreach ($person as $person) { ?>
                      <option value="<?php echo $person['PersonnelID'];?>"><?php echo $person['Name'];?></option>
                      <?php } ?>
                    </select>
                    <span id="error_requestor" class="text-danger"></span>
    	            </div>
    	        </div>
            </div>
              <br>
  	        <div class="row">
  	          	<div class="col-md-8">
  	                <label class="control-label">Organization Name</label>
  	                <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "" required="required" >
  	                <input type="hidden" class="form-control" name="org_id" id="org_id" value = "" required="required" >
  	                <span id="error_req_org" class="text-danger"></span>
  	          </div>
  	        </div>
            <br>

	        <div class="row">
	         	<div class="form-group">
		              <div class="col-md-8">
		                <label class="control-label col-form-label">Position Name</label>
		                  <input type="text" class="form-control" name="req_position" id="req_position" value = "" required="required" >
		                  <input type="hidden" class="form-control" name="req_position_id" id="req_position_id" value = "" required="required" >
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
                        <input type="text" class="form-control" name="organization" id="organization" value="">
                        <input type="hidden" class="form-control" name="organization_id" id="organization_id" value="">
	                   <!--  <select class="form-control chs-select" id="chs-div-template" style="width:100%; display: none">
	                        <option default>Select</option>
	                    </select>

	                    <select class="form-control chs-select" name="chs-org" id="chs-org" style="width:100%" required="required">
	                        <option default>Select Organization</option>
	                        <?php foreach ($org as $org) { ?>
	                        <option value="<?php echo $org['ID'];?>"><?php echo $org['Name'];?></option>
	                        <?php } ?>
	                    </select> -->

	                    <!-- <select class="form-control chs-select" name="chs-dep" id="chs-dep" style="width:100%;display: none" required="required">
	                        <option default>Select</option>
	                    </select> -->
	                    <br>
	                </div>
	                   
	                </div>
	                <!-- <div class="col-sm-12 offset-3">
			            <button type="button" id="display-btn">Display Position in This Unit</button>
			            <br>
			        </div> -->
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
          <br>

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
          <br>

          <div class="row">
            <div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label col-form-label">Company</label>
                  
                    <select class="company form-control" name="company" id="company" style="width:100%;"  required="required">
                      <option value=""></option>
                    </select>
                    <span id="error_company" class="text-danger"></span>
                  </div>
                </div>
          </div>
          <br>

	        <div class="row">
	        	<div class="form-group">
                  <div class="col-md-8">
                    <label class="control-label col-form-label">Cost Center</label>
                  
                    <select class="searching form-control" name="placement" id="placement" style="width:100%;"  required="required">
                      <option value=""></option>
                    </select>
                    <span id="error_placement" class="text-danger"></span>
                  </div>
                </div>
	        </div>
          <br>

	       <!--  <div class="row">
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
	        </div> -->


          <div class="row">
            <div class="form-group ">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Requisition Type
                        <span style="color: red;">*</span></label>
                      
                      <select class="form-control" name="req_type" id="req_type" required="required">
                        <option value="" selected>Pilih</option>
                        <option value="1">Additional</option>
                        <option value="2">Replacement</option>
                      </select>
                    <span id="error_req_type" class="text-danger"></span>
                  </div>
                </div>
          </div>
          <br>

          <div class="row">
            <div class="form-group ">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Employeement Type
                        <span style="color: red;">*</span></label>
                      
                      <select class="form-control" name="status" id="status" required="required">
                        <option value="" selected>Pilih</option>
                        <option value="1">Undefined</option>
                        <option value="2">Profesional Contract</option>
                        <option value="3">Full Contract</option>
                        <option value="4">Contract to Permanent</option>
                        <option value="5">Freelance</option>
                        <option value="6">Internship</option>
                        <option value="7">Outsourcing</option>  
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
                    
                    <span id="error_workdate" class="text-danger"></span>
                </div>
            </div>
          </div>
            <br>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Responsibilities</label>
                    </div>
                    <div class="col-sm-8">
                        ​<!-- <textarea id="responsibility" name="responsibility" rows="7" cols="70" required="required"></textarea> -->
                        <textarea class="ckeditor" id="responsibility"><?php echo $row['DuttiesAndResponsibilities']; ?></textarea>
                        <span id="error_responsibility" class="text-danger"></span>
                      </div>
                </div>
	        </div>
          <br>

	        <div class="row">
	        	<div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Requirement</label>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <!-- <textarea id="requirement" name="requirement" rows="7" cols="70" required="required"></textarea> -->
                          <textarea class="ckeditor" id="requirement"><?php echo $row['RequirementDescription']; ?></textarea>
                        <span id="error_requirement" class="text-danger"></span>
                        </div>
                        
                      </div>
                </div>
	        </div>

          <div class="row">
            <div class="form-group">
                    <div class="col-md-8">
                        <label class="control-label col-form-label">Note</label>
                      </div>
                      <div class="col-sm-8">
                        <div class="form-group">
                          <!-- <textarea id="requirement" name="requirement" rows="7" cols="70" required="required"></textarea> -->
                          <textarea id="noted" name="noted" rows="7" cols="110"></textarea>
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
       <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/kompas-intranet.css" />

<!--- FOOTER SECTION --->
<div class="no-break">
    <footer id="footer" class="footer-wrapper application no-print" style="margin-left:auto;margin-top:150px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 footer-kompas-desc">
                    <img src="http://apps.kmn.kompas.com/static/kompas-intranet/latest/img/KGMediaWhite.png" class="footer-logo" />
                    <p>KG Media is an integrated ecosystem of solutions with a team of content solutions, a team of influencer marketing strategists, a team of media investment solutions, a team of sports marketing solutions, and we’ve completed the ecosystem with a team of strategy and communication solutions. It represents a new chapter for us, and with our knowledge and people-driven approach we hope to continue enlightening Indonesia through solving its business and social economy problems.</p>
                    <!--Mengusung semboyan "Amanat Hati Nurani Rakyat", Kompas dikenal sebagai sumber informasi tepercaya, akurat, dan mendalam.</p--->
                </div> <!--- col-md-6 --->
                <div class="col-md-4 floating">
                    <p class="blue-title">Contact Us</p>
                    <ul class="iconized">
                        <li class="list-address">
                            <p>Menara Kompas<br>Jalan Palmerah Selatan 21<br />Jakarta 10270 Indonesia</p>
                        </li>
                        <li class="list-phone">+62 21 5369 9200, +62 21 535 03777</li>
                        <li class="list-email">connect@kgmedia.id</li>
                    </ul>
                </div> <!--- col-md-4 --->
                <div class="col-md-2">
                    <p class="blue-title">About</p>
                    <ul class="iconized">
                        <li><a href="https://www.kgmedia.id/our-story" target="_blank" title="Our Story">Our Story</a></li>
                        <li><a href="https://www.kgmedia.id/our-leader" target="_blank" title="Our Leadership">Our Leadership</a></li>
                        <li><a href="https://www.kgmedia.id/our-partners" target="_blank" title="Our Partners">Our Partners</a></li>
                        <li><a href="<?= base_url(); ?>dashboard" title="Our Portal">Our Portal</a></li>
                    </ul>
                </div> <!--- col-md-2 --->
            </div> <!--- row --->
        </div> <!--- container --->
    </footer> <!--- footer-wrapper --->

</div>
<!-- /.content-wrapper -->


    <div class="container no-print">
        <div class="row">
            <div class="col-md-6 footer-copyright">
                <p>&copy; 2019 - Genadi Dev. Team. All rights reserved.</p>
            </div>
            <div class="col-md-4 footer-copyright"  style="margin-left:15%">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAMgAAAAiCAYAAAAah5Z6AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyJpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MkE2MUU2NDEwRUM1MTFFM0ExNDRCRDMwRDdDREEyRTAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MkE2MUU2NDAwRUM1MTFFM0ExNDRCRDMwRDdDREEyRTAiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNiAoV2luZG93cykiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDowMjYzMkUyNEYyN0MxMUUyODg2QThCOUU3MkVBNTc5RCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDowMjYzMkUyNUYyN0MxMUUyODg2QThCOUU3MkVBNTc5RCIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PttZr4IAABNYSURBVHja7Fx3YBTV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">
            </div>
        </div>
    </div>
</div>
<!-- END OF FOOTER SECTION-->
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

   function positionInOrg(){
      $.ajax({
        url:"<?php echo base_url('hr/search_position');?>",
          method:"POST",
          dataType : "json",
          data:{ 'ID' : <?php echo $row['RequestorDepartmentID'] ?>},
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
            $('#note').show();
            if (<?php echo $row['RequestedPositionID'];?> == '0') {
              $('#position').removeAttr('value');
            }else{
            $("#position").val("<?php echo $row['RequestedPositionID'];?>").change();
            
            }  
          },
          error:function(){
                  alert('error ... ');
              }
          });

   }

   function load() {
        var id = " <?php echo $row['ID'];?>";
        if (id != '' ) {
          positionInOrg();

          $("#requestor_id").val("<?php echo $row['RequestorID'];?>").change();

          $('#organization').val("<?php echo $row['DeptName'] ?>");
          $('#organization_id').val("<?php echo $row['RequestorDepartmentID'] ?>")

          $('#req_org_id').val("<?php echo $row['DeptName']; ?>");
          $('#org_id').val("<?php echo $row['RequestorDepartmentID']; ?>");
          

          $('#req_position').val("<?php echo $row['requestor_pos'];?>");
          $('#req_position_id').val("<?php echo $row['RequestorPositionID'] ?>");

          $('textarea#noted').val("<?php echo $note['Description']; ?>")

          if (<?php echo $row['NumberOfPlacement'];?> == '0') {
            $('#ttl').removeAttr('value');
          }else{
          $('#ttl').val("<?php echo $row['NumberOfPlacement'];?>");
          }

          if (<?php echo $row['RequestedCompanyID'];?> == '0') {
            $('#company').removeAttr('value');
          }else{
          $('#company')
          .empty()
          .append('<option selected value="<?php echo $row['RequestedCompanyID'];?>"><?php echo $row['CompanyName'];?></option>');
          $('#company').trigger('change');
          }

          if (<?php echo $row['PlacementID'];?> == '0') {
            $('#placement').removeAttr('value');
          }else{
          $('#placement')
          .empty()
          .append('<option selected value="<?php echo $row['PlacementID'];?>"><?php echo $row['DeptName'];?></option>');
          $('#placement').trigger('change');
          }

          if (<?php echo $row['RequisitionTypeID'];?> == '0') {
            $('#req_type').removeAttr('value');
          }else{
            $('#req_type').val(<?php echo $row['RequisitionTypeID']?>);
          }

          if (<?php echo $row['EmploymentTypeID'];?> == '0') {
            $('#status').removeAttr('value');
          }else{
            $('#status').val(<?php echo $row['EmploymentTypeID']?>);
          }

          if ( "<?php echo $row['ExpectedWorkStartDate'];?>" == '1900-01-01 00:00:00.000') {
            $('#workdate').removeAttr('value');
          }else{
            var datetime = "<?php echo $row['ExpectedWorkStartDate'];?>";
            var d = datetime.split(' ')[0];
            $('#workdate').val(d);  
          }


         
    }
  }


    window.onload = load;
   
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


            $('.requestor').select2({
                placeholder: 'Requestor Name',
                ajax:{
                    url: "<?php echo base_url('hr/select_personnel'); ?>",
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
                    url:"<?php echo base_url('hr/search_info');?>",
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
                    url: "<?php echo base_url('hr/select_req_position'); ?>",
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
                    url: "<?php echo base_url('hr/select_position'); ?>",
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
                    url: "<?php echo base_url('hr/select_personnel1'); ?>",
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

            $('.company').select2({
                placeholder: 'Company Name',
                ajax:{
                    url: "<?php echo base_url('hr/select_company'); ?>",
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
            
  $(document).ready(function(){

  $('#status').on('change',function(){
        if( $('#status').val()==="2"){
          $("#repname").show();
          }
          else{
          $("#repname").hide();
          }
    });

     var rep;
     $('#display-btn').click(function(e){
       // for (var i = 0; i <= arr_id.length-1; i++) {
       //  if (i==(arr_id.length-1)) {
       //    temp = arr_id[i];
       //     console.log(temp);   
       //  }    
       // }

      var arr_id=[];
      var temp;
       $.ajax({
        url:"<?php echo base_url('hr/search_position');?>",
          method:"POST",
          dataType : "json",
          data:{ 'ID' : <?php echo $row['RequestorDepartmentID'] ?>},
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
            $('#note').show();
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
        var ttl = $('#ttl').val();
        var placement = $('#placement').val();
        var status = $('#status').val();
        var workdate = $('#workdate').val();
        var ReplacementName = $('#ReplacementName').val();
        var responsibility = CKEDITOR.instances["responsibility"].getData();
        var requirement = CKEDITOR.instances["requirement"].getData();
        var company = $('#company').val();
        var req_type = $('#req_type').val();


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
        var error_company = '';
        var error_req_type = '';

        if(requestor_id == ''){
           error_requestor = 'Requestor Name is required';
           $('#error_requestor').text(error_requestor);
           $('#requestor').css('border-color', '#cc0000');
           requestor_id = '';
          }else{
           error_requestor = '';
           console.log($('#requestor').val());
           $('#error_requestor').text(error_requestor);
           $('#requestor').css('border-color', '');
           requestor_id = $('#requestor').val();
          }

          if(company == ''){
           error_company = 'Company Name is required';
           $('#error_company').text(error_company);
           $('#company').css('border-color', '#cc0000');
           company = '';
          }else{
           error_company = '';
           console.log($('#company').val());
           $('#error_company').text(error_company);
           $('#company').css('border-color', '');
           company = $('#company').val();
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

        if(req_type == ''){
         error_req_type = 'Requisition Type is required';
         $('#error_req_type').text(error_req_type);
         $('#req_type').css('border-color', '#cc0000');
         req_type = '';
        }else{
         error_req_type = '';
         console.log($('#req_type').val());
         $('#error_req_type').text(error_req_type);
         $('#req_type').css('border-color', '');
         req_type = $('#req_type').val();
        }

        if (error_requestor == '' && error_req_position == '' && error_position == '' && error_placement == '' && error_status == '' && error_workdate == '' && error_responsibility == '' && error_requirement == '' && error_ttl == '' && error_req_type == '' ) {
          $('#myModal').modal('show'); 
        }
          

    });

    $('#btn-save').click(function(){
        var id_req = $('#id-req').val();
        var requestor = $('#requestor_id').val();
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
        var company = $('#company').val();
        var noted = $('textarea#noted').val();
        var req_type = $('#req_type').val();

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
          url:"<?php echo base_url('hr/save_data2');?>",
          method:"POST",
          dataType : 'json',
          data:{ 'id_req' : id_req,
                 'requestor':requestor,
                 'req_position_id':req_position_id,
                 'req_org_id' : org_id,
                 'position':position,
                 'total':total,
                 'company':company,
                 'placement':placement, 
                 'status':status,
                 'workdate':workdate,
                 'ReplacementName':ReplacementName,
                 'responsibility' : responsibility,
                 'requirement' : requirement,
                 'note' : noted,
                 'req_type' : req_type},
          success:function(data){
            window.location.href = '<?php echo base_url('hr/hire_history');?>';
            console.log(data.status);
            if (data.status) {
                    alert('Save as Draft');
                  }
                },
            error:function(){
                alert('error ... ');
            }
          });
        });

    $('#button-smt').click(function(){
      var id_req = $('#id-req').val();
      var requestor = $('#requestor_id').val();
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
      var company = $('#company').val();
      var req_type = $('#req_type').val();
      var noted = $('textarea#noted').val();

       $.ajax({
        url:"<?php echo base_url('hr/do_update');?>",
        method:"POST",
        data:{'id_req' : id_req, 
              'requestor' : requestor,
              'req_position_id':req_position_id,
              'org_id' : org_id,
              'position':position,
               'total':total,
               'placement':placement, 
               'company':company,
               'status':status,
               'workdate':workdate,
               'ReplacementName':ReplacementName,
               'responsibility' : responsibility,
               'requirement' : requirement,
               'note' : noted,
               'req_type' : req_type},

        success:function(data){
          window.location.href = '<?php echo base_url('hr/hire_history');?>';
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
          
    });

  });
</script>
</html>
