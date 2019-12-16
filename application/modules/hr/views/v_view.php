<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
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
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?php echo $header;?>
  	<?php echo $sidebar;?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Request Detail
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-danger" id="lbl-danger" style="display: none;">
          <h4>Warning!</h4>
          <p>You don't have access to approve</p>
        </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h4 class="page-header">
            Detail Requestor Information
          </h4>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Requestor</strong><br>
            <?php echo $req['Requestor']; ?><br>
            <?php echo $req['DeptName']; ?><br>
            <?php echo $req['req_position']; ?><br>
          </address>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
      </div>

      <div class="row invoice-info">
      	<div class="col-xs-12">
          <h3 class="page-header">
             Aplicant Requestor Information
          </h3>
        </div>
      	<div class="col-xs-12 table-responsive">
	      	<table class="table table-striped">
	            <tbody>
	            <tr>
	              <td width="10%">Position</td>
	              <td width="40%">Call of Duty</td>
	            </tr>
	            <tr>
	              <td>Total Need</td>
	              <td><?php echo $req['NumberOfPlacement']; ?></td>
	            </tr>
	            <tr>
	              <td>Placement</td>
	              <td><?php echo $req['Department']; ?></td>
	            </tr>
	            <tr>
	              <td>Status</td>
	              <td><?php echo $req['Status']; ?></td>
	            </tr>
	            <tr>
	            	<td>Replacement Name</td>
	            	<td><?php
                        if ($req['ReplacementPersonnelID'] == '') {
                            echo "-";
                        }else{
                            echo $req['RepName'];
                        }
                         ?></td>
	            </tr>
	            <tr>
	            	<td>Expected Work Date</td>
	            	<td><?php echo $req['ExpectedWorkStartDate']; ?></td>
	            </tr>
	            <tr>
	            	<td>Responsibility</td>
	            	<td><?php echo $req['DuttiesAndResponsibilities']; ?></td>
	            </tr>
	            <tr>
	            	<td>Requirement</td>
	            	<td><?php echo $req['RequirementDescription']; ?></td>
	            </tr>
	            </tbody>
	          </table>
	      </div>
      </div>
      <!-- /.row -->

      <!-- /.row -->

      <div class="row" >
      	<div class="col-xs-12">
          <h3 class="page-header">
             Approval Information
          </h3>
        </div>
        <div class="offset-5">
        <div class="col-md-6">
            <div class="row invoice-info" id="app-status" style="display: none;">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-5">Request Status   </label>
                    <div class="col-md-6">
                        <p class="form-control-static">
                        <?php 
                        if($req['IsProcessedToHire']=='1'){
                            echo "Approved";
                         }else if ($req['IsHold']=='1') {
                            echo "Hold";
                         }else if ($req['IsRejected']=='1') {
                            echo "Rejected";
                        }
                         ?>
                         </p>
                    </div>
                </div>
            </div>
            </div>
            <div class="row invoice-info" id="hold-end" style="display: none">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="control-label text-right col-md-5">Hold End Date  </label>
                        <div class="col-md-6">
                            <p class="form-control-static"><?php echo $req['HoldEndDate']; ?>
                             </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="rjt-reason" style="display: none">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="control-label text-right col-md-5">Reason  </label>
                            <div class="col-md-6">
                                <p class="form-control-static"><?php echo $req['RejectReason']; ?>
                                 </p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row invoice-info" id="process-date" style="display: none">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="control-label text-right col-md-5">Process Start Date  </label>
                    <div class="col-md-6">
                        <p class="form-control-static"><?php echo $req['ProcessStartDate']; ?>
                         </p>
                    </div>
                </div>
            </div>
            </div> 
       
            <div class="row invoice-info" id="rqstd">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class ="checkbox-mngr"> Requested by <?php echo $req['Requestor']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $req['req_position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="apv_gm" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class ="checkbox-apv-gm"> Aprroved by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="hold-by" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class ="checkbox-hl-gm"> Hold by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="reject-by" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class="checkbox-rjt-gm"> Reject by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>  
            
        <!-- HR APPROVAL -->
            <div class="row invoice-info" id="apv_hr" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" class ="checkbox-apv-hr"> Aprroved by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="hold_hr" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class ="checkbox-hl-hr"> Hold by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="row invoice-info" id="reject_hr" style="display: none;">
                <div class="col-md-8 offset-2">
                    <div class="form-group row">
                        <fieldset class="checkbox">
                            <label>
                                <input type="checkbox" value="" class="checkbox-rjt-hr"> Reject by <?php echo $latest['PersonnelName']; ?>
                                <br>
                                &nbsp &nbsp as <?php echo $latest['Position']; ?>
                            </label>
                        </fieldset>
                    </div>
                </div>
            </div>  
      	</div>
      </div>
      	 
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-danger pull-right" id="button-process" data-toggle="modal" data-target="#reject"  style="margin-right: 5px;">
            Reject
          </button>
          <button type="button" class="btn btn-warning pull-right" id="button-hold" data-toggle="modal" data-target="#hold"  style="margin-right: 5px;" > Hold
          </button>
          <button type="button" class="btn btn-success pull-right" id="button-reject" data-toggle="modal" data-target="#process"  style="margin-right: 5px;">
            Approve
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div id="process" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Process Request</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                          <form class="form-horizontal process" method="POST" action="<?php echo base_url('Hr/process/'.$req['ID']);?>">                
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Start Date </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="process" id="process" class="form-control" min="2018-01-01" max="2030-12-31">
                                        <span id="error_process" class="text-danger"></span>  
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">
                                    </div>                
                                </div>
                                </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-process" class="btn btn-info waves-effect">OK</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

            <div id="hold" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Hold</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                        <form class="form-horizontal hold" method="POST" action="<?php echo base_url('Hr/hold/'.$req['ID']);?>">                
                            <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Hold Until </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="hold" id="hold" class="form-control" min="2018-01-01" max="2030-12-31">
                                        <span id="error_hold" class="text-danger"></span>
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">  
                                    </div>                
                            </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-hold" class="btn btn-info waves-effect">OK</button>
                        </div>
                        </form>  
                    </div>
                </div>
            </div>
        </div>

            <div id="reject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Reject</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal reject" method="POST" action="<?php echo base_url('Hr/reject/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Reason </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="reason_reject" id="reason_reject" class="form-control">
                                        <span id="error_reject" class="text-danger"></span>
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">    
                                    </div>                
                            </div>
                        </div>                        
                        <div class="modal-footer">
                            <button type="button" id="btn-reject" class="btn btn-info waves-effect">OK</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="sent_back" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Sent Back</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="POST" action="<?php echo base_url('Hr/sent_back/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Reason </label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="reason_sent_back" id="reason_sent_back" class="form-control">  
                                    </div>                
                                </div>
                                </div>
                        
                        <div class="modal-footer">
                            <button type="button" id="btn-sent-back" class="btn btn-info waves-effect" data-dismiss="modal">OK</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer no-print">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        var id_req = '<?php echo $req['ID']; ?>';
        console.log(id_req);

        var app_process = '<?php echo $req['IsProcessedToHire']; ?>';
        var app_hold = "<?php echo $req['IsHold'] ;?>"
        var app_reject = "<?php echo $req['IsRejected'] ;?>";
        var reqstor = "<?php echo $this->session->userdata('ID2'); ?>";
        var appstatus2 = "<?php echo $latest['ApprovalStatusID']; ?>";
        var app_process2 = "<?php echo $latest['IsProcessedToHire']; ?>";
        var app_hold2 = "<?php echo $latest['IsHold']; ?>";
        var app_reject2 = "<?php echo $latest['IsRejected'] ; ?>";

        if (appstatus2 == "3") {
            $('#button-process').hide();
            $('#button-hold').hide();
            $('#button-reject').hide();
            $('#button-sent-back').hide();
            $('#img-print').show();

            if (app_process2 == '1') {
                $('.checkbox-mngr').prop('checked', true);
                $('.checkbox-apv-gm').prop('checked', true);
                $('.checkbox-apv-hr').prop("checked", true);
                $('#app-status').show();
                $('#process-date').show();
                $('#apv_gm').show();
                $('#apv_hr').show();
            }else if (app_hold2 == '1') {
                $('.checkbox-mngr').prop('checked', true);
                $('.checkbox-hl-gm').prop('checked', true);
                $('.checkbox-hl-hr').prop("checked", true);
                $('#app-status').show();
                $('#hold-end').show();
                $('#hold-by').show();
                $('#hold_hr').show();
            }else if (app_reject2 == '1') {
                $('#app-status').show();
                $('#rjt-reason').show();
                $('.checkbox-mngr').prop('checked', true);
                $('.checkbox-rjt-gm').prop('checked', true);
                $('.checkbox-rjt-hr').prop("checked", true);
                $('#reject-by').show();
                $('#reject_hr').show();
            }
        }

        if (app_process == '1' || app_reject == '1' || app_hold == '1') {
            $('#button-process').hide();
            $('#button-hold').hide();
            $('#button-reject').hide();
            $('#button-sent-back').hide();
        }
        if (app_process == '1') {
            $('.checkbox-mngr').prop('checked', true);
            $('.checkbox-apv-gm').prop('checked', true);
            $('.checkbox-hr').attr("disabled", true);
            $('#app-status').show();
            $('#process-date').show();
            $('#apv_gm').show();
        }
        if (app_hold == '1' ) {
            $('.checkbox-mngr').prop('checked', true);
            $('.checkbox-hl-gm').prop('checked', true);
            $('.checkbox-hr').attr("disabled", true);
            $('#app-status').show();
            $('#hold-end').show();
            $('#hold-by').show();
            
        }
        if (app_reject == '1') {
            $('#app-status').show();
            $('#rjt-reason').show();
            $('.checkbox-mngr').prop('checked', true);
            $('.checkbox-rjt-gm').prop('checked', true);
            $('.checkbox-hr').attr("disabled", true);
            $('#reject-by').show();
        }

        if (app_process == '0' &&  app_reject == '0' && app_hold == '0' && reqstor == <?php echo $req['RequestorID'] ;?>){
            $('#lbl-danger').show();
            $('#button-process').hide();
            $('#button-hold').hide();
            $('#button-reject').hide();
            $('#button-sent-back').hide();
            $('.checkbox-mngr').prop('checked', true);
            $('.checkbox-gm').prop('disabled', true);
            $('.checkbox-hr').attr("disabled", true);
        }

        $('#btn-process').click(function(){
            var prcs = $("#process #process").val().trim();
            var error_process = '';
            console.log(prcs);

            if(prcs == ''){
             error_process = 'Process Start Date is required';
             $("#process #error_process").text(error_process);
             $("#process #process").css('border-color', '#cc0000');
             prcs = '';
            }else{
             error_process = '';
             console.log($('#process').val());
             $("#process #error_process").text(error_process);
             $("#process #process").css('border-color', '');
             prcs = $("#process #process").val().trim();
            } 
            if (error_process == ''){
            var status = '1';
            var form_data = $('.process').serialize();
            $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Hr/Process/');?>'+id_req,
            data: form_data,
            success: function(data) {
                if (status) {
                   
                    window.location.href = '<?php echo base_url('Hr/hire_history');?>';
                    alert('Approval success');
                    }   
               },
            error: function() {
                alert('Approval failed');
            }
        });
             $('#process').modal('hide');
        }
        });

        $('#btn-hold').click(function(){
            var hold = $("#hold #hold").val().trim();
            var error_hold = '';
            console.log(hold);

            if(hold == ''){
             error_hold = 'Hold End Date is required';
             $("#hold #error_hold").text(error_hold);
             $("#hold #hold").css('border-color', '#cc0000');
             hold = '';
            }else{
             error_hold = '';
             console.log($('#hold').val());
             $("#hold #error_hold").text(error_hold);
             $("#hold #hold").css('border-color', '');
             hold = $("#hold #hold").val().trim();
            } 
            if (error_hold == ''){
            var status = '1';
            var form_data = $('.hold').serialize();
            $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Hr/hold/');?>'+id_req,
            data: form_data,
            success: function(data) {
                if (status) {
                      alert('Hold Request success');
                       window.location.href = '<?php echo base_url('Hr/hire_history');?>';
                    }   
               },
            error: function() {
                alert('Hold Request failed');
            }
        });
            $('#hold').modal('hide');
        }
        });


        $('#btn-reject').click(function(){
            var reject = $('.modal-body input[name=reason_reject]').val();
            var error_reject = '';
            console.log(reject);

            if(reject == ''){
             error_reject = 'Reject Reason is required';
             $("#reject #error_reject").text(error_reject);
             $("#reject #reject_reason").css('border-color', '#cc0000');
             reject = '';
            }else{
             error_reject = '';
             console.log($('#reject').val());
             $("#reject #error_reject").text(error_reject);
             $("#reject #reject_reason").css('border-color', '');
             reject = $('.modal-body input[name=reason_reject]').val();
            } 
            if (error_reject == ''){
            var status = '1';
            var form_data = $('.reject').serialize();
            $.ajax({
            method: 'POST',
            url: '<?php echo base_url('Hr/reject/');?>'+id_req,
            data: form_data,
            success: function(data) {
                if (status) {
                      alert('Reject Request success');
                       window.location.href = '<?php echo base_url('Hr/hire_history');?>';
                    }   
               },
            error: function() {
                alert('Reject Request Failde');
            }
        });
            $('#reject').modal('hide');
        }
        });



    });
</script>
</html>
