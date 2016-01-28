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

        <!--Datpicker-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/datepicker3.css">
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
            <!--  <form action="" method="post">      -->  
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        เพิ่มพนักงาน
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>index.php/main_data"><i class="fa fa-dashboard"></i> ข้อมูลหลัก</a></li>
                        <li class="active">เพิ่มพนักงาน</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!--รูปประจำตัว-->
                     <?php echo form_open_multipart('main_data/update_pic_emp')?>   
                         <input type="hidden" name="hdf" value="<?php echo $id; ?>">
                        <div class="col-sm-3">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">รูปพนักงาน</h3>
                                </div>
                                <div class="box-body box-profile">
                                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url(); ?>dashboard/lte/dist/img/avatar5.png" title="รูปประจำตัว">
                                    <div style="padding-top: 9px"></div>
                                    
                                    
                                    <ul class="list-inline">
                                        <li><input required=""  type="file" class="input-sm" name="fileEmPhoto"/></li>
                                        <li><button type="submit" name="btnUppic" class="btn btn-sm btn-default"><span class="fa fa-save"></span></button></li>
                                      </ul>
                                </div>
                            </div>
                            


                        </div>
                    <?php echo form_close();?>
                        <!--ข้อมูลพนักงาน-->
                      <?php echo form_open('main_data/update_emp') ?>  
                        <input type="hidden" name="hdf" value="<?php echo $id; ?>">
                        <div class="col-sm-9">
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">ข้อมูลพนักงาน</h3>
                                </div>
                                <div class="box-body">
                                    <!--ชื่อ-นามสกุล-->

                                    <div class="row">

                                        <div class="col-sm-3">
                                            <label>ชื่อ:</label>
                                            <select class="form-control" name="selTitle">
                                                <option <?php
                                                if ($em['nam'] == "นาย") {
                                                    echo "selected";
                                                }
                                                ?> value="นาย">นาย</option>
                                                <option <?php
                                                if ($em['nam'] == "นาง") {
                                                    echo "selected";
                                                }
                                                ?> value="นาง">นาง</option>
                                                <option <?php
                                                    if ($em['nam'] == "นางสาว") {
                                                        echo "selected";
                                                    }
                                                ?> value="นางสาว">นางสาว</option>
                                            </select>

                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input value="<?php echo $em['firstName']; ?>" name="txtEmName" type="text" class="form-control" placeholder="ชื่อ">

                                            <!-- /input-group -->
                                        </div>
                                        <!-- /.col-lg-6 -->
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input value="<?php echo $em['lastName']; ?>"  name="txtEmLastName" type="text" class="form-control " placeholder="นามสกุล">
                                            <!-- /input-group -->
                                        </div>

                                        <div class="col-sm-3">
                                            <label>สถานการทำงาน:</label>
                                            <select  <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> name="selStatus" class="form-control">
                                                <option  value="คงอยู่" <?php
                                                    if ($em['em_status'] == "คงอยู่") {
                                                        echo "selected";
                                                    }
                                                ?>>คงอยู่</option>
                                                <option value="ลาออก" <?php
                                                    if ($em['em_status'] == "ลาออก") {
                                                        echo "selected";
                                                    }
                                                ?>>ลาออก</option>
                                            </select>
                                        </div>
                                        <!-- /.col-lg-6 -->
                                    </div>  
                                    <!--.ชื่อ-นามสกุล-->
                                    <br>
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <label>สถานะในระบบ:</label>
                                            <select  <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> name="selRole" class="form-control">
                                                <option <?php
                                                    if ($em['em_role'] == "ผู้ดูแลระบบ") {
                                                        echo "selected";
                                                    }
                                                ?> value="ผู้ดูแลระบบ">ผู้ดูแลระบบ</option>
                                                <option <?php
                                                    if ($em['em_role'] == "ผู้ใช้งาน") {
                                                        echo "selected";
                                                    }
                                                ?> value="ผู้ใช้งาน">ผู้ใช้งาน</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_number'] ?>" type="text" class="form-control" name="txtEmId" placeholder="หมายเลขพนักงาน" required="">
                                        </div>
                                        <div class="col-sm-3">
                                            <label>&nbsp;</label>
                                            <input  <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_audit_number'] ?>" type="text" class="form-control" name="txtAuditId" placeholder="หมายเลขผู้ทำบัญชี" required="">
                                        </div>

                                        <!--PassWord-->
                                        <div class="col-sm-2">
                                            <label>เปลี่ยนรหัสผ่าน:</label><br>

                                            <!--  ทำปุ่มแก้ไขรหัสผ่านแล้วลิงค์ไปอีกฟอร์มเลย -->
                                            <button data-toggle="modal" data-target="#pnlChangPass" type="button" class="btn btn-primary btn-sm"><span class="fa fa-key"></span></button>
                                            <!--  <input type="password" class="form-control" name="txtPassword" placeholder="รหัสผ่าน" required=""> -->
                                        </div>



                                    </div> 
                                    <!-- /.class row  สถานการทำงาน-->
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.col-sm-9 ข้อมูลพนักงาน -->
                    </div>        
                    <!-- /.class row -->



                    <!--ข้อมูลส่วนบุคคล-->
                    <div class="box box-default">
                        <div class="box-header">
                            <h3 class="box-title">ข้อมูลส่วนบุคคล</h3>
                        </div>
                        <div class="box-body">

                            <div class="row">
                                <div class="col-sm-3">
                                    <label>เลขประจำตัวประชาชน:</label>
                                    <input value="<?php echo $em['em_nationn_id']; ?>" class="form-control" name="txtNationId" placeholder="หมายเลข 13 หลัก" maxlength="13">
                                </div>
                                <div class="col-sm-3">
                                    <label>สถานะสมรส :</label>
                                    <select name="selMarieStatus" class="form-control">
                                        <option  <?php
                                                    if ($em['em_marie_status'] == "โสด") {
                                                        echo "selected";
                                                    }
                                                ?> value="โสด">โสด</option>
                                        <option <?php
                                                    if ($em['em_marie_status'] == "สมรส") {
                                                        echo "selected";
                                                    }
                                                ?> value="สมรส">สมรส</option>
                                        <option <?php
                                                    if ($em['em_marie_status'] == "หย่าร้าง") {
                                                        echo "selected";
                                                    }
                                                ?> value="หย่าร้าง">หย่าร้าง</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaAddr1" rows="1" cols="40" class="form-control" placeholder="ที่อยู่ตามทะเบียนบ้าน"><?php echo $em['em_addr'] ?></textarea>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <textarea name="txtareaAddr2" rows="1" cols="40" class="form-control" placeholder="ที่อยู่ปัจจุบัน"><?php echo $em['em_addr_curent'] ?></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ข้อมูลการติดต่อ:</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $em['em_tel']; ?>" name="txtTel" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <input value="<?php echo $em['em_mail']; ?>" name="txtEmail" type="email" class="form-control" placeholder="example@exam.com">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>บุคคลที่ติดต่อได้:</label>

                                    <input value="<?php echo $em['em_friend_name']; ?>" name="txtNameFriend" type="text" class="form-control" placeholder="ชื่อบุคคลที่ติดต่อได้">

                                </div>

                                <div class="col-sm-3">
                                    <label>&nbsp;</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input value="<?php echo $em['em_friend_tel']; ?>" name="txtTelFriend" type="text" class="form-control" placeholder="หมายเลขโทรศัพท์">
                                    </div>
                                </div>
                            </div>

                            <!--ข้อมูลการศึกษา-->
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>ระดับการศึกษา:</label>
                                    <select class="form-control" name="selGaduLevel">
                                        <option <?php
                                                    if ($em['em_level'] == "ประถมต้น") {
                                                        echo "selected";
                                                    }
                                                ?> value="ประถมต้น">ประถมต้น</option>
                                        <option <?php
                                            if ($em['em_level'] == "ประถมปลาย") {
                                                echo "selected";
                                            }
                                            ?> value="ประถมปลาย">ประถมปลาย</option>
                                        <option <?php
                                            if ($em['em_level'] == "มัธยมต้น") {
                                                echo "selected";
                                            }
                                            ?> value="มัธยมต้น">มัธยมต้น</option>
                                        <option <?php
                                            if ($em['em_level'] == "มัธยมปลาย") {
                                                echo "selected";
                                            }
                                            ?> value="มัธยมปลาย">มัธยมปลาย</option>
                                        <option <?php
                                            if ($em['em_level'] == "ปวช") {
                                                echo "selected";
                                            }
                                            ?> value="ปวช">ปวช</option>
                                        <option <?php
                                            if ($em['em_level'] == "ปวส") {
                                                echo "selected";
                                            }
                                            ?> value="ปวส">ปวส</option>
                                        <option <?php
                                            if ($em['em_level'] == "ปริญญาตรี") {
                                                echo "selected";
                                            }
                                            ?> value="ปริญญาตรี">ปริญญาตรี</option>
                                        <option <?php
                                            if ($em['em_level'] == "ปริญญาโท") {
                                                echo "selected";
                                            }
                                            ?> value="ปริญญาโท">ปริญญาโท</option>
                                        <option <?php
                                            if ($em['em_level'] == "ปริญญาเอก") {
                                                echo "selected";
                                            }
                                            ?> value="ปริญญาเอก">ปริญญาเอก</option>
                                    </select>
                                </div>

                                <div class="col-sm-3">
                                    <label>สาขาที่จบ:</label>

                                    <input value="<?php echo $em['em_major']; ?>" name="txtMajor" type="text" class="form-control" placeholder="บัญชี">

                                </div>
                                <div class="col-sm-3">
                                    <label>เกรดเฉลี่ยรวม:</label>

                                    <input value="<?php echo $em['em_gpa']; ?>" name="txtGpa" type="text" class="form-control" placeholder="4.00">

                                </div>
                                <div class="col-sm-3">
                                    <label>สถาบัน:</label>

                                    <input value="<?php echo $em['em_insutution']; ?>"  name="txtInstitute" type="text" class="form-control" placeholder="มหาวิทยาลัยเกษตรศาสตร์">

                                </div>
                            </div>

                            <!--.ข้อมูลการศึกษา-->

                            <!--ข้อมูลเกี่ยวกับการทำงาน-->
                            <br>
                            <div class="row">
                                <div class="col-sm-3">
                                    <label>เริ่มปฏิบัติงาน:</label>

                                   <!-- <input  data-provide="datepicker" name="datInWork" type="text" class="form-control datepicker" placeholder="" data-date-format="dd/mm/yyyy">-->
                                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-th"></span>
                                        </div>
                                        <input <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_start_work']; ?> " name="datInWork" type="text" class="form-control" placeholder="01/01/2016">

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label>&nbsp;</label>

                                    <input <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_salary_rate']; ?>" name="txtCoast" type="text" class="form-control" placeholder="อัตราเงินเดือน">

                                </div>
                                <div class="col-sm-3">
                                    <label>ค่าแรงต่อวัน:</label>

                                    <input <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_salary_day']; ?>" name="txtRateCoast" type="text" class="form-control" placeholder="จำนวนบาทต่อวัน">

                                </div>
                                <div class="col-sm-3">
                                    <label>จำวนวนวันทำงาน:</label>

                                    <input <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> value="<?php echo $em['em_day_work']; ?>" name="txtWorkDay" type="text" class="form-control" placeholder="จำนวนวันต่อเดือน">

                                </div>
                            </div>
                            <!--.ข้อมูลเกี่ยวกับการทำงาน-->

                            <!--เงื่อนไขวันหยุดและสวัสดิการ+หมายเหตุ-->

                            <div class="row">
                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> name="txtareaCondition" rows="3" cols="30" class="form-control" placeholder="เงื่อนไขวันหยุดและสวัสดิการ"><?php echo $em['em_benefit']; ?></textarea>
                                </div>

                                <div class="col-sm-6">
                                    <label>&nbsp;</label>
                                    <textarea <?php if($this->session->userdata('em_role') == "ผู้ใช้งาน"){echo "disabled";}?> name="txtareaMark" rows="3" cols="30" class="form-control" placeholder="หมายเหตุ"><?php echo $em['em_note']; ?></textarea>
                                </div>

                            </div>

                            <!--.เงื่อนไขวันหยุดและสวัสดิการ+หมายเหตุ-->

                        </div>
                        <!-- /.box-body -->

                        <!--Div Footer-->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">ล้างข้อมูล</button>
                            <input type="submit" name="btnsubmit" class="btn btn-success pull-right" value="บันทึก"/>
                        </div>
                        <!--.Div Footer-->


                    </div>




                    <!-- .Your Page Content Here -->
                </section>


                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </form><!--Form-->
        <!--Panel Chang Pass-->
<?php //echo form_open('main_data/chang_pass')  ?>
        <form name="formAddEm" action="<?php echo base_url(); ?>index.php/main_data/chang_pass" method="post" OnSubmit="return fncSubmit();">
            <div id="pnlChangPass" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">เปลี่ยนรหัสผ่าน...</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-3"><label>รหัสผ่านใหม่:</label></div>
                                <div class="col-sm-4"><input placeholder="รหัสผ่านใหม่" class="form-control input-sm" type="password" name="txtPassword" maxlength="16" minlength="6"></div>
                                <input type="hidden" name="hdf" value="<?php echo $id; ?>">
                            </div> <br>
                            <div class="row">
                                <div class="col-sm-3"><label>ยืนยันรหัส:</label></div>
                                <div class="col-sm-4"><input placeholder="ยืนยันรหัส" class="form-control input-sm" type="password" name="txtPassword2" maxlength="16" minlength="6"></div>
                            </div> 

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <!--/.Panel Chang Pass-->


        <!-- Main Footer -->
<?php include_once '/template/footer.php'; ?>
        <!-- .Main Footer -->


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
    <!--Datpicker-->
    <script src="<?php echo base_url(); ?>dashboard/lte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Check PassWord-->
    <script>
            function fncSubmit()
            {
                if (document.formAddEm.txtPassword.value == "")
                {
                    alert('โปรดสร้างรหัสผ่าน');
                    document.formAddEm.txtPassword.focus();
                    return false;
                }
                if (document.formAddEm.txtPassword2.value == "")
                {
                    alert('โปรดยืนยันรหัสผ่าน');
                    document.formAddEm.txtPassword2.focus();
                    return false;
                }
                if (document.formAddEm.txtPassword.value != document.formAddEm.txtPassword2.value)
                {
                    alert('โปรดยืนยันรหัสผ่านอีกครั้ง');
                    document.formAddEm.txtPassword.focus();
                    return false;
                }
                document.formAddEm.submit();

            }
    </script>
</body>
</html>
