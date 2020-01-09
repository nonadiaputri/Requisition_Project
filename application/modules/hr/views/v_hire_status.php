<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>KGMedia | <?php echo ucfirst($this->uri->segment(1))." ".ucfirst($this->uri->segment(2));?></title>
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


<link rel="stylesheet" href="http://apps.kmn.kompas.com/static/kompas-intranet/latest/kompas-intranet.css" />

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
                        <li><a href="/dashboard" title="Our Portal">Our Portal</a></li>
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
  <!-- /.content-wrapper -->
  

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
