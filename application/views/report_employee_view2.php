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
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/datatables/dataTables.bootstrap.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/dist/css/skins/skin-blue.min.css">

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
                <?php include_once '/template/header.php'; ?>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <?php include_once '/template/side_bar.php'; ?>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        รายงาน
                        <small>แสดงข้อมูลรายงานพนักงาน</small>
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
                            <!--รายงานตามบริษัท-->


                            <!--Tab2-->  <!--รายงานตามพนักงาน-->
                            <div class="tab-pane active" id="tab_1">
                                <!--Conten Tab1-->
                                <section class="content">
                                    <!--ส่วนค้นหาตามพนักงาน-->
                                 
                                    <?php echo form_open('report/employee');?>
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <select required="" name="txtEmName"  class="form-control input-sm" placeholder="ชื่อพนักงาน" >
                                                   <!-- <option  disabled="">พนักงาน</option> -->
                                                    <?php foreach ($emName as $rowemName): ?>
                                                        <option value="<?php echo $rowemName->em_id; ?>"><?php echo $rowemName->em_name; ?></option>
                                                    <?php endforeach; ?>
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
                                 <!--   </form> -->
                                 <?php echo form_close();?>
                                    <br>
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
                                                     <!--   <th>พนักงาน</th> -->
                                                        <th>รหัสงานบริษัท</th>
                                                        <th>ชื่อบริษัท</th>
                                                        <th>ใช้ไป</th>
                                                        <th>เวลาตั้งต้น</th>
                                                        <th>คงเหลือ</th>
                                                        <th>ล่าสุด</th>
                                                        <th>รวม</th>
                                                        <th>โน้ต</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                <?php /*Loop1*/$i =0; foreach ($reportL1 as $rowreportL1):?>
                                                        <tr>
                                                          <!--  <td>ใจเย็นๆ ก่อน</td> -->
                                                            <!--รหัสงานบริษัท-->
                                                            <td><?php echo $rowreportL1['project_number']; ?></td>
                                                            <!--ชื่อบริษัท-->
                                                            <td><?php echo $rowreportL1['customer_name']; ?></td>
                                                            <!--เวลาใช้ไป-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($rowreportL1['sum_use_time']);?></div>
                                                            </td>
                                                            <!--เวลาตั้งต้น-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($reportL2[$i]['team_hour']);?></div>
                                                            </td>
                                                            <!--คงเหลือ-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($reportL2[$i]['team_hour'] - $rowreportL1['sum_use_time']);?></div>
                                                            </td>
                                                            <!--รายการบันทึกล่าสุด-->
                                                            <td>
                                                                <div style="float: right"><?php echo number_format($reportL3[$i]['rec']);?></div>
                                                            </td>
                                                            <!--คีย์เข้าทั้งหมด-->
                                                            <td><div style="float: right"><?php echo number_format($rowreportL1['sum_rec']);?></div></td>
                                                            <!--โน้ต-->
                                                            <td><a target="_blank" href="<?php echo base_url();?>index.php/report/record/<?php echo $emId;?>/<?php echo $rowreportL1['pro_id']; ?>" class="btn btn-xs btn-default"><span class="fa fa-bars"></span></a>
                                                                <?php if(!empty($reportL3[$i]['note'])):?>
                                                                <button data-toggle="modal" data-target="#pnlMsn<?php echo $i;?>" class="btn btn-xs btn-default"><span class="fa fa-envelope"></span></button>
                                                                <!--Modal-->
                                                                    <div id="pnlMsn<?php echo $i;?>" class="modal fade" tabindex="-1" role="dialog">
                                                                        <div class="modal-dialog">
                                                                          <div class="modal-content">
                                                                            <div class="modal-header">
                                                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                              <h4 class="modal-title">ข้อความ...</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <a><?php echo $reportL3[$i]['note']; ?></a>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                                              
                                                                            </div>
                                                                          </div><!-- /.modal-content -->
                                                                        </div><!-- /.modal-dialog -->
                                                                    </div><!-- /.modal -->
                                                                <!--.Modal-->
                                                                <?php endif;?>
                                                            </td>
                                                        </tr>
                                <?php $i++; endforeach;?>
                                                    </tbody>

                                                </table>
                                            </div> 
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
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
            <?php include_once '/template/footer.php'; ?>
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
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>dashboard/lte/dist/js/app.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->

        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/fastclick/fastclick.js"></script>

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
