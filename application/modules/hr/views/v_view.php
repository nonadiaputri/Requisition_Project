<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KGMedia | <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2));?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.5/css/bootstrap-select.min.css" /> -->

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
        Detail Request
      </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a>
                    </li>
                    <li><a href="#">Examples</a>
                    </li>
                    <li class="active">Invoice</li>
                </ol>
            </section>
            <div class="pad margin no-print">
                <div class="callout callout-danger" id="lbl-danger" style="display: none;">
                    <h4>Warning!</h4>
                    <p>You don't have access to approve</p>
                </div>
                <div class="callout callout-danger" id="lbl-rec-notif" style="display: none;">
                    <h4>Warning!</h4>
                    <p>Choose appropriate Cost Center before Save!</p>
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
                    <div class="col-sm-4 invoice-col"> <address>
            <strong>Requestor</strong><br>
            <?php echo $req['Requestor']; ?><br>
            <?php echo $req['requestor_pos']; ?><br>
            <?php echo $req['DeptName']; ?><br>
          </address>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <div class="row invoice-info">
                    <div class="col-xs-12">
                        <h3 class="page-header">
             Applicant Requestor Information
          </h3>
                    </div>
                    <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td width="10%">Position</td>
                                    <td width="40%">
                                        <?php echo $req[ 'requested_pos']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Need</td>
                                    <td>
                                        <?php echo $req[ 'NumberOfPlacement']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Company</td>
                                    <td>
                                        <?php echo $req[ 'CompanyName']; ?>
                                    </td>
                                </tr>
                                <tr id="cc">
                                    <td>Cost Center</td>
                                    <td id="Placement">
                                        <?php echo $req[ 'Placement']; ?>
                                    </td>
                                </tr>
                                <tr id="cc_rec" style="display: none;">
                                    <td>Cost Center</td>
                                    <td> 
                                        <select class="cc form-control" name="cost-center" id="cost-center" style="width:100%;"  required="required">
                                          <option value=""></option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <?php echo $req[ 'Status']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Replacement Name</td>
                                    <td>
                                        <?php if ($req[ 'ReplacementPersonnelID']=='' ) { echo "-"; }else{ echo $req[ 'RepName']; } ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Expected Work Date</td>
                                    <td>
                                        <?php echo $req[ 'ExpectedWorkStartDate']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Responsibility</td>
                                    <td>
                                        <?php echo $req[ 'DuttiesAndResponsibilities']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Requirement</td>
                                    <td>
                                        <?php echo $req[ 'RequirementDescription']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="page-header">Approval Information</h3>
                    </div>
                    <div class="offset-5">
                        <div class="col-md-6">
                            <div class="row invoice-info" id="app-status" style="display: none;">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-5">Request Status</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">
                                                <?php if($req[ 'IsProcessedToHire']=='1' ){ echo "Approved"; }else if ($req[ 'IsHold']=='1' ) { echo "Hold"; }else if ($req[ 'IsRejected']=='1' ) { echo "Rejected"; } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info" id="hold-end" style="display: none">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-5">Hold End Date</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">
                                                <?php echo $req[ 'HoldEndDate']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info" id="rjt-reason" style="display: none">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-5">Reason</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">
                                                <?php echo $req[ 'RejectReason']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info" id="process-date" style="display: none">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-5">Process Start Date</label>
                                        <div class="col-md-6">
                                            <p class="form-control-static">
                                                <?php echo $req[ 'ProcessStartDate']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-mngr">Requested by
                                                <?php echo $req[ 'Requestor']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $req[ 'requestor_pos']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-apv-gm">Approved by
                                                <?php echo $latest[1][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[1][ 'Position']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-hl-gm">Hold by
                                                <?php echo $latest[1][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[1][ 'Position']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-rjt-gm">Rejected by
                                                <?php echo $latest[1][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[1][ 'Position']; ?>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <!-- EDITED BY RECRUITER -->

                            <div class="row invoice-info" id="edited-rec" style="display: none;">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group row">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" class="checkbox-edited-rec">Edited by recruiter
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
                                                <input type="checkbox" class="checkbox-apv-hr">Approved by
                                                <?php echo $latest[2][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[2][ 'Position']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-hl-hr">Hold by
                                                <?php echo $latest[2][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[2][ 'Position']; ?>
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
                                                <input type="checkbox" value="" class="checkbox-rjt-hr">Rejected by
                                                <?php echo $latest[2][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[2][ 'Position']; ?>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- CC APROVAL -->
                            <div class="row invoice-info" id="apv_cc" style="display: none;">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group row">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" class="checkbox-apv-cc">Approved by
                                                <?php echo $latest[3][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[3][ 'Position']; ?>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info" id="hold_cc" style="display: none;">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group row">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox-hl-cc">Hold by
                                                <?php echo $latest[3][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[3][ 'Position']; ?>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-info" id="reject_cc" style="display: none;">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group row">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox-rjt-cc">Rejected by
                                                <?php echo $latest[3][ 'PersonnelName']; ?>
                                                <br>&nbsp &nbsp as
                                                <?php echo $latest[3][ 'Position']; ?>
                                            </label>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                            <!-- COMPLETE -->
                            <div class="row invoice-info" id="completed" style="display: none;">
                                <div class="col-md-8 offset-2">
                                    <div class="form-group row">
                                        <fieldset class="checkbox">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox-completed">Request Completed
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
                           <!--  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
                            <button type="button" class="btn btn-danger pull-right" id="button-reject" data-toggle="modal" data-target="#reject" style="margin-right: 5px;">Reject</button>
                            <button type="button" class="btn btn-warning pull-right" id="button-hold" data-toggle="modal" data-target="#hold" style="margin-right: 5px;">Hold</button>
                            <button type="button" class="btn btn-success pull-right" id="button-process" data-toggle="modal" data-target="#process" style="margin-right: 5px;">Approve</button>
                            <button type="button" class="btn btn-success pull-right" id="button-save"  style="margin-right: 5px;display: none;">Save</button>
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
                            <form class="form-horizontal process" method="POST" action="<?php echo base_url('hr/process/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Start Date</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="process" id="process" class="form-control" min="2018-01-01" max="2030-12-31"> <span id="error_process" class="text-danger"></span> 
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-process" class="btn btn-info waves-effect">OK</button>
                        </div>
                        
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
                            <form class="form-horizontal hold" method="POST" action="<?php echo base_url('hr/hold/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Hold Until</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="date" name="hold" id="hold" class="form-control" min="2018-01-01" max="2030-12-31"> <span id="error_hold" class="text-danger"></span>
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">
                                <button type="button" id="btn-hold" class="btn btn-info waves-effect">OK</button>
                            </div>
                            
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
                            <form class="form-horizontal reject" method="POST" action="<?php echo base_url('hr/reject/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Reason</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="reason_reject" id="reason_reject" class="form-control"> <span id="error_reject" class="text-danger"></span>
                                        <input type="hidden" name="ApprovalStatusID" id="ApprovalStatusID" class="form-control" value="<?php echo $info['ApprovalStatusID']; ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-reject" class="btn btn-info waves-effect">OK</button>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div id="edit-cost-center" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Cost Center</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal edit" method="POST" action="<?php echo base_url('hr/update_cost_center/'.$req['ID']);?>">
                                <div class="form-group row">
                                    <div class="col-md-3">
                                        <label>Select Cost Center</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select class="searching form-control" name="cost_center" id="cost_center" style="width:100%;"  required="required">
                                          <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="btn-edit" class="btn btn-info waves-effect">OK</button>
                        </div>
                        
                    </div>
                </div>
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
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <!-- <script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script> -->
        <!-- Bootstrap 3.3.7 -->
        <!-- <script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
        <!-- FastClick -->
        <script src="<?php echo base_url();?>assets/bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url();?>assets/dist/js/demo.js"></script>
</body>
<script type="text/javascript">


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

    $('.cc').select2({
                placeholder: 'Cost Center Name',
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

    function load(){
                if (<?php echo $req['PlacementID'];?> == '0') {
                    $('#cost-center').removeAttr('value');
                  }else{
                  $('#cost-center')
                  .empty()
                  .append('<option selected value="<?php echo $req['PlacementID'];?>"><?php echo $req['Placement'];?></option>');
                  $('#cost-center').trigger('change');
                }
            }

     $(document).ready(function(){
            var id_req = '<?php echo $req['ID']; ?>';
            console.log(id_req);
    
            var app_process = '<?php echo $req['IsProcessedToHire']; ?>';
            console.log(app_process);
            var app_hold = "<?php echo $req['IsHold'] ;?>"
            var app_reject = "<?php echo $req['IsRejected'] ;?>";
            var reqstor = "<?php echo $this->session->userdata('ID2'); ?>";
            var position_req = "<?php echo $this->session->userdata('Position'); ?>";
            console.log(position_req);

            console.log("<?php echo $req['RequestorID'] ;?>");
            var appstatus2 = "<?php echo $max['ApprovalStatusID']; ?>";
            var app_process2 = "<?php echo $max['IsProcessedToHire']; ?>";
            var app_hold2 = "<?php echo $max['IsHold']; ?>";
            var app_reject2 = "<?php echo $max['IsRejected'] ; ?>";
            var rec = "<?php echo $req['LastModifiedById'] ?>";
            console.log(rec);


            if (appstatus2 == '1') {
                if (reqstor == <?php echo $req['RequestorID'] ;?> && app_process == '0' &&  app_reject == '0' && app_hold == '0'){
                    $('#lbl-danger').show();
                    $('#button-process').hide();
                    $('#button-hold').hide();
                    $('#button-reject').hide();
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-gm').prop('disabled', true);
                    $('.checkbox-hr').attr("disabled", true);  
                }else {
                    $('#button-process').show();
                    $('#button-hold').show();
                    $('#button-reject').show();
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-gm').prop('disabled', true);
                    $('.checkbox-hr').attr("disabled", true);  
                }
            }

            if (appstatus2 == '2') {
                if (position_req == 'Transito Adimanjati Director') {
                    $('#button-process').show();
                    $('#button-hold').show();
                    $('#button-reject').show();
                    // if (app_process2 == '1') {
                    //     $('#edit-cost-center').modal('show');
                    // }
                }else{
                    $('#button-process').hide();
                    $('#button-hold').hide();
                    $('#button-reject').hide();
                }
                if (app_process2 == '1') {
                    // $('#edit-cost-center').modal('show');
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-apv-gm').prop('checked', true);
                    $('#app-status').show();
                    $('#process-date').show();
                    $('#apv_gm').show();
                }else if (app_hold2 == '1') {
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-hl-gm').prop('checked', true);
                    $('#app-status').show();
                    $('#hold-end').show();
                    $('#hold-by').show();
                }else if (app_reject2 == '1') {
                    $('#app-status').show();
                    $('#rjt-reason').show();
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-rjt-gm').prop('checked', true);
                    $('#reject-by').show();
                }
                if (rec == '146') {

                }else{
                    $('#button-save').show();
                    $('#cc_rec').show();
                    $('#cc').hide();
                    $('#lbl-rec-notif').show();
                    load();

                }
            }

            if (appstatus2 == "3") {
                if (reqstor == '1700') {
                    $('#button-process').show();
                    $('#button-hold').show();
                    $('#button-reject').show();
                }else{
                    $('#button-process').hide();
                    $('#button-hold').hide();
                    $('#button-reject').hide();
                    $('#button-sent-back').hide();
                    $('#img-print').show();
                }
                if (app_process2 == '1') {
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-apv-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-apv-hr').prop("checked", true);
                    $('#app-status').show();
                    $('#process-date').show();
                    $('#apv_gm').show();
                    $('#edited-rec').show();
                    $('#apv_hr').show();
                }else if (app_hold2 == '1') {
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-hl-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-hl-hr').prop("checked", true);
                    $('#app-status').show();
                    $('#hold-end').show();
                    $('#hold-by').show();
                    $('#edited-rec').show();
                    $('#hold_hr').show();
                }else if (app_reject2 == '1') {
                    $('#app-status').show();
                    $('#rjt-reason').show();
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-rjt-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-rjt-hr').prop("checked", true);
                    $('#reject-by').show();
                    $('#edited-rec').show();
                    $('#reject_hr').show();
                }
            }

            if (appstatus2 == '4') {
                $('#button-process').hide();
                $('#button-hold').hide();
                $('#button-reject').hide();
                $('#button-sent-back').hide();
                if (app_process2 == '1') {
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-apv-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-apv-hr').prop("checked", true);
                    $('.checkbox-apv-cc').prop("checked", true);
                    $('.checkbox-completed').prop("checked", true);
                    $('#app-status').show();
                    $('#process-date').show();
                    $('#apv_gm').show();
                    $('#edited-rec').show();
                    $('#apv_hr').show();
                    $('#apv_cc').show();
                    $('#completed').show();
                }else if (app_hold2 == '1') {
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-hl-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-hl-hr').prop("checked", true);
                    $('.checkbox-hl-cc').prop("checked", true);
                    $('#app-status').show();
                    $('#hold-end').show();
                    $('#hold-by').show();
                    $('#edited-rec').show();
                    $('#hold_hr').show();
                    $('#hold_cc').show();
                }else if (app_reject2 == '1') {
                    $('#app-status').show();
                    $('#rjt-reason').show();
                    $('.checkbox-mngr').prop('checked', true);
                    $('.checkbox-rjt-gm').prop('checked', true);
                    $('.checkbox-edited-rec').prop("checked", true);
                    $('.checkbox-rjt-hr').prop("checked", true);
                    $('.checkbox-rjt-cc').prop("checked", true);
                    $('#reject-by').show();
                    $('#edited-rec').show();
                    $('#reject_hr').show();
                    $('#reject_cc').show();
                }
            }
    
            // if (app_process == '1' || app_reject == '1' || app_hold == '1') {
            //     $('#button-process').hide();
            //     $('#button-hold').hide();
            //     $('#button-reject').hide();
            //     $('#button-sent-back').hide();
            // }
            // if (app_process == '1') {
            //     $('.checkbox-mngr').prop('checked', true);
            //     $('.checkbox-apv-gm').prop('checked', true);
            //     $('.checkbox-hr').attr("disabled", true);
            //     $('#app-status').show();
            //     $('#process-date').show();
            //     $('#apv_gm').show();
            // }
            // if (app_hold == '1' ) {
            //     $('.checkbox-mngr').prop('checked', true);
            //     $('.checkbox-hl-gm').prop('checked', true);
            //     $('.checkbox-hr').attr("disabled", true);
            //     $('#app-status').show();
            //     $('#hold-end').show();
            //     $('#hold-by').show();
                
            // }
            // if (app_reject == '1') {
            //     $('#app-status').show();
            //     $('#rjt-reason').show();
            //     $('.checkbox-mngr').prop('checked', true);
            //     $('.checkbox-rjt-gm').prop('checked', true);
            //     $('.checkbox-hr').attr("disabled", true);
            //     $('#reject-by').show();
            // }
    
            var edit;
            var cost_center_text;
            $('#btn-edit').click(function(){
                edit = $("#edit-cost-center #cost_center").val().trim();
                cost_center_text = $('#edit-cost-center #cost_center').text();
                console.log("edit"+cost_center_text);
                var form_data = $('.edit').serialize();
                console.log(form_data);
                $.ajax({
                method: 'POST',
                url: '<?php echo base_url('hr/update_cost_center/');?>'+id_req,
                data: form_data,
                success: function(status) {
                    if (status) {
                        $('#edit-cost-center').modal('hide');
                        $('#Placement').html(cost_center_text);
                    }   
                   },
                error: function() {
                    alert('Approval failed');
                }
            });
            });

            $('#button-save').click(function(){
                cost_center_new = $('#cost-center').val();
                $.ajax({
                method: 'POST',
                url: '<?php echo base_url('hr/update_cost_center/');?>'+id_req,
                data: {cost_center : cost_center_new},
                success: function(status) {
                    if (status) {
                        alert("success");
                        window.location.href = '<?php echo base_url('hr/need_approval');?>';
                    }   
                   },
                error: function() {
                    alert('Approval failed');
                }
            });
            });
    
    
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
                url: '<?php echo base_url('hr/Process/');?>'+id_req,
                data: form_data,
                success: function(data) {
                    if (status) {
                       
                        window.location.href = '<?php echo base_url('hr/need_approval');?>';
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
                url: '<?php echo base_url('hr/hold/');?>'+id_req,
                data: form_data,
                success: function(data) {
                    if (status) {
                          alert('Hold Request success');
                           window.location.href = '<?php echo base_url('hr/need_approval');?>';
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
                url: '<?php echo base_url('hr/reject/');?>'+id_req,
                data: form_data,
                success: function(data) {
                    if (status) {
                          alert('Reject Request success');
                           window.location.href = '<?php echo base_url('hr/need_approval');?>';
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