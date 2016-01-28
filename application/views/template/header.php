

    <!-- Logo -->
    <a style="background-color: #03A9F4;"  href="<?php echo base_url()?>index.php/main_panel" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span style="background-color: #03A9F4;" class="logo-mini"><b>S</b>PC</span>
      <!-- logo for regular state and mobile devices -->
      <span style="background-color: #03A9F4;" class="logo-lg"><b>S.AUDITOR</b></span>
    </a>

    <!-- Header Navbar -->
    <nav style="background-color: #03A9F4;" class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a style="background-color: #03A9F4;" href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          
          <!-- Tasks Menu -->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url();?>dashboard/lte/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('em_name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header" style="background-color: #03A9F4;">
                  <img src="<?php echo base_url();?>dashboard/lte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                     ตำแหน่ง <?php echo $this->session->userdata('em_role');?>
                  <small>เริ่มทำงาน <?php echo $this->session->userdata('em_start');?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="<?php echo base_url();?>index.php/main_data/profile" class="btn btn-default btn-flat">โปรไฟล์</a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo base_url()?>index.php/login/sigout" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li> 
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
