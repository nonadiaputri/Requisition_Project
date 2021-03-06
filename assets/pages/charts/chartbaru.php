<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>KGMedia
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto'>

    <style>
        .full-container {
            background-color: red;
            width: 100%;
            height: 100%;
            font-family: 'Roboto', sans-serif;
        }
        /* ########################   DEPARTMENT INFO  ############################*/
        
        .department-information {
            font-family: 'Roboto', sans-serif;
            display: none;
            box-shadow: 0 0 5px #999999;
            position: absolute;
            max-width: 200px;
            top: 60px;
            left: 20px;
            padding: 10px;
            background-color: white;
        }
        
        .department-information .dept-name {
            color: #26a69a;
            font-weight: bold;
        }
        
        .department-information .dept-description {
            margin-top: 10px;
            color: #959b9a;
            font-size: 13px;
        }
        
        .department-information .dept-emp-count {
            margin-top: 10px;
            color: #959b9a;
            font-size: 13px;
        }
        /* ############################## SEARCHBOX ######################################### */
        
        .user-search-box {
            overflow: hidden;
            position: absolute;
            right: 0;
            height: 100%;
            top: 0;
            width: 0;
            background-color: white;
            border: 1px solid #c7dddb;
            font-family: 'Roboto', sans-serif;
            font-size: 14px;
            line-height: 1.5;
        }
        
         ::-webkit-input-placeholder {
            /* WebKit, Blink, Edge */
            color: #bcbcc4;
            opacity: 0.5;
        }
        
         :-moz-placeholder {
            /* Mozilla Firefox 4 to 18 */
            color: #bcbcc4;
            opacity: 0.5;
        }
        
         ::-moz-placeholder {
            /* Mozilla Firefox 19+ */
            color: #bcbcc4;
            opacity: 0.5;
        }
        
         :-ms-input-placeholder {
            /* Internet Explorer 10-11 */
            color: #bcbcc4;
            opacity: 0.5;
        }
        
        .user-search-box .input-box {
            width: 100%;
            height: 200px;
            top: 0;
            background-color: #e8efee;
        }
        
        .user-search-box .close-button-wrapper i {
            margin: 10px;
            margin-left: 9%;
            font-size: 60px;
            font-weight: 400;
            color: #aa1414;
        }
        
        .user-search-box input {
            color: gray !important;
            background-color: transparent;
            border: none;
            border-bottom: 1px solid #9e9e9e;
            border-radius: 0;
            outline: none;
            height: 3rem;
            width: 100%;
            font-size: 1rem;
            margin: 0 0 20px 0;
            padding: 0;
            box-shadow: none;
            box-sizing: content-box;
            transition: all 0.3s;
        }
        
        .user-search-box input:focus {
            border-bottom: 1px solid #26a69a;
            box-shadow: 0 1px 0 0 #26a69a;
        }
        
        .user-search-box .result-header {
            background-color: white;
            font-weight: 700;
            padding: 12px;
            color: gray;
            border-top: 2px solid #d3e8e5;
            border-bottom: 1px solid #d3e8e5;
        }
        
        .user-search-box .result-list {
            position: absolute;
            max-height: 100%;
            min-width: 100%;
            overflow: auto;
        }
        
        .user-search-box .buffer {
            width: 100%;
            height: 400px;
        }
        
        .user-search-box .list-item {
            clear: both;
            background-color: white;
            position: relative;
            background-color: white;
            width: 100%;
            height: 100px;
            border-top: 1px solid #d3e8e5;
        }
        
        .user-search-box .list-item a {
            display: inline;
            margin: 0;
        }
        
        .user-search-box .list-item .image-wrapper {
            float: left;
            width: 100px;
            height: 100px;
        }
        
        .user-search-box .list-item .image {
            width: 70px;
            height: 70px;
            margin-left: 15px;
            margin-top: 15px;
            border-radius: 5px;
        }
        
        .user-search-box .list-item .description {
            padding: 15px;
            padding-left: 0px;
            float: left;
            width: 180px;
        }
        
        .user-search-box .list-item .buttons {
            padding: 15px;
            padding-left: 0px;
            float: left;
            width: auto;
        }
        
        .user-search-box .list-item .description .name {
            font-size: 15px;
            color: #aa1414;
            font-weight: 900;
            margin: 0;
            padding: 0;
            letter-spacing: 1px;
        }
        
        .user-search-box .list-item .description .position-name {
            color: #59525b;
            letter-spacing: 1px;
            font-size: 12px;
            font-weight: 900;
            margin: 0;
            margin-top: 3px;
            padding: 0;
        }
        
        .user-search-box .list-item .description .area {
            color: #91a4a5;
            letter-spacing: 1px;
            font-size: 12px;
            font-weight: 400;
            margin: 0;
            margin-top: 3px;
            padding: 0;
        }
        
        .user-search-box .list-item .btn-locate {
            margin-top: 30px;
        }
        
        .user-search-box .list-item .btn-search-box {
            font-size: 10px;
        }
        
        .user-search-box .close-button-wrapper i:hover {
            color: black;
            cursor: pointer;
        }
        
        .user-search-box .input-wrapper {
            width: 80%;
            margin: 0 auto;
        }
        
        .user-search-box .input-bottom-placeholder {
            margin-top: -16px;
            color: #bcbcc4;
            letter-spacing: 1px;
        }
        /* ############################### Tooltip css ########################### */
        
        .profile-image-wrapper {
            background-size: 210px;
            margin: 30px;
            border-radius: 50%;
            width: 210px;
            height: 210px;
        }
        
        .customTooltip-wrapper {
            font-family: 'Roboto', sans-serif;
            opacity: 0;
            /* NEW */
            display: none;
            position: absolute;
        }
        
        .customTooltip {
            background: white;
            box-shadow: 0 0 5px #999999;
            color: #333;
            position: absolute;
            font-size: 12px;
            left: 130px;
            text-align: center;
            top: 95px;
            z-index: 10;
            text-align: left;
        }
        
        .tooltip-hr {
            width: 70px;
            background-color: #91a4a5;
            height: 1px;
            margin-left: auto;
            margin-right: auto;
            margin-top: -17px;
            margin-bottom: 25px;
        }
        
        .tooltip-desc {
            padding-left: 10px;
            margin-top: -20px;
            margin-left: 20px;
            overflow: auto;
        }
        
        .tooltip-desc .name {
            color: #962828;
            font-weight: 900;
            letter-spacing: 1px;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 2px;
            text-decoration: none;
        }
        
        .tooltip-desc .name:hover {
            text-decoration: underline;
        }
        
        .tooltip-desc .position {
            color: #59525b;
            letter-spacing: 1px;
            font-size: 17px;
            font-weight: 500;
            margin-bottom: 2px;
            margin-top: 0px;
        }
        
        .tooltip-desc .area {
            color: #91a4a5;
            letter-spacing: 1px;
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 2px;
            margin-top: 7px;
        }
        
        .tooltip-desc .office {
            color: #91a4a5;
            line-height: 160%;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: -10px;
            margin-top: -5px;
        }
        
        .tooltip-desc .tags-wrapper .title {
            display: inline-block;
            float: left;
        }
        
        .tooltip-desc .tags-wrapper .tags {
            display: inline-block;
            float: left;
        }
        
        .bottom-tooltip-hr {
            width: 100%;
            background-color: #58993e;
            height: 3px;
            margin-left: auto;
            margin-right: auto;
            margin-top: -17px;
        }
        
        .btn-tooltip-department {
            margin-top: 20px;
        }
        
        .btn.disabled {
            background-color: #DFDFDF !important;
            box-shadow: none;
            color: #9F9F9F !important;
            cursor: default;
        }
        
        .btn {
            border: none;
            border-radius: 2px;
            height: 36px;
            line-height: 36px;
            outline: 0;
            text-transform: uppercase;
            vertical-align: middle;
            -webkit-tap-highlight-color: transparent;
            text-decoration: none;
            color: #fff;
            background-color: #26a69a;
            text-align: center;
            letter-spacing: .5px;
            transition: .2s ease-out;
            cursor: pointer;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        }
        
        .btn:hover {
            box-shadow: 0 5px 11px 0 rgba(0, 0, 0, 0.18), 0 4px 15px 0 rgba(0, 0, 0, 0.15);
        }
        
        .btn.disabled:hover {
            box-shadow: none;
        }
        /* ####################################### TAGS ###################################### */
        
        .tags {
            list-style: none;
            margin-top: -9px;
            margin-left: 5px;
            overflow: hidden;
            padding: 0;
        }
        
        .tags-wrapper {
            font-size: 2.28rem;
            line-height: 110%;
            margin: 1.14rem 0 0.912rem 0;
        }
        
        .tags-wrapper .title {
            color: #91a4a5;
            font-size: 24px;
        }
        
        .tags li {
            float: left;
        }
        
        .tag {
            font-size: 11px;
            background: #E1ECF4;
            border-radius: 2px;
            color: #39739d;
            display: inline-block;
            height: 20px;
            line-height: 20px;
            padding: 0 5px 0 5px;
            position: relative;
            margin: 0 5px 5px 0;
            text-decoration: none;
            --webkit-transition: color 0.2s;
        }
        /* #############################   Buttons  ############################################*/
        
        .btn-search {
            top: 80px;
        }
        
        .btn-fullscreen {
            top: 20px;
        }
        
        .btn-back {
            top: 20px;
            left: 20px;
            display: none;
        }
        
        .btn-show-my-self {
            top: 50px;
        }
        
        .btn-action {
            position: absolute;
            right: 25px;
            height: 26px;
            color: white;
            background-color: #aa1414;
            border: 1px solid black;
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-family: 'Roboto', sans-serif;
        }
        
        .btn-action:focus {
            outline: 0;
            background-color: #aa1414;
        }
        
        .btn-action:hover {
            background-color: #490b0b;
        }
        
        .btn-action i {
            font-size: 14px;
        }
        
        .btn-action .icon {
            background-color: #c19e45;
            padding: 5px 6px 5px 6px;
            border-radius: 11px;
            margin-right: -7px;
        }
        /* ############################################## SVG ################################# */
        
        .nodeHasChildren {
            fill: white;
        }
        
        .nodeDoesNotHaveChildren {
            fill: white;
        }
        
        .nodeRepresentsCurrentUser {
            stroke: Chartreuse;
            stroke-width: 3;
        }
        
        text {
            fill: dimgray;
        }
        
        .link {
            fill: none;
            stroke: #ccc;
            stroke-width: 1.5px;
        }
        
        .node {
            cursor: pointer;
        }
        
        .node-collapse {
            stroke: grey;
        }
        
        .node-collapse-right-rect {
            fill: #70c645;
            stroke: #70c645;
        }
        
        .node text {
            fill: white;
            font-family: "Segoe UI", Arial, sans-serif;
            font-size: 10px;
        }
        
        .node circle {
            stroke-width: 1px;
            stroke: #70c645;
            fill: #70c645;
        }
        
        .node-group .emp-name {
            fill: #962828;
            font-size: 12px;
            font-weight: 600;
        }
        
        .node-group .emp-position-name {
            fill: #59525b;
            font-size: 11px;
        }
        
        .node-group .emp-area {
            fill: #91a4a5;
            font-size: 10px;
        }
        
        .node-group .emp-count,
        .node-group .emp-count-icon {
            fill: #91a4a5;
            font-size: 12px;
        }
    </style>






</head>

<body translate="no">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="../../index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>KG</b>EP</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>KGMedia</b> EP</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url(); ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    KGMedia EP Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url(); ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url(); ?>assets/dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= base_url(); ?>assets/dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li>
                                            <!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">Alexander Pierce</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Alexander Pierce</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?= base_url(); ?>assets/index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
                            <li><a href="<?= base_url(); ?>assets/index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Layout Options</span>
                            <span class="pull-right-container">
                  <span class="label label-primary pull-right">4</span>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
                            <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
                            <li><a href="../layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
                            <li><a href="../layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../widgets.html">
                            <i class="fa fa-th"></i> <span>Widgets</span>
                            <span class="pull-right-container">
                  <small class="label pull-right bg-green">new</small>
                </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-database"></i>
                            <span>Master</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href='<?php echo site_url(' crud/master/personnel ')?>'><i class="fa fa-user"></i>Personnel</a></li>
                            <li><a href='<?php echo site_url(' crud/master/company ')?>'><i class="fa fa-institution"></i>Company</a></li>
                            <li><a href='<?php echo site_url(' crud/master/organization ')?>'><i class="fa fa-cubes"></i>Organization</a></li>
                            <li><a href='<?php echo site_url(' crud/master/costcenter ')?>'><i class="fa fa-cc"></i>Cost Center</a></li>
                            <li><a href='<?php echo site_url(' crud/master/position ')?>'><i class="fa fa-suitcase"></i>Position</a></li>
                            <!-- <li><a href='<?php echo site_url('crud/master/film_management')?>'>Films</a></li>
                <li><a href='<?php echo site_url('crud/master/multigrids')?>'>Multigrid [BETA]</a></li>			 -->
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Charts</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href='<?php echo base_url(' assets/pages/charts/chartbaru.html ');?>'><i class="fa fa-circle-o"></i> ChartGrid</a></li>
                            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>UI Elements</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                            <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                            <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                            <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                            <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                            <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i> <span>Forms</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                            <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                            <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                        </ul>
                    </li>
                    <li class="treeview active">
                        <a href="#">
                            <i class="fa fa-table"></i> <span>Tables</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                            <li class="active"><a href="data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="../calendar.html">
                            <i class="fa fa-calendar"></i> <span>Calendar</span>
                            <span class="pull-right-container">
                  <small class="label pull-right bg-red">3</small>
                  <small class="label pull-right bg-blue">17</small>
                </span>
                        </a>
                    </li>
                    <li>
                        <a href="../mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <span class="pull-right-container">
                  <small class="label pull-right bg-yellow">12</small>
                  <small class="label pull-right bg-green">16</small>
                  <small class="label pull-right bg-red">5</small>
                </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Examples</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="../examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                            <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                            <li><a href="../examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                            <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                            <li><a href="../examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                            <li><a href="../examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                            <li><a href="../examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                            <li><a href="../examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                            <li><a href="../examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>Multilevel</span>
                            <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                            <li class="treeview">
                                <a href="#"><i class="fa fa-circle-o"></i> Level One
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                                    <li class="treeview">
                                        <a href="#"><i class="fa fa-circle-o"></i> Level Two
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                                        <ul class="treeview-menu">
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                        </ul>
                    </li>
                    <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
                    <li class="header">LABELS</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <div id="full-container">
            <button class="btn-action btn-fullscreen" onclick="params.funcs.toggleFullScreen()">Fullscreen <span class='icon' /> <i class="fa fa-arrows-alt" aria-hidden="true"></i></span></button>
            <button class="btn-action btn-show-my-self" onclick="params.funcs.showMySelf()"> Show myself <span class='icon' /> <i class="fa fa-user" aria-hidden="true"></i></span></button>

            <button class=" btn-action btn-search" onclick="params.funcs.search()"> Search <span class='icon' /> <i class="fa fa-search" aria-hidden="true"></i></span></button>

            <button class=" btn-action btn-back" onclick="params.funcs.back()"> Back <span class='icon' /> <i class="fa fa-arrow-left" aria-hidden="true"></i></span></button>

            <div class="department-information">
                <div class="dept-name">
                    dept name
                </div>
                <div class="dept-emp-count">
                    dept description test, this is department description
                </div>
                <div class="dept-description">
                    dept description test, this is department description
                </div>
            </div>

            <div class="user-search-box">
                <div class="input-box">
                    <div class="close-button-wrapper"><i onclick="params.funcs.closeSearchBox()" class="fa fa-times" aria-hidden="true"></i></div>
                    <div class="input-wrapper">
                        <input type="text" class="search-input" placeholder="Search" />
                        <div class="input-bottom-placeholder">By Firstname, Lastname, Tags</div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="result-box">
                    <div class="result-header"> RESULTS </div>
                    <div class="result-list">


                        <div class="buffer"></div>
                    </div>
                </div>
            </div>
            <div id="svgChart"></div>
            <!--
                       <button class="btn btn-expand" onclick="params.funcs.expandAll()">Expand All</button>
                    -->
        </div>
    </div>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.17/d3.min.js'></script>



    <script>
        var params = {
            selector: "#svgChart",
            dataLoadUrl: "hirarkiAPInew.json",
            chartWidth: window.innerWidth - 0,
            chartHeight: window.innerHeight - 0,
            funcs: {
                showMySelf: null,
                search: null,
                closeSearchBox: null,
                clearResult: null,
                findInTree: null,
                reflectResults: null,
                departmentClick: null,
                back: null,
                toggleFullScreen: null,
                locate: null
            },
            data: null
        }

        d3.json(params.dataLoadUrl, function(data) {
            params.data = data;
            params.pristinaData = JSON.parse(JSON.stringify(data));

            drawOrganizationChart(params);
        })

        function drawOrganizationChart(params) {
            listen();

            params.funcs.showMySelf = showMySelf;
            params.funcs.expandAll = expandAll;
            params.funcs.search = searchUsers;
            params.funcs.closeSearchBox = closeSearchBox;
            params.funcs.findInTree = findInTree;
            params.funcs.clearResult = clearResult;
            params.funcs.reflectResults = reflectResults;
            params.funcs.departmentClick = departmentClick;
            params.funcs.back = back;
            params.funcs.toggleFullScreen = toggleFullScreen;
            params.funcs.locate = locate;

            var attrs = {
                EXPAND_SYMBOL: '\uf067',
                COLLAPSE_SYMBOL: '\uf068',
                selector: params.selector,
                root: params.data,
                width: params.chartWidth,
                height: params.chartHeight,
                index: 0,
                nodePadding: 9,
                collapseCircleRadius: 7,
                nodeHeight: 80,
                nodeWidth: 210,
                duration: 750,
                rootNodeTopMargin: 20,
                minMaxZoomProportions: [0.05, 3],
                linkLineSize: 180,
                collapsibleFontSize: '10px',
                userIcon: '\uf007',
                nodeStroke: "#ccc",
                nodeStrokeWidth: '1px'
            }

            var dynamic = {}
            dynamic.nodeImageWidth = attrs.nodeHeight * 100 / 140;
            dynamic.nodeImageHeight = attrs.nodeHeight - 2 * attrs.nodePadding;
            dynamic.nodeTextLeftMargin = attrs.nodePadding * 2 + dynamic.nodeImageWidth
            dynamic.rootNodeLeftMargin = attrs.width / 2;
            dynamic.nodePositionNameTopMargin = attrs.nodePadding + 8 + dynamic.nodeImageHeight / 4 * 1
            dynamic.nodeChildCountTopMargin = attrs.nodePadding + 14 + dynamic.nodeImageHeight / 4 * 3

            var tree = d3.layout.tree().nodeSize([attrs.nodeWidth + 40, attrs.nodeHeight]);
            var diagonal = d3.svg.diagonal()
                .projection(function(d) {
                    debugger;
                    return [d.x + attrs.nodeWidth / 2, d.y + attrs.nodeHeight / 2];
                });

            var zoomBehaviours = d3.behavior
                .zoom()
                .scaleExtent(attrs.minMaxZoomProportions)
                .on("zoom", redraw);

            var svg = d3.select(attrs.selector)
                .append("svg")
                .attr("width", attrs.width)
                .attr("height", attrs.height)
                .call(zoomBehaviours)
                .append("g")
                .attr("transform", "translate(" + attrs.width / 2 + "," + 20 + ")");

            //necessary so that zoom knows where to zoom and unzoom from
            zoomBehaviours.translate([dynamic.rootNodeLeftMargin, attrs.rootNodeTopMargin]);

            attrs.root.x0 = 0;
            attrs.root.y0 = dynamic.rootNodeLeftMargin;

            if (params.mode != 'department') {
                // adding unique values to each node recursively
                var uniq = 1;
                addPropertyRecursive('uniqueIdentifier', function(v) {

                    return uniq++;
                }, attrs.root);

            }

            expand(attrs.root);
            if (attrs.root.children) {
                attrs.root.children.forEach(collapse);
            }

            update(attrs.root);

            d3.select(attrs.selector).style("height", attrs.height);

            var tooltip = d3.select('body')
                .append('div')
                .attr('class', 'customTooltip-wrapper');

            function update(source, param) {

                // Compute the new tree layout.
                var nodes = tree.nodes(attrs.root)
                    .reverse(),
                    links = tree.links(nodes);

                // Normalize for fixed-depth.
                nodes.forEach(function(d) {
                    d.y = d.depth * attrs.linkLineSize;
                });

                // Update the nodes…
                var node = svg.selectAll("g.node")
                    .data(nodes, function(d) {
                        return d.id || (d.id = ++attrs.index);
                    });

                // Enter any new nodes at the parent's previous position.
                var nodeEnter = node.enter()
                    .append("g")
                    .attr("class", "node")
                    .attr("transform", function(d) {
                        return "translate(" + source.x0 + "," + source.y0 + ")";
                    })

                var nodeGroup = nodeEnter.append("g")
                    .attr("class", "node-group")


                nodeGroup.append("rect")
                    .attr("width", attrs.nodeWidth)
                    .attr("height", attrs.nodeHeight)
                    .attr("data-node-group-id", function(d) {
                        return d.uniqueIdentifier;
                    })
                    .attr("class", function(d) {
                        var res = "";
                        if (d.isLoggedUser) res += 'nodeRepresentsCurrentUser ';
                        res += d._children || d.children ? "nodeHasChildren" : "nodeDoesNotHaveChildren";
                        return res;
                    });

                var collapsiblesWrapper =
                    nodeEnter.append('g')
                    .attr('data-id', function(v) {
                        return v.uniqueIdentifier;
                    });

                var collapsibleRects = collapsiblesWrapper.append("rect")
                    .attr('class', 'node-collapse-right-rect')
                    .attr('height', attrs.collapseCircleRadius)
                    .attr('fill', 'black')
                    .attr('x', attrs.nodeWidth - attrs.collapseCircleRadius)
                    .attr('y', attrs.nodeHeight - 7)
                    .attr("width", function(d) {
                        if (d.children || d._children) return attrs.collapseCircleRadius;
                        return 0;
                    })

                var collapsibles =
                    collapsiblesWrapper.append("circle")
                    .attr('class', 'node-collapse')
                    .attr('cx', attrs.nodeWidth - attrs.collapseCircleRadius)
                    .attr('cy', attrs.nodeHeight - 7)
                    .attr("", setCollapsibleSymbolProperty);

                //hide collapse rect when node does not have children
                collapsibles.attr("r", function(d) {
                        if (d.children || d._children) return attrs.collapseCircleRadius;
                        return 0;
                    })
                    .attr("height", attrs.collapseCircleRadius)

                collapsiblesWrapper.append("text")
                    .attr('class', 'text-collapse')
                    .attr("x", attrs.nodeWidth - attrs.collapseCircleRadius)
                    .attr('y', attrs.nodeHeight - 3)
                    .attr('width', attrs.collapseCircleRadius)
                    .attr('height', attrs.collapseCircleRadius)
                    .style('font-size', attrs.collapsibleFontSize)
                    .attr("text-anchor", "middle")
                    .style('font-family', 'FontAwesome')
                    .text(function(d) {
                        return d.collapseText;
                    })

                collapsiblesWrapper.on("click", click);

                nodeGroup.append("text")
                    .attr("x", dynamic.nodeTextLeftMargin)
                    .attr("y", attrs.nodePadding + 10)
                    .attr('class', 'emp-name')
                    .attr("text-anchor", "left")
                    .text(function(d) {
                        return d.name.trim();
                    })
                    .call(wrap, attrs.nodeWidth);

                nodeGroup.append("text")
                    .attr("x", dynamic.nodeTextLeftMargin)
                    .attr("y", dynamic.nodePositionNameTopMargin)
                    .attr('class', 'emp-position-name')
                    .attr("dy", ".35em")
                    .attr("text-anchor", "left")
                    .text(function(d) {
                        var position = d.positionName.substring(0, 27);
                        if (position.length < d.positionName.length) {
                            position = position.substring(0, 24) + '...'
                        }
                        return position;
                    })

                nodeGroup.append("text")
                    .attr("x", dynamic.nodeTextLeftMargin)
                    .attr("y", attrs.nodePadding + 10 + dynamic.nodeImageHeight / 4 * 2)
                    .attr('class', 'emp-area')
                    .attr("dy", ".35em")
                    .attr("text-anchor", "left")

                .text(function(d) {
                    return d.area;
                })

                nodeGroup.append("text")
                    .attr("x", dynamic.nodeTextLeftMargin)
                    .attr("y", dynamic.nodeChildCountTopMargin)
                    .attr('class', 'emp-count-icon')
                    .attr("text-anchor", "left")
                    .style('font-family', 'FontAwesome')
                    .text(function(d) {
                        if (d.children || d._children) return attrs.userIcon;
                    });

                nodeGroup.append("text")
                    .attr("x", dynamic.nodeTextLeftMargin + 13)
                    .attr("y", dynamic.nodeChildCountTopMargin)
                    .attr('class', 'emp-count')
                    .attr("text-anchor", "left")

                .text(function(d) {
                    if (d.children) return d.children.length;
                    if (d._children) return d._children.length;
                    return;
                })

                nodeGroup.append("defs").append("svg:clipPath")
                    .attr("id", "clip")
                    .append("svg:rect")
                    .attr("id", "clip-rect")
                    .attr("rx", 3)
                    .attr('x', attrs.nodePadding)
                    .attr('y', 2 + attrs.nodePadding)
                    .attr('width', dynamic.nodeImageWidth)
                    .attr('fill', 'none')
                    .attr('height', dynamic.nodeImageHeight - 4)

                nodeGroup.append("svg:image")
                    .attr('y', 2 + attrs.nodePadding)
                    .attr('x', attrs.nodePadding)
                    .attr('preserveAspectRatio', 'none')
                    .attr('width', dynamic.nodeImageWidth)
                    .attr('height', dynamic.nodeImageHeight - 4)
                    .attr('clip-path', "url(#clip)")
                    .attr("xlink:href", function(v) {
                        return v.imageUrl;
                    })

                // Transition nodes to their new position.
                var nodeUpdate = node.transition()
                    .duration(attrs.duration)
                    .attr("transform", function(d) {
                        return "translate(" + d.x + "," + d.y + ")";
                    })

                //todo replace with attrs object
                nodeUpdate.select("rect")
                    .attr("width", attrs.nodeWidth)
                    .attr("height", attrs.nodeHeight)
                    .attr('rx', 3)
                    .attr("stroke", function(d) {
                        if (param && d.uniqueIdentifier == param.locate) {
                            return '#a1ceed'
                        }
                        return attrs.nodeStroke;
                    })
                    .attr('stroke-width', function(d) {
                        if (param && d.uniqueIdentifier == param.locate) {
                            return 6;
                        }
                        return attrs.nodeStrokeWidth
                    })

                // Transition exiting nodes to the parent's new position.
                var nodeExit = node.exit().transition()
                    .duration(attrs.duration)
                    .attr("transform", function(d) {
                        return "translate(" + source.x + "," + source.y + ")";
                    })
                    .remove();

                nodeExit.select("rect")
                    .attr("width", attrs.nodeWidth)
                    .attr("height", attrs.nodeHeight)

                // Update the links…
                var link = svg.selectAll("path.link")
                    .data(links, function(d) {
                        return d.target.id;
                    });

                // Enter any new links at the parent's previous position.
                link.enter().insert("path", "g")
                    .attr("class", "link")
                    .attr("x", attrs.nodeWidth / 2)
                    .attr("y", attrs.nodeHeight / 2)
                    .attr("d", function(d) {
                        var o = {
                            x: source.x0,
                            y: source.y0
                        };
                        return diagonal({
                            source: o,
                            target: o
                        });
                    });

                // Transition links to their new position.
                link.transition()
                    .duration(attrs.duration)
                    .attr("d", diagonal);

                // Transition exiting nodes to the parent's new position.
                link.exit().transition()
                    .duration(attrs.duration)
                    .attr("d", function(d) {
                        var o = {
                            x: source.x,
                            y: source.y
                        };
                        return diagonal({
                            source: o,
                            target: o
                        });
                    })
                    .remove();

                // Stash the old positions for transition.
                nodes.forEach(function(d) {
                    d.x0 = d.x;
                    d.y0 = d.y;
                });

                if (param && param.locate) {
                    var x;
                    var y;

                    nodes.forEach(function(d) {
                        if (d.uniqueIdentifier == param.locate) {
                            x = d.x;
                            y = d.y;
                        }
                    });







                    // normalize for width/height
                    var new_x = (-x + (window.innerWidth / 2));
                    var new_y = (-y + (window.innerHeight / 2));

                    // move the main container g
                    svg.attr("transform", "translate(" + new_x + "," + new_y + ")")
                    zoomBehaviours.translate([new_x, new_y]);
                    zoomBehaviours.scale(1);
                }

                if (param && param.centerMySelf) {
                    var x;
                    var y;

                    nodes.forEach(function(d) {
                        if (d.isLoggedUser) {
                            x = d.x;
                            y = d.y;
                        }

                    });

                    // normalize for width/height
                    var new_x = (-x + (window.innerWidth / 2));
                    var new_y = (-y + (window.innerHeight / 2));

                    // move the main container g
                    svg.attr("transform", "translate(" + new_x + "," + new_y + ")")
                    zoomBehaviours.translate([new_x, new_y]);
                    zoomBehaviours.scale(1);
                }

                /*################  TOOLTIP  #############################*/

                function getTagsFromCommaSeparatedStrings(tags) {
                    return tags.split(',').map(function(v) {
                        return '<li><div class="tag">' + v + '</div></li>  '
                    }).join('');
                }

                function tooltipContent(item) {

                    var strVar = "";

                    strVar += "  <div class=\"customTooltip\">";
                    strVar += "    <!--";
                    strVar += "    <div class=\"tooltip-image-wrapper\"> <img width=\"300\" src=\"https:\/\/raw.githubusercontent.com\/bumbeishvili\/Assets\/master\/Projects\/D3\/Organization%20Chart\/cto.jpg\"> <\/div>";
                    strVar += "-->";
                    strVar += "    <div class=\"profile-image-wrapper\" style='background-image: url(" + item.imageUrl + ")'>";
                    strVar += "    <\/div>";
                    strVar += "    <div class=\"tooltip-hr\"><\/div>";
                    strVar += "    <div class=\"tooltip-desc\">";
                    strVar += "      <a class=\"name\" href='" + item.profileUrl + "' target=\"_blank\"> " + item.name + "<\/a>";
                    strVar += "      <p class=\"position\">" + item.positionName + " <\/p>";
                    strVar += "      <p class=\"area\">" + item.area + " <\/p>";
                    strVar += "";
                    strVar += "      <p class=\"office\">" + item.office + "<\/p>";
                    strVar += "     <button class='" + (item.unit.type == 'business' ? " disabled " : "") + " btn btn-tooltip-department' onclick='params.funcs.departmentClick(" + JSON.stringify(item.unit) + ")'>" + item.unit.value + "</button>";
                    strVar += "      <h4 class=\"tags-wrapper\">             <span class=\"title\"><i class=\"fa fa-tags\" aria-hidden=\"true\"><\/i>";
                    strVar += "        ";
                    strVar += "        <\/span>           <ul class=\"tags\">" + getTagsFromCommaSeparatedStrings(item.tags) + "<\/ul>         <\/h4> <\/div>";
                    strVar += "    <div class=\"bottom-tooltip-hr\"><\/div>";
                    strVar += "  <\/div>";
                    strVar += "";

                    return strVar;

                }

                function tooltipHoverHandler(d) {

                    var content = tooltipContent(d);
                    tooltip.html(content);

                    tooltip.transition()
                        .duration(200).style("opacity", "1").style('display', 'block');
                    d3.select(this).attr('cursor', 'pointer').attr("stroke-width", 50);

                    var y = d3.event.pageY;
                    var x = d3.event.pageX;

                    //restrict tooltip to fit in borders
                    if (y < 220) {
                        y += 220 - y;
                        x += 130;
                    }

                    if (y > attrs.height - 300) {
                        y -= 300 - (attrs.height - y);
                    }

                    tooltip.style('top', (y - 300) + 'px')
                        .style('left', (x - 470) + 'px');
                }

                function tooltipOutHandler() {
                    tooltip.transition()
                        .duration(200)
                        .style('opacity', '0').style('display', 'none');
                    d3.select(this).attr("stroke-width", 5);

                }

                nodeGroup.on('click', tooltipHoverHandler);

                nodeGroup.on('dblclick', tooltipOutHandler);

                function equalToEventTarget() {
                    return this == d3.event.target;
                }

                d3.select("body").on("click", function() {
                    var outside = tooltip.filter(equalToEventTarget).empty();
                    if (outside) {
                        tooltip.style('opacity', '0').style('display', 'none');
                    }
                });

            }

            // Toggle children on click.
            function click(d) {

                d3.select(this).select("text").text(function(dv) {

                    if (dv.collapseText == attrs.EXPAND_SYMBOL) {
                        dv.collapseText = attrs.COLLAPSE_SYMBOL
                    } else {
                        if (dv.children) {
                            dv.collapseText = attrs.EXPAND_SYMBOL
                        }
                    }
                    return dv.collapseText;

                })

                if (d.children) {
                    d._children = d.children;
                    d.children = null;
                } else {
                    d.children = d._children;
                    d._children = null;
                }
                update(d);

            }

            //########################################################

            //Redraw for zoom
            function redraw() {
                //console.log("here", d3.event.translate, d3.event.scale);
                svg.attr("transform",
                    "translate(" + d3.event.translate + ")" +
                    " scale(" + d3.event.scale + ")");
            }

            // #############################   Function Area #######################
            function wrap(text, width) {

                text.each(function() {
                    var text = d3.select(this),
                        words = text.text().split(/\s+/).reverse(),
                        word,
                        line = [],
                        lineNumber = 0,
                        lineHeight = 1.1, // ems
                        x = text.attr("x"),
                        y = text.attr("y"),
                        dy = 0, //parseFloat(text.attr("dy")),
                        tspan = text.text(null)
                        .append("tspan")
                        .attr("x", x)
                        .attr("y", y)
                        .attr("dy", dy + "em");
                    while (word = words.pop()) {
                        line.push(word);
                        tspan.text(line.join(" "));
                        if (tspan.node().getComputedTextLength() > width) {
                            line.pop();
                            tspan.text(line.join(" "));
                            line = [word];
                            tspan = text.append("tspan")
                                .attr("x", x)
                                .attr("y", y)
                                .attr("dy", ++lineNumber * lineHeight + dy + "em")
                                .text(word);
                        }
                    }
                });
            }

            function addPropertyRecursive(propertyName, propertyValueFunction, element) {
                if (element[propertyName]) {
                    element[propertyName] = element[propertyName] + ' ' + propertyValueFunction(element);
                } else {
                    element[propertyName] = propertyValueFunction(element);
                }
                if (element.children) {
                    element.children.forEach(function(v) {
                        addPropertyRecursive(propertyName, propertyValueFunction, v)
                    })
                }
                if (element._children) {
                    element._children.forEach(function(v) {
                        addPropertyRecursive(propertyName, propertyValueFunction, v)
                    })
                }
            }

            function departmentClick(item) {
                hide(['.customTooltip-wrapper']);

                if (item.type == 'department' && params.mode != 'department') {
                    //find third level department head user
                    var found = false;
                    var secondLevelChildren = params.pristinaData.children;
                    parentLoop:
                        for (var i = 0; i < secondLevelChildren.length; i++) {
                            var secondLevelChild = secondLevelChildren[i];
                            var thirdLevelChildren = secondLevelChild.children ? secondLevelChild.children : secondLevelChild._children;

                            for (var j = 0; j < thirdLevelChildren.length; j++) {
                                var thirdLevelChild = thirdLevelChildren[j];
                                if (thirdLevelChild.unit.value.trim() == item.value.trim()) {
                                    clear(params.selector);

                                    hide(['.btn-action']);
                                    show(['.btn-action.btn-back', '.btn-action.btn-fullscreen', '.department-information']);
                                    set('.dept-name', item.value);

                                    set('.dept-emp-count', "Employees Quantity - " + getEmployeesCount(thirdLevelChild));
                                    set('.dept-description', thirdLevelChild.unit.desc);

                                    params.oldData = params.data;

                                    params.data = deepClone(thirdLevelChild);
                                    found = true;
                                    break parentLoop;
                                }
                            }
                        }
                    if (found) {
                        params.mode = "department";
                        params.funcs.closeSearchBox();
                        drawOrganizationChart(params);

                    }

                }
            }

            function getEmployeesCount(node) {
                var count = 1;
                countChilds(node);
                return count;

                function countChilds(node) {
                    var childs = node.children ? node.children : node._children;
                    if (childs) {
                        childs.forEach(function(v) {
                            count++;
                            countChilds(v);
                        })
                    }
                }
            }

            function reflectResults(results) {
                var htmlStringArray = results.map(function(result) {
                    var strVar = "";
                    strVar += "         <div class=\"list-item\">";
                    strVar += "          <a >";
                    strVar += "            <div class=\"image-wrapper\">";
                    strVar += "              <img class=\"image\" src=\"" + result.imageUrl + "\"\/>";
                    strVar += "            <\/div>";
                    strVar += "            <div class=\"description\">";
                    strVar += "              <p class=\"name\">" + result.name + "<\/p>";
                    strVar += "               <p class=\"position-name\">" + result.positionName + "<\/p>";
                    strVar += "               <p class=\"area\">" + result.area + "<\/p>";
                    strVar += "            <\/div>";
                    strVar += "            <div class=\"buttons\">";
                    strVar += "              <a target='_blank' href='" + result.profileUrl + "'><button class='btn-search-box btn-action'>View Profile<\/button><\/a>";
                    strVar += "              <button class='btn-search-box btn-action btn-locate' onclick='params.funcs.locate(" + result.uniqueIdentifier + ")'>Locate <\/button>";
                    strVar += "            <\/div>";
                    strVar += "          <\/a>";
                    strVar += "        <\/div>";

                    return strVar;

                })

                var htmlString = htmlStringArray.join('');
                params.funcs.clearResult();

                var parentElement = get('.result-list');
                var old = parentElement.innerHTML;
                var newElement = htmlString + old;
                parentElement.innerHTML = newElement;
                set('.user-search-box .result-header', "RESULT - " + htmlStringArray.length);

            }

            function clearResult() {
                set('.result-list', '<div class="buffer" ></div>');
                set('.user-search-box .result-header', "RESULT");

            }

            function listen() {
                var input = get('.user-search-box .search-input');

                input.addEventListener('input', function() {
                    var value = input.value ? input.value.trim() : '';
                    if (value.length < 3) {
                        params.funcs.clearResult();
                    } else {
                        var searchResult = params.funcs.findInTree(params.data, value);
                        params.funcs.reflectResults(searchResult);
                    }

                });
            }

            function searchUsers() {

                d3.selectAll('.user-search-box')
                    .transition()
                    .duration(250)
                    .style('width', '350px')
            }

            function closeSearchBox() {
                d3.selectAll('.user-search-box')
                    .transition()
                    .duration(250)
                    .style('width', '0px')
                    .each("end", function() {
                        params.funcs.clearResult();
                        clear('.search-input');
                    });

            }

            function findInTree(rootElement, searchText) {
                var result = [];
                // use regex to achieve case insensitive search and avoid string creation using toLowerCase method
                var regexSearchWord = new RegExp(searchText, "i");

                recursivelyFindIn(rootElement, searchText);

                return result;

                function recursivelyFindIn(user) {
                    if (user.name.match(regexSearchWord) ||
                        user.tags.match(regexSearchWord)) {
                        result.push(user)
                    }

                    var childUsers = user.children ? user.children : user._children;
                    if (childUsers) {
                        childUsers.forEach(function(childUser) {
                            recursivelyFindIn(childUser, searchText)
                        })
                    }
                };
            }

            function back() {

                show(['.btn-action']);
                hide(['.customTooltip-wrapper', '.btn-action.btn-back', '.department-information'])
                clear(params.selector);

                params.mode = "full";
                params.data = deepClone(params.pristinaData)
                drawOrganizationChart(params);

            }

            function expandAll() {
                expand(root);
                update(root);
            }

            function expand(d) {
                if (d.children) {
                    d.children.forEach(expand);
                }

                if (d._children) {
                    d.children = d._children;
                    d.children.forEach(expand);
                    d._children = null;
                }

                if (d.children) {
                    // if node has children and it's expanded, then  display -
                    setToggleSymbol(d, attrs.COLLAPSE_SYMBOL);
                }
            }

            function collapse(d) {
                if (d._children) {
                    d._children.forEach(collapse);
                }
                if (d.children) {
                    d._children = d.children;
                    d._children.forEach(collapse);
                    d.children = null;
                }

                if (d._children) {
                    // if node has children and it's collapsed, then  display +
                    setToggleSymbol(d, attrs.EXPAND_SYMBOL);
                }
            }

            function setCollapsibleSymbolProperty(d) {
                if (d._children) {
                    d.collapseText = attrs.EXPAND_SYMBOL;
                } else if (d.children) {
                    d.collapseText = attrs.COLLAPSE_SYMBOL;
                }
            }

            function setToggleSymbol(d, symbol) {
                d.collapseText = symbol;
                d3.select("*[data-id='" + d.uniqueIdentifier + "']").select('text').text(symbol);
            }

            /* recursively find logged user in subtree */
            function findmySelf(d) {
                if (d.isLoggedUser) {
                    expandParents(d);
                } else if (d._children) {
                    d._children.forEach(function(ch) {
                        ch.parent = d;
                        findmySelf(ch);
                    })
                } else if (d.children) {
                    d.children.forEach(function(ch) {
                        ch.parent = d;
                        findmySelf(ch);
                    });
                };

            }

            function locateRecursive(d, id) {
                if (d.uniqueIdentifier == id) {
                    expandParents(d);
                } else if (d._children) {
                    d._children.forEach(function(ch) {
                        ch.parent = d;
                        locateRecursive(ch, id);
                    })
                } else if (d.children) {
                    d.children.forEach(function(ch) {
                        ch.parent = d;
                        locateRecursive(ch, id);
                    });
                };

            }

            /* expand current nodes collapsed parents */
            function expandParents(d) {
                while (d.parent) {
                    d = d.parent;
                    if (!d.children) {
                        d.children = d._children;
                        d._children = null;
                        setToggleSymbol(d, attrs.COLLAPSE_SYMBOL);
                    }

                }
            }

            function toggleFullScreen() {

                if ((document.fullScreenElement && document.fullScreenElement !== null) ||
                    (!document.mozFullScreen && !document.webkitIsFullScreen)) {
                    if (document.documentElement.requestFullScreen) {
                        document.documentElement.requestFullScreen();
                    } else if (document.documentElement.mozRequestFullScreen) {
                        document.documentElement.mozRequestFullScreen();
                    } else if (document.documentElement.webkitRequestFullScreen) {
                        document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
                    }
                    d3.select(params.selector + ' svg').attr('width', screen.width).attr('height', screen.height);
                } else {
                    if (document.cancelFullScreen) {
                        document.cancelFullScreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitCancelFullScreen) {
                        document.webkitCancelFullScreen();
                    }
                    d3.select(params.selector + ' svg').attr('width', params.chartWidth).attr('height', params.chartHeight);
                }

            }



            function showMySelf() {
                /* collapse all and expand logged user nodes */
                if (!attrs.root.children) {
                    if (!attrs.root.isLoggedUser) {
                        attrs.root.children = attrs.root._children;
                    }
                }
                if (attrs.root.children) {
                    attrs.root.children.forEach(collapse);
                    attrs.root.children.forEach(findmySelf);
                }

                update(attrs.root, {
                    centerMySelf: true
                });
            }

            //locateRecursive
            function locate(id) {
                /* collapse all and expand logged user nodes */
                if (!attrs.root.children) {
                    if (!attrs.root.uniqueIdentifier == id) {
                        attrs.root.children = attrs.root._children;
                    }
                }
                if (attrs.root.children) {
                    attrs.root.children.forEach(collapse);
                    attrs.root.children.forEach(function(ch) {
                        locateRecursive(ch, id)
                    });
                }

                update(attrs.root, {
                    locate: id
                });
            }

            function deepClone(item) {
                return JSON.parse(JSON.stringify(item));
            }

            function show(selectors) {
                display(selectors, 'initial')
            }

            function hide(selectors) {
                display(selectors, 'none')
            }

            function display(selectors, displayProp) {
                selectors.forEach(function(selector) {
                    var elements = getAll(selector);
                    elements.forEach(function(element) {
                        element.style.display = displayProp;
                    })
                });
            }

            function set(selector, value) {
                var elements = getAll(selector);
                elements.forEach(function(element) {
                    element.innerHTML = value;
                    element.value = value;
                })
            }

            function clear(selector) {
                set(selector, '');
            }

            function get(selector) {
                return document.querySelector(selector);
            }

            function getAll(selector) {
                return document.querySelectorAll(selector);
            }


        }
    </script>






</body>

</html>