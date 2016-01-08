<!DOCTYPE html>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ระบบรายงานความคืบหน้างาน</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">
                <?php include_once 'template/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <?php include_once 'template/side_bar.php'; ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        รายงาน
                        <small>แสดงข้อมูลรายงานพนักงาน </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> รายงาน</a></li>
                        <!--<li class="active">Here</li> -->
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Your Page Content Here -->
                    <!-- TAB --->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">รายงานตามพนักงาน</a></li>
                        </ul>
                        <div class="tab-content">
                           <!--Tab2-->  <!--รายงานตามพนักงาน-->
                            <div class="tab-pane active" id="tab_1">
                                <!--Conten Tab1-->
                                <section class="content">
                                    <!--ส่วนค้นหาตามพนักงาน-->
                                    <form name="formEmployee" action="" method="POST">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <select name="selName" class="form-control input-sm">
                                                    <option value="" disabled="" selected="">พนักงาน</option>
                                                 <?php
                                                  $selEmployee = "SELECT em_name, em_id, em_status FROM employee";
                                                  $queryEmployee = $conn->query($selEmployee);
                                                  while($arrEmployee = $queryEmployee->fetch_array())
                                                  { 
                                                      if($arrEmployee['em_status'] == "ลาออก")
                                                      { ?>
                                                    
                                                    <option style="color: blueviolet;" value="<?php echo $arrEmployee['em_id'] ?>"><?php echo $arrEmployee['em_name']; ?></option>
                                             <?php    }else{
                                                 ?>
                                                         <option value="<?php echo $arrEmployee['em_id'] ?>"><?php echo $arrEmployee['em_name']; ?></option>
                                             <?php    }
                                         
                                                   }
                                                 ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-sm-2">
                                                <select class="form-control input-sm" name="selProjectStatus">
                                                    <option value="" disabled="" selected="">สถานะโครงการ</option>
                                                    <option value="เปิดโครงการ">กำลังดำเนินการ</option>
                                                    <option value="ปิดโครงการ">ปิดโครงการ</option>
                                                    <option value="ทั้งหมด">ทั้งหมด</option>

                                                </select>
                                            </div>
                                            <div class="col-sm-2">
                                                <select class="form-control input-sm" name="selYear">
                                                    <option value="" disabled="" selected="">ปี</option>
                                                    <?php
                                                    for ($year = 2555; $year <= 2600; $year++) {
                                                        ?>
                                                        <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>  
                                            <div class="col-sm-2">
                                                <button title="ค้นหา" name="btnSubmitEmployee" type="submit"  class="btn btn-sm btn-default"><span class="fa fa-search"></span></button>
                                            </div>


                                        </div>
                                    </form>
                                    <br>
                                    
                                    
                                    
                            <?php 
                                if(isset($_POST['btnSubmitEmployee']) && ($_POST['selName'] != "" || $_POST['selProjectStatus'] != "" || $_POST['selYear'] != "")  )
                                {
                              ?>        
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="table-responsive">
                                                <table id="example3" class="table table-bordered table-striped">
                                                    <thead>

                                                        <tr>
                                                            <th colspan="2"><center>ข้อมูล</center></th>
                                                    <th colspan="3"><center>เวลา</center></th>
                                                    <th colspan="3"><center>รายการบันทึก</center></th>
                                                    </tr> 

                                                    <tr>
                                                        <th>รหัสงานบริษัท</th>
                                                        <th>ชื่อบริษัท</th>
                                                        <th>ใช้ไป</th>
                                                        <th>เวลาตั้งต้น</th>
                                                        <th>คงเหลือ</th>
                                                        <th>วันนี้</th>
                                                        <th>รวม</th>
                                                        <th>โน้ต</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                   <?php
                                        $sqlSelCustomer = "SELECT project.project_id AS pro_id, project_number, customer_name, SUM(daily_use_time) AS sum_use_time, SUM(daily_rec_insert) AS sum_rec  FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id";
                                        /*ควบคุมการค้นหา*/
                                        if($_POST['selName'] != ""){
                                            $sqlSelCustomer = $sqlSelCustomer." AND employee.em_id = '$_POST[selName]'";
                                        }
                                        if($_POST['selProjectStatus'] != ""){
                                            
                                            /*สถานะทั้งหมด*/
                                            if($_POST['selProjectStatus'] == "ทั้งหมด"){
                                                $sqlSelCustomer = $sqlSelCustomer;
                                            }else{
                                                $sqlSelCustomer = $sqlSelCustomer." AND project.project_status = '$_POST[selProjectStatus]'";
                                            }
                                        }
                                        if($_POST['selYear'] != ""){
                                            $sqlSelCustomer = $sqlSelCustomer." AND project.project_year = '$_POST[selYear]'";
                                        }
                                        /*ต่อท้ายด้วย GROUP BY*/
                                      echo   $sqlSelCustomer = $sqlSelCustomer." GROUP BY(project.project_id)";
                                        
                                        $querySelCustomer  = $conn->query($sqlSelCustomer);
                                        while($arrSelCustomer = $querySelCustomer->fetch_array())
                                        {
                                            /*หาเวลาตั้งต้น*/
                                            $sqlSelTimeProect = "SELECT SUM(team_hour) AS team_hour FROM `team`JOIN project ON team.project_id = project.project_id";
                                            
                                            if($_POST['selName'] != ""){
                                                $sqlSelTimeProect = $sqlSelTimeProect." AND em_id = '$_POST[selName]'";
                                            }
                                            
                                            if($_POST['selProjectStatus'] != ""){
                                                /*สถานะทั้งหมด*/
                                                if($_POST['selProjectStatus'] == "ทั้งหมด"){
                                                    $sqlSelTimeProect = $sqlSelTimeProect;
                                                }else{
                                                    $sqlSelTimeProect = $sqlSelTimeProect." AND project_status = '$_POST[selProjectStatus]'";
                                                }
                                            }
                                            
                                            if($_POST['selYear'] != ""){
                                                $sqlSelTimeProect = $sqlSelTimeProect." AND project_year = '$_POST[selYear]'";
                                            }
                                            echo "<br>";
                                            echo $sqlSelTimeProect = $sqlSelTimeProect." AND team.project_id = '$arrSelCustomer[pro_id]'" ;
                                            $querySelTimeProect = $conn->query($sqlSelTimeProect);
                                            $fetchSelTimeProect = $querySelTimeProect->fetch_assoc();
                                            
                                            /*รายการบันทึกวันนี้*/  
                                            $sqlToday = "SELECT * FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id AND daily.project_id = '$arrSelCustomer[pro_id]' AND daily_dat = '$_SESSION[date]'";
                                            
                                            if($_POST['selName'] != ""){
                                                $sqlToday = $sqlToday." AND daily.em_id = '$_POST[selName]'";
                                            }
                                            
                                            if($_POST['selProjectStatus'] != ""){
                                                if($_POST['selProjectStatus'] == "ทั้งหมด"){
                                                  $sqlToday = $sqlToday;
                                                }else{
                                                    $sqlToday = $sqlToday." AND project_status = '$_POST[selProjectStatus]'";
                                                }
                                             }
                                             
                                             if($_POST['selYear'] != ""){
                                                 $sqlToday = $sqlToday." AND project_year = '$_POST[selYear]'";
                                             }
                                            echo "<br>";
                                            echo $sqlToday;
                                            $queryToday = $conn->query($sqlToday);
                                            $fetchToday = $queryToday->fetch_assoc();
                                            ?>                     
                                                        <tr>
                                                            <!--รหัสงานบริษัท-->
                                                            <td><?php echo $arrSelCustomer['project_number']; ?></td>
                                                            
                                                            <!--ชื่อบริษัท-->
                                                            <td><?php echo $arrSelCustomer['customer_name']; ?></td>
                                                           
                                                            <!--เวลาใช้ไป-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($arrSelCustomer['sum_use_time']);?></div>
                                                            </td>
                                                            
                                                            <!--เวลาตั้งต้น-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($fetchSelTimeProect['team_hour']);?></div>
                                                            </td>
                                                            <!--คงเหลือ-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($fetchSelTimeProect['team_hour'] - $arrSelCustomer['sum_use_time']);?></div>
                                                            </td>
                                                            
                                                            <!--วันนี้-->
                                                            <td><div style="float: right"><?php echo number_format($fetchToday['daily_rec_insert']) ; ?></div></td>
                                                            
                                                            <!--รวม-->
                                                            <td>
                                                                 <div style="float: right"><?php echo number_format($arrSelCustomer['sum_rec']);?></div>
                                                            </td>
                                                            
                                                            <!--โน้ต-->
                                                            <td>
                                                                <a title="เพิ่มเติม" href="#" class="btn btn-xs btn-default"><span class="fa fa-bars"></span></a>
                                                                 <?php 
                                                                    if($fetchToday['daily_note'] != "")
                                                                    {  
                                                                ?>
                                                                     <button title="ข้อความวันนี้" data-toggle="modal" data-target="#pnlMsn<?php echo $fetchToday['daily_id'] ?>" class="btn btn-xs btn-default"><span class="fa fa-envelope"></button>   
                                                                     
                                                                     <!--Modal ข้อความ-->
                                                                          <div class="modal fade" tabindex="-1" role="dialog" id="pnlMsn<?php echo $fetchToday['daily_id'] ?>">
                                                                            <div class="modal-dialog">
                                                                              <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                  <h4 class="modal-title">ข้อความ</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                  <a><?php echo $fetchToday['daily_note']; ?></a>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                                                  
                                                                                </div>
                                                                              </div><!-- /.modal-content -->
                                                                            </div><!-- /.modal-dialog -->
                                                                          </div>
                                                                     <!--.Modal ข้อความ-->
                                                               <?php }?>
                                                            </td>
                                                        </tr>
                               <?php } //.whileหลัก?>
                                                    </tbody>

                                                </table>
                                            </div> 
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                              
                                        
                                        
                           <?php
                                }else{  
                                    include_once 'template/table_employee.php';
                                } 
                              ?>
                                </section>

                                <!--.Conten Tab1-->
                            </div>
                            <!--/.Tab2--->

                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- .TAB --->


                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php include_once 'template/footer.php'; ?>
            <!-- .Main Footer -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript::;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="label label-danger pull-right">70%</span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
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

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="../dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="../dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->

        <!-- DataTables -->
        <script src="../dashboard/lte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../dashboard/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../dashboard/lte/plugins/fastclick/fastclick.js"></script>

        <!--Data 1  -->
        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
            // Data 2 
            $(function () {
                $("#example3").DataTable();
                $('#example4').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>

    </body>
</html>
