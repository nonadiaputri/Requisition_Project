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
          <p><?= $_SESSION['name'];?> </br> <?= $_SESSION['email'];?></p>
          <p></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

        </div>  
      </div>
      <!-- button form -->
      <ul class="user-panel" data-widget="tree" style="margin:auto; padding:10% ">
      <li class="header" >
        <div class="pull-left" >
          <a href="<?= base_url(); ?>dashboard/profile" class="btn btn-info btn-flat" style="color:#ffffff; border-radius:5%"><i class="fa fa-id-card"></i> Profile</a>
        </div>
        <div class="pull-right">
          <a href="<?= base_url(); ?>logout" onclick="return confirm('Are you sure want to Logout ?')" class="btn btn-warning btn-flat" style="color:#ffffff;border-radius:5%"><i class="fa fa-sign-out"></i> Logout</a>
        </div>
      </li>
      </ul>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="menu">
          <a href="<?= base_url(); ?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
          
        </li>
        <!-- <li class="treeview">
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
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i>
            <span>Master</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href='<?php echo site_url('crud/master/personnel')?>'><i class="fa fa-user"></i>Personnel</a></li>
            <li><a href='<?php echo site_url('crud/master/company')?>'><i class="fa fa-institution"></i>Company</a></li>
            <li><a href='<?php echo site_url('crud/master/organization')?>'><i class="fa fa-cubes"></i>Organization</a></li>
            <li><a href='<?php echo site_url('crud/master/costcenter')?>'><i class="fa fa-cc"></i>Cost Center</a></li>
			<li><a href='<?php echo site_url('crud/master/position')?>'><i class="fa fa-suitcase"></i>Position</a></li>		 
			<!-- <li><a href='<?php echo site_url('crud/master/film_management')?>'>Films</a></li>
			<li><a href='<?php echo site_url('crud/master/multigrids')?>'>Multigrid [BETA]</a></li>			 -->
          </ul>
        </li>	
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i>
            <span>HR-Hire</span>
            <span>
            <small class="label bg-red" id = "notif" style="text-align: center">0</small>
            </span>
            <span>
            <small class="label bg-blue" id = "notifapv" style="text-align: center">0</small>
            </span>
            <span class="pull-right-container">
              
            </span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href='<?php echo site_url('hr/request_form')?>'><i class="fa fa-file-text-o"></i>Request Form</a></li>
            <li><a href='<?php echo site_url('hr/hire_history')?>'><i class="fa fa-flag"></i>Hire History</a></li>
            <li><a href='<?php echo site_url('hr/myview_approve')?>'><i class="fa fa-dot-circle-o"></i>Hire Status</a></li>
            <li><a href='<?php echo site_url('hr/add_access')?>'><i class="fa fa-file-text-o"></i>Add Access Requestor</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-arrow-circle-up"></i>
            <span>HR-Movement</span>
            <span>
            <small class="label bg-red" id = "notifmove" style="text-align: center">0</small>
            </span>
            <span>
            <small class="label bg-blue" id = "notifapv1" style="text-align: center">0</small>
            </span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href='<?php echo site_url('hr_movement/index')?>'><i class="fa fa-file-text-o"></i>Request Form</a></li>
            <li><a href='<?php echo site_url('hr_movement/movement_history')?>'><i class="fa fa-flag"></i>Movement History</a></li>
            <li><a href='<?php echo site_url('hr_movement/myview_approve')?>'><i class="fa fa-dot-circle-o"></i>Movement Status</a></li>
            <li><a href='<?php echo site_url('hr_movement/add_access')?>'><i class="fa fa-file-text-o"></i>Add Access Requestor</a></li>
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
            <li><a href='<?php echo base_url('hr/chart_org');?>'><i class="fa fa-users"></i>KGMedia Organization</a></li>
            <!-- <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li> -->
          </ul>
        </li>
        <!-- <li class="treeview">
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
        </li> -->
        <!-- <li class="treeview">
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
        </li> -->
        <!-- <li class="treeview">
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
        </li> -->
        <!-- <li><a href="https://adminlte.io/docs"><i class="fa fa-book"></i> <span>Documentation</span></a></li> -->
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Request Notification</span></a></li>
        <!-- <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Approval Notification</span></a></li> -->
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Approval Notification</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
    
    <!-- sweetalert2 -->
    
   <!--  <script type="text/javascript">
        $(document).ready(function(){
    setInterval(function(){
          $.ajax({
                url:"<?=base_url()?>hr/notif",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    // alert(data.tot);
                    if(data.tot != ''){
          

                      $("#notif").show();
                      $("#notif").html(data.tot);
                    }
                    //$("#total").html(data.tot);
                }
            });
          },200);
  })
    </script> -->

<!-- notifikasi movement -->
<!-- <script type="text/javascript">
        $(document).ready(function(){
    setInterval(function(){
          $.ajax({
                url:"<?=base_url()?>hr_movement/notif",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    // alert(data.tot);
                    if(data.tot != ''){
          

                      $("#notifmove").show();
                      $("#notifmove").html(data.tot);
                    }
                    //$("#total").html(data.tot);
                }
            });
          },200);
  })
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
    setInterval(function(){
          $.ajax({
                url:"<?=base_url()?>hr/notifApproval",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    // alert(data.tot);
                    if(data.tot != ''){

                      $("#notifapv").show();
                      $("#notifapv").html(data.tot);
                    }
                    //$("#total").html(data.tot);
                }
            });

            $.ajax({
                url:"<?=base_url()?>hr_movement/notifApproval",
                type:"POST",
                dataType:"json",//datatype lainnya: html, text
                data:{},
                success:function(data){
                    // alert(data.tot);
                    if(data.tot != ''){

                      $("#notifapv1").show();
                      $("#notifapv1").html(data.tot);
                    }
                    //$("#total").html(data.tot);
                }
            });
          },200);
  })
    </script> -->
    