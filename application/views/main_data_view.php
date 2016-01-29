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
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/font-awesome.min.css"> -->
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 
        <!-- <link rel="stylesheet" href="dist/css/ionicons.min.css"> -->
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/AdminLTE.min.css'); ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/skins/skin-blue.min.css'); ?>">

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
                        ข้อมูลหลัก
                        <small>แสดงข้อมูลลูกค้าและพนักงาน</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> ข้อมูลหลัก</a></li>
                        <!--<li class="active">Here</li> -->
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Your Page Content Here -->
                    <!-- TAB --->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลลูกค้า</a></li>
                            <li><a href="#tab_2" data-toggle="tab">ข้อมูลพนักงาน</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <!--Conten Tab1-->
                                <section class="content">
                                    <!--  <div class="row">
                                          <div class="col-sm-offset-10 col-xs-2"> <a href="#"><i class="fa   fa-user-plus"></i> เพิ่มลูกค้า</a></div>
                                      </div>   -->
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <!-- <h3 class="box-title">รายการข้อมูลลูกค้า</h3> -->
                                                    <a  href="<?php echo base_url() ?>index.php/main_data/add_customer" title="เพิ่มข้อมูลลูกค้า"><i class="fa fa-user-plus"></i> เพิ่มลูกค้า</a>
                                                </div>  



                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="table-responsive">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th width="150">เลขผู้เสียภาษีอากร</th>
                                                                    <th width="300">ชื่อกิจการ</th>
                                                                    <th width="100">โทรศัพท์</th>
                                                                    <th>อีเมล์</th>
                                                                    <th>เพิ่มเติม</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($customer as $rowcustomer): ?>
                                                                    <tr>
                                                                        <!--เลขประจำตัวผู้เสียภาษีอากร-->
                                                                        <td><?php echo $rowcustomer->customer_tax_id; ?></td>
                                                                        <!--ชื่อกิจการ-->
                                                                        <td><a title="ดูข้อมูลลูกค้าอย่างละเอียด" href="<?php echo base_url(); ?>index.php/main_data/edit_customer/<?php echo $rowcustomer->customer_id; ?>"><?php echo $rowcustomer->customer_name; ?></a></td>
                                                                        <!--โทรศัพท์-->
                                                                        <td><?php echo $rowcustomer->customer_tel; ?></td>
                                                                        <!--อีเมล์-->
                                                                        <td><?php echo $rowcustomer->customer_mail; ?></td>
                                                                        <!--เพิ่มเติม-->
                                                                        <td>
                                                                            <form action="<?php echo base_url(); ?>index.php/main_data/delcus" method="post">
                                                                                <button type="button" data-toggle="modal" data-target="#pnlDelCus<?php echo $rowcustomer->customer_id; ?>" title="ลบข้อมูลลุกค้า" name="btndelEm<?php echo $rowcustomer->customer_id; ?>" class="btn btn-xs btn-default"><span class="fa fa-trash"></span></button>
                                                                                <!--Modal ลบ cus-->

                                                                                <div id="pnlDelCus<?php echo $rowcustomer->customer_id; ?>" class="modal fade" tabindex="-1" role="dialog">
                                                                                    <div class="modal-dialog">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                <h4 class="modal-title">ลบ...</h4>
                                                                                            </div>

                                                                                            <div class="modal-body">

                                                                                                <a>ต้องการลบข้อมูลลูกค้าของ <?php echo nbs(2);
                                                                                                    echo $rowcustomer->customer_name;
                                                                                                    echo nbs(2); ?>?</a><br>
                                                                                                <a style="color: #343131;">ข้อมูลบันทึกประจำวันรวมถึงข้อมูลโครงการจะถูกลบตามไปด้วย!!</a>
                                                                                                <input type="hidden" name="hdf1" value="<?php echo $rowcustomer->customer_id; ?>">
                                                                                            </div>
                                                                                            <div class="modal-footer">
                                                                                                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                                                                <button  class="btn btn-danger btn-sm" type="submit">ยืนยัน</button>
                                                                                                
                                                                                            </div>

                                                                                        </div><!-- /.modal-content -->
                                                                                    </div><!-- /.modal-dialog -->
                                                                                </div><!-- /.modal -->
                                                                                </div>
                                                                                <!--.Modal ลบ cus-->
                                                                            </form>


                                                                        </td>

                                                                    </tr>
<?php endforeach; ?>  
                                                            </tbody>

                                                        </table>
                                                    </div> <!--/.div table responsive-->
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </section>

                                <!--.Conten Tab1-->
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <!--Data2-->
                                <section class="content">
                                    <div class="row">
                                        <div class="col-xs-12">



                                            <div class="box">
                                                <div class="box-header">
                                                    <!-- <h3 class="box-title">Data Table With Full Features</h3>  -->
                                                    <a  href="main_data/add_employee" title="เพิ่มข้อมูลพนักงาน"><i class="fa fa-user-plus"></i>เพิ่มพนักงาน</a>
                                                </div>
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table id="example3" class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>รหัสพนักงาน</th>
                                                                <th>ชื่อ - นามสกุล</th>
                                                                <th>โทรศัพท์</th>
                                                                <th>อีเมล์</th>
                                                                <th>เพิ่มเติม</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php foreach ($employee as $rowemployee): ?>



                                                                <tr>
                                                                    <!--รหัสพนักงาน-->
                                                                    <td><?php echo $rowemployee->em_number; ?></td>
                                                                    <!--ชื่อ - นามสกุล-->
                                                                    <td><a title="ข้อมูลพนักงานอย่างระเอียด" href="<?php echo base_url(); ?>index.php/main_data/edit_emplyee/<?php echo $rowemployee->em_id; ?>"><?php echo $rowemployee->em_name; ?></a></td>
                                                                    <!--โทรศัพท์-->
                                                                    <td><?php echo $rowemployee->em_tel; ?></td>
                                                                    <!--อีเมล์-->
                                                                    <td><?php echo $rowemployee->em_mail; ?></td>
                                                                    <!--เพิ่มเติม-->
                                                                    <td><button data-toggle="modal" data-target="#pnlDelEm<?php echo $rowemployee->em_id; ?>" title="ลบพนักงาน" name="btndelEm<?php echo $rowemployee->em_id; ?>" class="btn btn-xs btn-default"><span class="fa fa-trash"></span></button></td>
                                                                    <!--Modal เตือนลบพนักงาน-->
                                                            <div id="pnlDelEm<?php echo $rowemployee->em_id; ?>" class="modal fade" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title">ลบ...</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <a>ต้องการลบข้อมูลพนักงานของ <?php echo nbs(2);
    echo $rowemployee->em_name;
    echo nbs(2); ?>?</a><br>
                                                                            <a style="color: #343131;">ข้อมูลบันทึกประจำวันจะถูกลบตามไปด้วย!!</a>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                                            <a href="<?php echo base_url(); ?>index.php/main_data/del_em/<?php echo $rowemployee->em_id; ?>"  class="btn btn-danger btn-sm">ยืนยัน</a>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                                            <!--/.Modal เตือน-->

                                                            </tr>
<?php endforeach; ?>
                                                        </tbody>

                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <!-- /.box -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </section>
                                <!--.Data2-->
                            </div>
                            <!-- /.tab-pane -->

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
        <script src="<?php echo base_url('dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('dashboard/lte/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('dashboard/lte/dist/js/app.min.js'); ?>"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->

        <!-- DataTables -->
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('dashboard/lte/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('dashboard/lte/plugins/fastclick/fastclick.js'); ?>"></script>

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
