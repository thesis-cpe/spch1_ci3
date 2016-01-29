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
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.css') ?>">
        <!--ที่เพิ่มมา-->
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/select2/select2.min.css">
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
                        รายงานแบบละเอียด
                        <small>รหัสงาน:<?php ?> บริษัท: พนักงาน:<?php ?></small>
                    </h1>
                    <!--    <ol class="breadcrumb">
                          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                          <li class="active">Here</li>
                        </ol> -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    <!--Data Table-->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูล</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php echo form_open("report/record/$argument[em_id]/$argument[project_id]"); ?>
                            <div class="row">
                                <div class="col-sm-offset-5 col-sm-2">
                                    <!--Date Rang-->
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>

                                            <input required=""  name="rangDate" type="text" class="form-control input-sm" id="reservation">
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                    <!--.Date Rang-->
                                </div>
                                <div class="col-sm-2">
                                    <button class="btn btn-sm btn-default" type="submit" name="btnRang"><span class="fa fa-search"></span></button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="20"><center>วันที่</center></th>
                                <th width="50"><center>เวลาเริ่ม</center></th>
                                <th width="70"><center>เวลาสิ้นสุด</center></th>
                                <th width="100"><center>เวลาที่ใช้(นาที)</center></th>
                                <th width="100"><center>รายการบันทึก</center></th>
                                <th width="70"><center>ข้อความ</center></th>
                                <th><center>ตรวจสอบ</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 0;
                                    $usetime = 0;
                                    $recuse = 0;
                                    foreach ($customer_pro_details as $rowcustomer_pro_details):
                                        ?>    
                                        <tr>
                                            <td><div style="float: right;"><?php echo $rowcustomer_pro_details->daily_dat; ?></div></td>
                                            <td><div style="float: right;"><?php echo $rowcustomer_pro_details->daily_start_time; ?></div></td>
                                            <td><div style="float: right;"><?php echo $rowcustomer_pro_details->daily_end_time; ?></div></td>
                                            <td><div style="float: right;"><?php
                                                    echo number_format($rowcustomer_pro_details->daily_use_time);
                                                    $usetime = $usetime + $rowcustomer_pro_details->daily_use_time;
                                                    ?></div></td>
                                            <td><div style="float: right;"><?php
                                                    echo number_format($rowcustomer_pro_details->daily_rec_insert);
                                                    $recuse = $recuse + $rowcustomer_pro_details->daily_rec_insert;
                                                    ?></div></td>
                                            <td>
                                                <?php if (!empty($rowcustomer_pro_details->daily_note)): ?>
                                        <center> <button data-toggle="modal" data-target="#panelMsn<?php echo $i; ?>" class="btn btn-xs btn-default"><span class="fa fa-envelope"></span></button></center>
                                        <?php
                                    else: echo "<center>" . "-" . "</center>";
                                    endif;
                                    ?>
                                    </td>
                                    <td>
                                      <!--  <input type="checkbox" name="ckecked[]" /> -->
                                     <!--   <input value="<?php // echo $this->session->userdata('em_name');   ?>"  data-size="mini" type="checkbox" data-toggle="toggle" data-on="ยืนยัน" data-off="รอ"> -->
                                   <!-- <center>
                                        <?php //if ($rowcustomer_pro_details->validator == "ตรวจสอบ"): ?>
                                            <a title="ตรวจสอบแล้ว" href="<?php //echo base_url();   ?>index.php/report/cheked/uncheck/<?php //echo $rowcustomer_pro_details->daily_id;   ?>" class="btn btn-xs btn-success"><span class="fa   fa-check-square-o"></span></a>
                                        <?php //else: ?>
                                            <a title="รอการตรวจสอบ" href="<?php //echo base_url();   ?>index.php/report/cheked/check/<?php // echo $rowcustomer_pro_details->daily_id;   ?>" class="btn btn-xs btn-primary"><span class="fa  fa-check-square-o"></span></a>
                                        
                                        <?php //endif; ?> </center>  -->
                                        <!--ตรวจสอบ-->

                                        <?php if ($pro_role == "ผู้ปฏิบัติงาน" || $this->session->userdata('em_role') == "ผู้ดูแลระบบ"): ?>
                                            <button data-toggle="modal" data-target="#pnlCheck<?php echo $rowcustomer_pro_details->daily_id; ?>" class="btn btn-xs btn-default"><span class="fa fa-eye"></span></button> 

                                        <?php endif; ?>
                                        <?php
                                        if (!empty($rowcustomer_pro_details->validator)) {
                                            if ($rowcustomer_pro_details->validator == "ตรวจสอบ") {
                                                echo "<span class='fa fa-check'></span>";
                                                echo nbs(2);
                                                echo $rowcustomer_pro_details->comment;
                                            } elseif ($rowcustomer_pro_details->validator == "พิจารณา") {
                                                echo "<span class='fa fa-question'></span>";
                                                echo nbs(2);
                                                echo $rowcustomer_pro_details->comment;
                                            } elseif ($rowcustomer_pro_details->validator == "ไม่ผ่าน") {
                                                echo "<span class='fa fa-close'></span>";
                                                echo nbs(2);
                                                echo $rowcustomer_pro_details->comment;
                                            }
                                        } else {
                                            echo "-";
                                        }
                                        ?>
                                        <!--Modal ตรวจ-->
    <?php //echo form_open('report/cheked2'); ?>
                                        <form action="<?php echo base_url(); ?>index.php/report/cheked2" method="post" name="form<?php echo $rowcustomer_pro_details->daily_id; ?>">
                                            <div id="pnlCheck<?php echo $rowcustomer_pro_details->daily_id; ?>" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">ตรวจสอบ...</h4>
                                                        </div>
                                                        <div class="modal-body">
    <?php //echo $rowcustomer_pro_details->daily_id; ?>
                                                            <select required="" class="form form-control" name="selCheck">
                                                                <option value="">ผลการตวจ</option>
                                                                <option <?php if (($rowcustomer_pro_details->validator != "") && ($rowcustomer_pro_details->validator == "ตรวจสอบ" )) {
        echo "selected";
    } ?> value="ตรวจสอบ">ตรวจสอบแล้ว</option>
                                                                <option <?php if (($rowcustomer_pro_details->validator != "") && ($rowcustomer_pro_details->validator == "พิจารณา" )) {
        echo "selected";
    } ?>  value="พิจารณา">พิจารณา</option>
                                                                <option <?php if (($rowcustomer_pro_details->validator != "") && ($rowcustomer_pro_details->validator == "ไม่ผ่าน" )) {
        echo "selected";
    } ?>  value="ไม่ผ่าน">ไม่ผ่าน</option>

                                                            </select><br><br>
                                                            <textarea class="form form-control" name="txtComment" cols="60" rows="3"></textarea>
                                                            <input type="hidden" name="hdf" value="<?php echo $rowcustomer_pro_details->daily_id; ?>">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">บันทึก</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </form>
                                        <!--/.Modal ตรวจ-->

                                        <!--.ตรวจสอบ-->
                                    </td>  
                                    </tr>

    <?php if (!empty($rowcustomer_pro_details->daily_note)): ?>        
                                        <!--Modal-->
                                        <div  id="panelMsn<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">ข้อความ...</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <a><?php echo $rowcustomer_pro_details->daily_note; ?></a>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">ปิด</button>
                                                        <!--    <button type="button" class="btn btn-primary">Save changes</button> -->
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        <!--/Modal-->
        <?php
    endif;
    $i++;
endforeach;
?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>

                                        <th>รวม</th>
                                        <td><div style="float: right;"><?php echo $usetime; ?></div></td>
                                        <td><div style="float: right;"><?php echo $recuse; ?></div></td>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!--/.Data Table-->  


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
        <!-- DataTables -->
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->
        <!--Data Toogle-->

        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.0/js/bootstrap-toggle.min.js"></script>
        <!--Data Table1-->
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

        </script>
        <!--ที่เพิ่มเข้า-->
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/select2/select2.full.min.js"></script>
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- date-range-picker -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Page script -->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'DD/MM/YYYY h:mm A'});
                //Date range as a button
                $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'Today': [moment(), moment()],
                                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                                'This Month': [moment().startOf('month'), moment().endOf('month')],
                                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                            },
                            startDate: moment().subtract(29, 'days'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#reportrange span').html(start.format('D MMM, YYYY') + ' - ' + end.format('D MMM, YYYY'));
                        }
                );



                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
            });
        </script>
    </body>
</html>
