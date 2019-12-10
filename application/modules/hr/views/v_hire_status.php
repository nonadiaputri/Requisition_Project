<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Icons</title>
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
  <!-- demo style -->
  <style>
    /* FROM HTTP://WWW.GETBOOTSTRAP.COM
     * Glyphicons
     *
     * Special styles for displaying the icons and their classes in the docs.
     */

    .bs-glyphicons {
      padding-left: 0;
      padding-bottom: 1px;
      margin-bottom: 20px;
      list-style: none;
      overflow: hidden;
    }

    .bs-glyphicons li {
      float: left;
      width: 25%;
      height: 115px;
      padding: 10px;
      margin: 0 -1px -1px 0;
      font-size: 12px;
      line-height: 1.4;
      text-align: center;
      border: 1px solid #ddd;
    }

    .bs-glyphicons .glyphicon {
      margin-top: 5px;
      margin-bottom: 10px;
      font-size: 24px;
    }

    .bs-glyphicons .glyphicon-class {
      display: block;
      text-align: center;
      word-wrap: break-word; /* Help out IE10+ with class names */
    }

    .bs-glyphicons li:hover {
      background-color: rgba(86, 61, 124, .1);
    }

    @media (min-width: 768px) {
      .bs-glyphicons li {
        width: 12.5%;
      }
    }
  </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
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
        Icons
        <small>a set of beautiful icons</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Icons</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#fa-icons" data-toggle="tab">Approved</a></li>
              <li><a href="#glyphicons" data-toggle="tab">Hold</a></li>
              <li><a href="#glyphicons" data-toggle="tab">Reject</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="fa-icons">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Requester</th>
                        <th>Department</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num=1; ?>
                    <?php foreach($myreq as $row){ ?>
                    <tr>
                        <td width="10%"><?php echo $num; ?></td>
                        <td width="20%"><?php echo $row['requestor']; ?></td>
                        <td width="20%"><?php echo $row['DeptName']; ?></td>
                        <td width="20%"><?php echo $row['ProcessStartDate']; ?></td>
                        <td><?php
                        if ($row['IsProcessedToHire']=='' && $row['IsHold']=='' && $row['IsRejected']=='' ) {
                            echo "Waiting for approval";
                         }else if($row['IsProcessedToHire']=='1' && $row['IsHold']=='' && $row['IsRejected']==''){
                            echo "Approved";
                         }else if ($row['IsProcessedToHire']=='' && $row['IsHold']=='1' && $row['IsRejected']=='') {
                            echo "Hold";
                         }else if ($row['IsProcessedToHire']=='' && $row['IsHold']=='' && $row['IsRejected']=='1') {
                            echo "Rejected";
                        }
                          
                         ?></td>
                        <td width="20%" align="center">
                             <?php
                              if ($row['IsProcessedToHire'] == 2) { ?>
                                  <a href ="<?php echo base_url('Hr/Edit/'.$row['ID']); ?>" class="btn waves-effect waves-light btn-warning" role="button" aria-pressed="true">Edit</a>
                                  <a href ="<?php echo base_url('Hr/Delete/'.$row['ID']); ?>" class="btn waves-effect waves-light btn-danger" role="button" aria-pressed="true">Delete</a>
                                   
                               <?php }else{
                                  ?>
                                  <a href ="<?php echo base_url('Hr/View/'.$row['ID']); ?>" class="btn waves-effect waves-light btn-info" role="button" aria-pressed="true">View</a>

                              <?php }  ?>
                        </td>
                    </tr>
                    <?php $num++; } ?>
                </tbody>
              </table>
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane" id="glyphicons">

                <ul class="bs-glyphicons">
                  <li>
                    <span class="glyphicon glyphicon-asterisk"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-asterisk</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-plus"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-plus</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-euro"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-euro</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-eur"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-eur</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-minus"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-minus</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cloud"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cloud</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-envelope"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-envelope</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-pencil"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-pencil</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-glass"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-glass</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-music"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-music</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-search"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-search</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-heart"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-heart</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-star</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-star-empty</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-user</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-film"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-film</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-th-large"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-th-large</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-th"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-th</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-th-list"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-th-list</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ok"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ok</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-remove"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-remove</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-zoom-in"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-zoom-in</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-zoom-out"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-zoom-out</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-off"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-off</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-signal"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-signal</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cog"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cog</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-trash"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-trash</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-home</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-file"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-file</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-time"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-time</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-road"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-road</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-download-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-download-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-download"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-download</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-upload"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-upload</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-inbox"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-inbox</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-play-circle"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-play-circle</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-repeat"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-repeat</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-refresh"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-refresh</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-list-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-lock"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-lock</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-flag"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-flag</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-headphones"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-headphones</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-volume-off"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-volume-off</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-volume-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-volume-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-volume-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-volume-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-qrcode"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-qrcode</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-barcode"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-barcode</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tag"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tag</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tags"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tags</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-book"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-book</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bookmark"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bookmark</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-print"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-print</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-camera"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-camera</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-font"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-font</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bold"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bold</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-italic"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-italic</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-text-height"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-text-height</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-text-width"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-text-width</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-align-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-align-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-align-center"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-align-center</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-align-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-align-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-align-justify"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-align-justify</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-list"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-list</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-indent-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-indent-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-indent-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-indent-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-facetime-video"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-facetime-video</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-picture"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-picture</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-map-marker"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-map-marker</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-adjust"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-adjust</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tint"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tint</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-edit"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-edit</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-share"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-share</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-check"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-check</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-move"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-move</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-step-backward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-step-backward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-fast-backward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-fast-backward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-backward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-backward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-play"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-play</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-pause"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-pause</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-stop"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-stop</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-forward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-forward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-fast-forward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-fast-forward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-step-forward"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-step-forward</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-eject"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-eject</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-chevron-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-chevron-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-plus-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-minus-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-minus-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-remove-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-remove-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ok-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ok-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-question-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-question-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-info-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-info-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-screenshot"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-screenshot</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-remove-circle"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-remove-circle</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ok-circle"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ok-circle</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ban-circle"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ban-circle</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-arrow-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-arrow-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-arrow-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-arrow-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-arrow-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-arrow-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-arrow-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-arrow-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-share-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-share-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-resize-full"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-resize-full</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-resize-small"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-resize-small</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-exclamation-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-gift"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-gift</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-leaf"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-leaf</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-fire"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-fire</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-eye-open"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-eye-open</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-eye-close"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-eye-close</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-warning-sign"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-warning-sign</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-plane"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-plane</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-calendar"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-calendar</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-random"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-random</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-comment"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-comment</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-magnet"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-magnet</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-chevron-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-chevron-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-chevron-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-chevron-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-retweet"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-retweet</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-shopping-cart</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-folder-close"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-folder-close</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-folder-open"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-folder-open</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-resize-vertical"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-resize-vertical</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-resize-horizontal"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-resize-horizontal</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hdd"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hdd</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bullhorn"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bullhorn</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bell"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bell</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-certificate"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-certificate</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-thumbs-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-thumbs-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-thumbs-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-thumbs-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hand-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hand-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hand-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hand-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hand-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hand-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hand-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hand-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-circle-arrow-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-circle-arrow-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-circle-arrow-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-circle-arrow-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-circle-arrow-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-globe"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-globe</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-wrench"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-wrench</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tasks"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tasks</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-filter"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-filter</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-briefcase"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-briefcase</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-fullscreen"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-fullscreen</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-dashboard"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-dashboard</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-paperclip"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-paperclip</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-heart-empty"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-heart-empty</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-link"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-link</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-phone"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-phone</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-pushpin"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-pushpin</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-usd"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-usd</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-gbp"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-gbp</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-alphabet"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-alphabet-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-alphabet-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-order"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-order</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-order-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-order-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-attributes"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sort-by-attributes-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sort-by-attributes-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-unchecked"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-unchecked</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-expand"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-expand</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-collapse-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-collapse-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-collapse-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-collapse-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-log-in"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-log-in</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-flash"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-flash</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-log-out"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-log-out</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-new-window"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-new-window</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-record"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-record</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-save"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-save</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-open"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-open</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-saved"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-saved</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-import"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-import</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-export"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-export</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-send"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-send</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-floppy-disk</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-floppy-saved"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-floppy-saved</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-floppy-remove"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-floppy-remove</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-floppy-save"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-floppy-save</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-floppy-open"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-floppy-open</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-credit-card"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-credit-card</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-transfer"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-transfer</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cutlery"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cutlery</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-header"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-header</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-compressed"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-compressed</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-earphone"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-earphone</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-phone-alt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-phone-alt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tower"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tower</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-stats"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-stats</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sd-video"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sd-video</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hd-video"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hd-video</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-subtitles"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-subtitles</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sound-stereo"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sound-stereo</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sound-dolby"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sound-dolby</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sound-5-1"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sound-5-1</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sound-6-1"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sound-6-1</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sound-7-1"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sound-7-1</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-copyright-mark"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-copyright-mark</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-registration-mark"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-registration-mark</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cloud-download"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cloud-download</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cloud-upload"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cloud-upload</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tree-conifer"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tree-conifer</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tree-deciduous"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tree-deciduous</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-cd"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-cd</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-save-file"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-save-file</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-open-file"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-open-file</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-level-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-level-up</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-copy"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-copy</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-paste"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-paste</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-alert"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-alert</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-equalizer"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-equalizer</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-king"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-king</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-queen"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-queen</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-pawn"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-pawn</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bishop"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bishop</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-knight"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-knight</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-baby-formula"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-baby-formula</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-tent"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-tent</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-blackboard"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-blackboard</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bed"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bed</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-apple"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-apple</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-erase"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-erase</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-hourglass"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-hourglass</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-lamp"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-lamp</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-duplicate"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-duplicate</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-piggy-bank"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-piggy-bank</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-scissors"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-scissors</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-bitcoin"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-bitcoin</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-btc"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-btc</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-xbt"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-xbt</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-yen"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-yen</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-jpy"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-jpy</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ruble"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ruble</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-rub"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-rub</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-scale"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-scale</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ice-lolly"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ice-lolly</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-ice-lolly-tasted"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-ice-lolly-tasted</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-education"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-education</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-option-horizontal"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-option-horizontal</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-option-vertical"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-option-vertical</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-menu-hamburger</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-modal-window"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-modal-window</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-oil"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-oil</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-grain"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-grain</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-sunglasses"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-sunglasses</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-text-size"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-text-size</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-text-color"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-text-color</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-text-background"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-text-background</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-top"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-top</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-bottom"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-bottom</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-horizontal"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-horizontal</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-vertical"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-vertical</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-object-align-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-object-align-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-triangle-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-triangle-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-triangle-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-triangle-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-triangle-bottom"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-triangle-bottom</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-triangle-top"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-triangle-top</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-console"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-console</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-superscript"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-superscript</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-subscript"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-subscript</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-menu-left"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-menu-left</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-menu-right"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-menu-right</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-menu-down"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-menu-down</span>
                  </li>
                  <li>
                    <span class="glyphicon glyphicon-menu-up"></span>
                    <span class="glyphicon-class">glyphicon glyphicon-menu-up</span>
                  </li>
                </ul>
              </div>
              <!-- /#ion-icons -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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
</html>
