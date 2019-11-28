<!DOCTYPE html>
<html>
<head>
	<title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!--    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/js/bootstrap-select.min.js"></script> -->


    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/ckfinder/ckfinder.js"></script> -->

    <!-- admin lte2 -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href=".<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">
</head>
<body>
<div class="wrapper">
<?php echo $header;?>
<?php echo $sidebar;?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-12 align-self-center">
                        <h5 class="font-medium text-uppercase mb-0">Request Hiring Form</h5>
                    </div>
                    <div class="col-lg-9 col-md-8 col-xs-12 align-self-center">
                        <!-- <button class="btn btn-danger text-white float-right ml-3 d-none d-md-block">Buy Ample Admin</button> -->
                        <nav aria-label="breadcrumb" class="mt-2 float-md-right float-left">
                            <ol class="breadcrumb mb-0 justify-content-end p-0">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Request Hiring Form</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="page-content container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              
                                <h4 class="card-title">Requestor</h4>
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                </div>               
                                <form id="myform" method="POST" class="form-horizontal striped-rows b-form">
                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                      <label class="control-label col-form-label">Requestor Name</label>
                                    </div>
                                    <div class="col-md-9">
                                    <select class="form-control chs-select" name="chs-org" id="chs-org" style="width:80%" required="required">
                                            <option default>Select Requestor</option>
                                            <?php foreach ($person as $person) { ?>
                                            <option value="<?php echo $person['PersonnelID'];?>"><?php echo $person['Name'];?></option>
                                            <?php } ?>
                                        </select>

                                      </div>
                                      <!-- <div class="col-md-7">
                                        <input type="text" class="form-control" id="requestor" name="requestor" value = "<?php echo $this->session->userdata('name'); ?>" required="required" readonly>
                                        <input type="hidden" class="form-control" id="requestor_id" name="requestor_id" value = "<?php echo $this->session->userdata('PersonnelIDList'); ?>" required="required" readonly>
                                        <span id="error_requestor" class="text-danger"></span>
                                      </div> -->
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Organization Name</label>
                                      </div>
                                        <div class="col-md-7">
                                          <input type="text" class="form-control" name="req_org_id" id="req_org_id" value = "<?php echo $this->session->userdata('OrganizationName'); ?>" required="required" readonly>
                                          <input type="hidden" class="form-control" name="org_id" id="org_id" value = "<?php echo $this->session->userdata('OrganizationID'); ?>" required="required" readonly>
                                          <span id="error_req_org" class="text-danger"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Position Name</label>
                                      </div>
                                        <div class="col-md-7">
                                          <input type="text" class="form-control" name="req_position" id="req_position" value = "<?php echo $this->session->userdata('PositionName'); ?>" required="required" readonly>
                                          <input type="hidden" class="form-control" name="req_position_id" id="req_position_id" value = "<?php echo $this->session->userdata('PositionID'); ?>" required="required" readonly>
                                          <span id="error_req_position" class="text-danger"></span>
                                        </div>
                                    </div>
                                    
                                    <hr class="mt-0 mb-5">
                                    <h4 class="card-title">Request</h4>

                                    <div class="form-group row">

                                    <div class="col-sm-3">
                                      <label class="control-label col-form-label">Choose Organization</label>
                                    </div>
                                    <div class="col-md-9">
                                     

                                      <div id="chs-container">
                                        <select class="form-control chs-select" id="chs-div-template" style="width:80%; display: none">
                                            <option default>Select</option>
                                        </select>

                                        <select class="form-control chs-select" name="chs-org" id="chs-org" style="width:80%" required="required">
                                            <option default>Select Organization</option>
                                            <?php foreach ($org as $org) { ?>
                                            <option value="<?php echo $org['ID'];?>"><?php echo $org['Name'];?></option>
                                            <?php } ?>
                                        </select>
                                        <br>

                                        <select class="form-control chs-select" name="chs-dep" id="chs-dep" style="width:80%;display: none" required="required">
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
                            


                                  <div class="form-group row">
                                    <div class="col-sm-3">
                                      <label class="control-label col-form-label">Position</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="form-control selectpicker" data-show-subtext="true" data-size="5" name="position" id="position" style="width:80%;"  required="required">
                                          <option value=""></option>
                                        </select>
                                        <span id="error_position" class="text-danger"></span>
                                      </div>
                                    </div>
                                    
                                      <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Total Need</label>
                                      </div>
                                      <div class="col-sm-7">
                                        <select class="form-control" name="ttl" id="ttl" required="required">
                                          <option value="" selected>Pilih</option>
                                          <option value="1" data-subtext="aaa">1</option>
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
                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Placement</label>
                                      </div>
                                      <div class="col-sm-7">
                                        <select class="searching form-control" name="placement" id="placement" style="width:80%;"  required="required">
                                          <option value=""></option>
                                        </select>
                                        <span id="error_placement" class="text-danger"></span>
                                      </div>
                                    </div>
                                        <div class="form-group row">
                                          <div class="col-sm-3">
                                            <label class="control-label col-form-label">Status</label>
                                          </div>
                                          <div class="col-sm-7">
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
                                    <div class="form-group row" style="display: none" id="repname">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Replacement Name</label>
                                      </div>
                                      <div class="col-sm-9">
                                       <select class="rep-name form-control" name="ReplacementName" id="ReplacementName" style="width:80%;"  required="required">
                                          <option value=""></option>
                                        </select>
                                        <span id="error_replacementName" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Expected Work Date</label>
                                      </div>
                                      <div class="col-sm-9">
                                        <input type="date" id="workdate" name="workdate" min="2018-01-01" max="2030-12-31" required="required">
                                        <span id="error_workdate" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Responsibilities</label>
                                      </div>
                                      <div class="col-sm-7">
                                        ​<!-- <textarea id="responsibility" name="responsibility" rows="7" cols="70" required="required"></textarea> -->
                                        <textarea class="ckeditor" id="responsibility"></textarea>
                                        <span id="error_responsibility" class="text-danger"></span>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <div class="col-sm-3">
                                        <label class="control-label col-form-label">Requirement</label>
                                      </div>
                                      <div class="col-sm-7">
                                        <div class="form-group">
                                          <!-- <textarea id="requirement" name="requirement" rows="7" cols="70" required="required"></textarea> -->
                                          <textarea class="ckeditor" id="requirement"></textarea>
                                        <span id="error_requirement" class="text-danger"></span>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>

                                  <div class="form-group row">
                                  <div style="width:100%;height:100%;vertical-align:middle;text-align:center;">
                                    <button type="button" id="btn-submit" style="margin: auto;" class="btn waves-effect waves-light btn-primary">Request</button>
                                    <button type="button" id="btn-save" style="margin: auto;" class="btn waves-effect waves-light btn-dark">Save as Draft</button>
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
    </div>
    </div>

            
                

</body>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
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
            
  $(document).ready(function(){
    // To allow the dynamic element to able to use this change event
    // See here for more info, https://stackoverflow.com/questions/1359018/how-do-i-attach-events-to-dynamic-html-elements-with-jquery
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
          //window.location.href = '<?php echo base_url('hr/Hire_history');?>';
    });


    

  });

    
</script>
</html>