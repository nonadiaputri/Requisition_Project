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
	                <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "<?php echo $org['Organization']; ?>" required="required" readonly>
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

	                  <select class="form-control chs-select" name="member" id="member" style="width:100%" required="required">
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

<!-- <div class="modal fade" role="dialog" id="myModal">
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
</div> -->
      <!-- /.box -->

    </section>
   
            <!-- ============================================================== -->
            
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
   

      $('#member').on('change', function() {
      var temp2 = $('#member :selected').val();
      if ($('#member :selected').text() != '') {
        $.ajax({
          url:"<?php echo base_url('hr/search_member');?>",
          method:"POST",
          dataType : "json",
          data:{ 'ID' : temp2},
          success:function(data){
            console.log(data);
            $('#req_position_id').val(data.PostionID);
            $('#req_position').val(data.Postion);
            $('#org_id').val(data.OrganizationID);
            $('#req_org_id').val(data.Organization);

            $('#parent_org').val(data.ParentOrganization);
            $('#organization').val(data.Organization);
            $('#organization_id').val(data.OrganizationID);

            
          },
          error:function(){
                  alert('error ... ');
              }
          });
    }
    });

    var arr_id=[];
    var temp;
    $('body').on('change', '.chs-select', function(){

        // Get the id dynamically
        //var id = $('#chs-org').val();
        const id = $(this).val();
        const select_id = $(this).attr('id');

        console.log(id);
        var i = 0;
        $.ajax({
            url: "<?php echo base_url('hr/chs_dep');?>",
            type: "POST",
            dataType: "json",
            data: {
                'ID': id
            },
            success: function (data) {

                //console.log(data);
                // console.log(data[0]['Name']);

                if (data.length != 0) {
                    var output = '';
                    //output += '<option default>Select</option>';
                    $.each(data, function (key, value) {
                        output += '<option value="' + data[key]['ID'] + '">' + data[key]['Name'] + '<br></option>';
                    });
                    if(select_id == 'chs-org'){
                        // Show the chs-dep
                        $('#chs-dep').show();
                        $('#chs-dep').append(output);
                    }else if(select_id == 'chs-dep'){
                        // Get the template
                        var new_chs_div = $('#chs-div-template').clone();
                        const chs_div_count = i + 1;
                        new_chs_div.attr('name', 'chs-div' + chs_div_count);
                        new_chs_div.attr('id', 'chs-div' + chs_div_count);
                        // Remove the none value.
                        // Just change it to your desire value.
                        new_chs_div.css('display', '');
                        new_chs_div.append(output);
                        //Insert next to the last of .chs-select
                        $('#chs-container').append(new_chs_div);
                        $('#chs-container').append('<br/>');
                        //$(new_chs_div).insertAfter('.chs-select');
                        //$('<br/>').insertAfter('.chs-select');
                    }else if(select_id.includes('chs-div')){
                        // Get the template
                        var new_chs_div = $('#chs-div-template').clone();
                        const chs_div_count = i + 1;

                        new_chs_div.attr('name', 'chs-div' + chs_div_count);
                        new_chs_div.attr('id', 'chs-div' + chs_div_count);
                        // Remove the none value.
                        // Just change it to your desire value.
                        new_chs_div.css('display', '');
                        new_chs_div.append(output);
                        //Insert next to the last of .chs-select
                        $('#chs-container').append(new_chs_div);
                        $('#chs-container').append('<br/>');
                        //$(new_chs_div).insertAfter('.chs-select');
                        //$('<br/>').insertAfter('.chs-select');
                    }
                }
            },
            error: function () {
                alert('error ... ');
            }
        });
        arr_id.push(id);
        console.log(arr_id);
        console.log(arr_id.length);
         
    });

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
          $('#note').show();
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
