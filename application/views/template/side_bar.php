<section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>dashboard/lte/dist/img/avatar5.png"/>
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('em_name');?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">เมนูหลัก</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="<?php echo base_url()?>index.php/main_panel"><i class="fa fa-tachometer"></i> <span>ส่วนควบคุมหลัก</span></a></li>
        <?php if($this->session->userdata('em_role')== "ผู้ดูแลระบบ"):?> 
        <li><a href="<?php echo base_url()?>index.php/main_data"><i class="fa fa-database"></i> <span>ข้อมูลหลัก</span></a></li>
        <li><a href="<?php echo base_url()?>index.php/project"><i class="fa fa-group"></i> <span>เปิดงาน</span></a></li>
        <?php endif;?>
        <li><a href="<?php echo base_url()?>index.php/dailywork"><i class="fa fa-tasks"></i> <span>งานประจำวัน</span></a></li>
      <!--  <li><a href="report.php"><i class="fa fa-line-chart"></i> <span>รายงาน</span></a></li>  -->
       
        
        
       <li class="treeview">
          <a href="#"><i class="fa fa-line-chart"></i> <span>รายงาน</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
              <li><a href="<?php echo base_url()?>index.php/report/customer"><i class="fa fa-circle-o"></i>ลูกค้า</a></li>
              <li><a href="<?php echo base_url()?>index.php/report/employee"><i class="fa fa-circle-o"></i>พนักงาน</a></li>
          </ul>
        </li>  
      </ul>  
      <!-- /.sidebar-menu -->
    </section>