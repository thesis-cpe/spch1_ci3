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
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.css') ?>">

        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/AdminLTE.min.css') ?>">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="<?php echo base_url('dashboard/lte/dist/css/skins/skin-blue.min.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url();?>dashboard/lte/plugins/datepicker/datepicker3.css">

        <!--css timepicker for timepiar-->
     <!--   <link rel="stylesheet" type="text/css" href="<?php //echo base_url('dashboard/lte/plugins/datepair-this/jquery.timepicker.css') ?>" /> -->
        <!--jasny-bootstrap
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>dashboard/jasny-bootstrap/jasny-bootstrap.min.css"/> -->


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
                <section class="content-header" > 

                    <div class="row">  
                        <div class="col-md-3">
                            <h1 style="font-size: 24px;margin: 0">
                                งานประจำวัน
                                <small style="font-size: 15px">บันทึกข้อมูลงานประจำวัน </small>
                            </h1>
                        </div>

                        <div class="col-md-2">
                            <?php echo form_open('dailywork/dailywork2') ?> 
                            <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                                <input  name="datInWork" type="text" class="form-control input-sm" placeholder="01/01/2016" required=""/> 
                            </div>

                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-sm btn-default" type="submit" name="btnSelDate" value="เลือก"/>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> งานประจำวัน</a></li>
                    </ol>

                </section>

                <!-- Main content -->

                <!--<form action="php_action/insert_daily.php" method="POST">-->    <!--Form-->
                <?php echo form_open('dailywork/insert_daily') ?>
                <section class="content">

                    <!-- Your Page Content Here -->
                    <!-- TAB --->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">ข้อมูลงาน</a></li>

                            <li><button name="btnSubmit" type="submit" class="btn btn-block btn-info btn-sm" title="บันทึก"><span class="fa fa-save"></button></li> 
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
                                                  <!--  <a  href="#" title="เพิ่มข้อมูลลูกค้า"><i class="fa fa-save"></i> บันทึกงาน</a>  -->
                                                </div>  
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="table-responsive">  
                                                        <table id="example1" class="table table-bordered table-striped" width="1205">
                                                            <thead><!--หัวตาราง-->
                                                                <tr>

                                                                    <td width="20" rowspan="2" align="center"><p>&nbsp;</p>
                                                                        <p>เลือก</p>
                                                                    </td>

                                                                    <td width="50" rowspan="2" align="center"><p>cuscode</p>
                                                                        <p>รหัสงาน</p></td>
                                                                    <td width="100"  rowspan="2" align="center"><p>cusname</p>
                                                                        <p>ชื่อบริษัท</p></td>
                                                                    <td width="50"  rowspan="2" align="center"><p>trndate</p>
                                                                        <p>วันที่</p></td>
                                                                    <td  width="50" rowspan="2" align="center"><p>trntime</p>
                                                                        <p>ช่วงเวลา</p></td>
                                                                    <td colspan="3" align="center">เวลา</td>
                                                                    <td colspan="3" align="center">รายการบันทึก</td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="30"  align="center">ใช้ไป</td>
                                                                    <td width="30"  align="center">ยกมา</td>
                                                                    <td  width="30"  align="center">เหลือ</td>
                                                                    <td width="30"  align="center">ยกมา</td>
                                                                    <td width="20"  align="center">คีย์เข้า</td>
                                                                    <td width="30" align="center">โน้ต</td>
                                                                </tr>
                                                            </thead>

                                                            <tbody><!--ตัวตาราง-->
                                                                <?php
                                                                $i = 1;   //วนตัว CheckBox 
                                                                $j = 0; // วนตัวรายการเวลาที่ถูกเลือก
                                                                /* วันที่ */
                                                                if(!empty($team_data)):
                                                                foreach ($team_data as $rowteam_data):
                                                                    ?>

                                                                    <tr>
                                                                        <td>
                                                                             <center> <input id="chkBox<?php echo $i; ?>" name="chkBox1[]" type="checkbox"/></center>
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $rowteam_data['project_number']; ?>
                                                                            <input disabled="" id="hdfProjectNumber<?php echo $i; ?>" type="hidden" name="hdfProjectNumber[]" value="<?php echo $rowteam_data['project_number']; ?>">
                                                                        </td>

                                                                        <td>
                                                                            <?php echo $rowteam_data['customer_name'];
                                                                            if(!empty($DateSelDetial[0][$j]['daily_id'])){
                                                                                //echo $DateSelDetial[0][$j]['daily_start_time'];
                                                                            }
                                                                            
                                                                            ?>
                                                                        </td>

                                                                        <td>
                                                                            <center> 
                                                                                <?php
                                                                                if (!empty($dateSel)) {
                                                                                    $dateSelected = $dateSel;
                                                                                } else {
                                                                                    $dateSelected = $this->session->userdata('date_curent');
                                                                                }
                                                                                echo $dateSelected; //วันที่ ถ้าไม่มีการเลือกเอาเวลาจากเครื่อง ถ้ามีการเลือกจะเอาเวลาที่เลือก
                                                                                /*หาค่าที่กรอกจากวันที่เลือก*/
                                                                                $sqlselDataInsert = $this->db->where('daily_dat',$dateSelected)
                                                                                        ->where('em_id',$this->session->userdata('em_id'))
                                                                                        ->where('project_id',$rowteam_data['project_id'])
                                                                                        ->get('daily')->result();
                                                                                foreach ($sqlselDataInsert as $rowDataInsert){
                                                                                    $dataInsert[] = array(
                                                                                        'rec' => $rowDataInsert->daily_rec_insert,
                                                                                        'start' => $rowDataInsert->daily_start_time,
                                                                                        'end' => $rowDataInsert->daily_end_time,
                                                                                        'dr' => $rowDataInsert->daily_use_time,
                                                                                        'id' => $rowDataInsert->daily_id,
                                                                                        'note' => $rowDataInsert->daily_note,
                                                                                        'validator' => $rowDataInsert->validator
                                                                                        
                                                                                    );  //น่าจะได้นะ ><
                                                                                } 
                                                                                if(empty($dataInsert[$j]['id'])){
                                                                                    $dataInsert[$j]['id'] = "ว่าง";
                                                                                }else{
                                                                                    $dataInsert[$j]['id'] = $dataInsert[$j]['id'];
                                                                                }
                                                                                //echo @$dataInsert[$j]['id']; //ทดสอบค่า
                                                                                /*.หาค่าที่กรอกจากวันที่เลือก*/
                                                                                ?>

                                                                            </center>
                                                                   
                                                                </td>

                                                                <td> <!--ช่วงเวลาที่กรอก-->
                                                                  <!--  <input size="4" type="text" class="form-control input-sm" data-mask="99:99" placeholder="เริ่ม"> - 
                                                                    <input size="4" type="text" class="form-control input-sm" data-mask="99:99" placeholder="สิ้นสุด"> -->
                                                                  <!--  <input   size="9" type="text" class="form-control" data-mask="99:99-99:99" placeholder="เวลา"> -->
                                                                    
                                                                    <input value="<?php echo @$dataInsert[$j]['start'];?>" disabled="" id="txtStartTime<?php echo $i;?>" type="time" name="txtStartTime[]"/> - <input value="<?php echo @$dataInsert[$j]['end']; ?>" disabled="" id="txtEndTime<?php echo $i;?>" type="time" name="txtEndTime[]"/>
                                                                </td>

                                                                <td>
                                                                    <input value="<?php echo @$dataInsert[$j]['dr'];?>"   disabled id="txtUseTime<?php echo $i; ?>" name="txtUseTime[]" class="form-control input-sm" type="text" placeholder="นาที" size="5"/>
                                                                </td>

                                                                <!--เวลายกมา-->
                                                                <td>
                                                                    <?php
                                                                    /* SUM ค่าจาก Dr มาแสดง */
                                                                    $em_id = $this->session->userdata('em_id');
                                                                    $projectID = $rowteam_data['project_id'];
                                                                    $sqlSumDr = "SELECT SUM(daily_use_time) AS sum_time, SUM(daily_rec_insert) AS sum_rec FROM daily WHERE project_id = ' $rowteam_data[project_id]' AND em_id = '$em_id'";
                                                                    $querySumDr = $this->db->query($sqlSumDr);
                                                                    $result = $querySumDr->result_array();
                                                                    /* .SUM ค่าจาก Dr มาแสดง */
                                                                    foreach ($result as $rowresultDr) {
                                                                        $resultSumDr = $rowresultDr['sum_time'];
                                                                        $resultSumDrRec = $rowresultDr['sum_rec'];
                                                                    }
                                                                    ?>      

                                                                    <div align="right">
                                                                        <?php echo number_format($resultSumDr); //เวลารวมของพนักงานที่ล๊อคอินต่อโปรเจคนั้นๆ ?>
                                                                    </div>


                                                                </td>

                                                                <!--เวลาคงเหลือ-->
                                                                <td>
                                                                    <div align="right">
                                                                        <?php echo number_format($rowteam_data['team_hour'] - $resultSumDr);  //team_hour - sum_time   ?>
                                                                    </div>
                                                                </td>

                                                                <!--รายการบันทึก ยกมา-->
                                                                <td>
                                                                    <div align="right">
                                                                        <?php echo number_format($resultSumDrRec); ?>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    <input value="<?php echo @$dataInsert[$j]['rec'] ?>"  disabled id="txtCountRec<?php echo $i; ?>" name="txtCountRec[]" class="form-control input-sm" type="text" placeholder="จำนวน" size="5"/>
                                                                </td>
                                                                <!--โน้ต-->
                                                                <td>
                                                                    <button disabled="" id="buttonNote<?php echo $i; ?>" data-toggle="modal" data-target="#pnlNote<?php echo $i; ?>" type="button" class="btn btn-xs btn-default"><span class="fa fa-pencil-square-o"></span></button>

                                                                    <!--Modal-->
                                                                    <div class="modal fade" id="pnlNote<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                    <h4 class="modal-title" id="myModalLabel">บันทึกข้อความ</h4>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!--Editor-->

                                                                                    <textarea placeholder="แทรกข้อความ...ข้อความจะถูกเก็บเมื่อกดบันทึก" disabled=""   name="areaNote[]" id="noteArea<?php echo $i; ?>" rows="5" cols="90"><?php  echo @$dataInsert[$j]['note'] ?></textarea>


                                                                                    <!--.Editor-->
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
                                                                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!--.Modal-->
                                                                </td>
                                                                <!--CheckBox-->
                                                                <!--ProID-->
                                                                <input disabled="" id="hdfProId<?php echo $i ?>" type="hidden" name="hdfProId[]" value="<?php echo $projectID ?>"/>
                                                                <!--หากมีการ set ค่า dr id-->
                                                                <input disabled="" type="hidden" name="hdfDrId[]" id="hdfDrId<?php echo $i?>" value="<?php echo $dataInsert[$j]['id']; ?>"/>
                                                                <script>

                                                                    document.getElementById('chkBox<?php echo $i; ?>').onchange = function () {
                                                                        
                                                                        document.getElementById('txtUseTime<?php echo $i; ?>').disabled = !this.checked;
                                                                        document.getElementById('txtCountRec<?php echo $i; ?>').disabled = !this.checked;

                                                                        document.getElementById('hdfProjectNumber<?php echo $i; ?>').disabled = !this.checked;
                                                                        document.getElementById('buttonNote<?php echo $i; ?>').disabled = !this.checked;
                                                                        document.getElementById('noteArea<?php echo $i; ?>').disabled = !this.checked;
                                                                        document.getElementById('hdfProId<?php echo $i ?>').disabled = !this.checked;
                                                                        
                                                                        //document.getElementById('txtEndTimeMin<?php echo $i ?>').disabled = !this.checked;
                                                                        //document.getElementById('txtStartTimeMin<?php echo $i ?>').disabled = !this.checked;
                                                                        document.getElementById('txtStartTime<?php echo $i; ?>').disabled = !this.checked;
                                                                        document.getElementById('txtEndTime<?php echo $i; ?>').disabled = !this.checked;
                                                                         document.getElementById('hdfDrId<?php echo $i?>').disabled = !this.checked;
                                                                    };
                                                                </script>




                                                                <!--.CK EDITOR-->
                                                                </tr>

                                                                <?php
                                                                $i++;  // $i checkbox
                                                                $j++;
                                                                // foreach ใหญ่ มาวน
                                                            endforeach;
                                                            
                                                            endif;
                                                            
                                                            ?>            
                                                            </tbody>

                                                            <tfoot><!--ท้ายตาราง-->
                                                                <!--input hidden-->
                                                        <!--    <input type="hidden" name="hdfDateSel" value="<?php// echo $dateSel ?>"/>  -->
                                                            <input type="hidden" name="hdfDateSelected" value="<?php echo @$dateSelected ?>"/>
                                                            <input type="hidden" name="hdfEmID" value="<?php echo @$em_id ?>"/>  
                                                            <?php if(empty($team_data)):?>
                                                            <tr>
                                                                <td colspan="11"><center>ไม่พบงานที่รับผิดชอบ</center></td>
                                                            </tr>
                                                            <?php endif;?>
                                                            <!---->
                                                            </tfoot>
                                                        </table>
                                                    </div><!-- .table-responsive -->
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


                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- .TAB --->
                </section>
                <!-- /.content -->
                </form> <!--.Form-->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <?php include_once 'template/footer.php'; ?>
            <!-- .Main Footer -->


            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url('dashboard/lte/plugins/jQuery/jQuery-2.1.4.min.js') ?>"></script>

        <!-- Bootstrap 3.3.5 -->
        <script src="<?php echo base_url('dashboard/lte/bootstrap/js/bootstrap.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('dashboard/lte/dist/js/app.min.js') ?>"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. Slimscroll is required when using the
             fixed layout. -->

        <!-- DataTables -->
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
        <script src="<?php echo base_url('dashboard/lte/plugins/datatables/dataTables.bootstrap.min.js') ?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('dashboard/lte/plugins/slimScroll/jquery.slimscroll.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('dashboard/lte/plugins/fastclick/fastclick.js') ?>"></script>
        <!--DatePicker-->
        <script src="<?php echo base_url('dashboard/lte/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
     <!--  <script src="<?php //echo base_url('dashboard/lte/plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script> -->
        <!--DatePair-->
      <!--  <script src="<?php //echo base_url('dashboard/lte/plugins/datepair-this/jquery.timepicker.js'); ?>"></script>
        <script src="<?php //echo base_url('dashboard/lte/plugins/datepair-this/bootstrap-datepicker.js'); ?>"></script>
        <script src="<?php //echo base_url('dashboard/lte/plugins/datepair-this/datepair.js'); ?>"></script>
        <script src="<?php //echo base_url('dashboard/lte/plugins/datepair-this/jquery.datepair.js'); ?>"></script> -->
        <!-- InputMask -->
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url(); ?>dashboard/lte/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!--jasny-bootstrap-->
        <script src="<?php echo base_url();?>dashboard/jasny-bootstrap/jasny-bootstrap.min.js"></script>
            





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

        <!--timePair-->
        <script>
          /*  $('#basicExample .time').timepicker({
                'showDuration': true,
                'timeFormat': 'g:ia'
            });

            $('#basicExample .date').datepicker({
                'format': 'd/m/yyyy',
                'autoclose': true
            });

            var basicExampleEl = document.getElementById('basicExample');
            var datepair = new Datepair(basicExampleEl); */
        </script>

        <script>
        /*    $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();

                //Datemask dd/mm/yyyy
                $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
                //Datemask2 mm/dd/yyyy
                $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
                //Money Euro
                $("[data-mask]").inputmask();

                //Date range picker
                $('#reservation').daterangepicker();
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
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
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        }
                );

                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                });

                //Colorpicker
                $(".my-colorpicker1").colorpicker();
                //color picker with addon
                $(".my-colorpicker2").colorpicker();

                //Timepicker
                $(".timepicker").timepicker({
                    showInputs: false
                });
                
                
            });*/
            
            
});
        </script>


    </body>
</html>

