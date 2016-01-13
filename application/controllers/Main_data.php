<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main_data
 *
 * @author Administrator
 */
class Main_data extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model', 'users');
        $this->load->model('Customer_model', 'customer');
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            /*เตรียมยัดข้อมูลลงตัวแปร*/
            $dataMain['customer'] = $this->customer->_sel_customer_details(); //ข้อมูลลูกค้า
            $this->load->view('main_data_view',$dataMain);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function add_customer() {
        if ($this->session->userdata('logged')) {
            $this->load->view('add_customer_view');
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function add_employee() {
        if ($this->session->userdata('logged')) {
            $this->load->view('add_employee_view');
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function insert_emp() {
        if ($this->input->post('btnsubmit')) {


            /* คำนำหน้า */ $txtName = $this->input->post('selTitle');
            /* ชื่อ */ $txtEmName = $this->input->post('txtEmName');
            /* นามสกุล */ $txtEmlastName = $this->input->post('txtEmLastName');
            /* สถานะการทำงาน */ $selStatus = $this->input->post('selStatus');
            /* สถานะในระบบ */ $selRole = $this->input->post('selRole');
            /* หมายเลขพนักงาน */ $txtEmId = $this->input->post('txtEmId');
            /* หมายเลขผู้ทำบัญชี */ $txtAuditId = $this->input->post('txtAuditId');
            /* รหัสผ่าน */ $txtPassword = $this->input->post('txtPassword');
            /* รหัสผ่าน2 */ $txtPassword2 = $this->input->post('txtPassword2');
            /* Nation Id */ $txtNationId = $this->input->post('txtNationId');
            /* สมรส */ $selMarieStatus = $this->input->post('selMarieStatus');
            /* ที่อยู่ */ $txtareaAddr1 = $this->input->post('txtareaAddr1');
            /* ที่อยู่2 */ $txtareaAddr2 = $this->input->post('txtareaAddr2');
            /* โทร */ $txtTel = $this->input->post('txtTel');
            /* mail */ $txtEmail = $this->input->post('txtEmail');
            /* ติดต่อได้ */ $txtNameFriend = $this->input->post('txtNameFriend');
            /* เบอร์เพื่อน */ $txtTelFriend = $this->input->post('txtTelFriend');
            /* การศึกษา */ $selGaduLevel = $this->input->post('selGaduLevel');
            /* สาขา */ $txtMajor = $this->input->post('txtMajor');
            /* เกรด */ $txtGpa = $this->input->post('txtGpa');
            /* สถาบัน */ $txtInstitute = $this->input->post('txtInstitute');
            /* เริ่มทำ */ $datInWork = $this->input->post('datInWork');
            /* ค่าแรง */ $txtCoast = $this->input->post('txtCoast');
            /* บาท/วัน */ $txtRateCoast = $this->input->post('txtRateCoast');
            /* วัน / เดือน */ $txtWorkDay = $this->input->post('txtWorkDay');
            /* วันหยุด */ $txtareaCondition = $this->input->post('txtareaCondition');
            /* หมายเหตุ */ $txtareaMark = $this->input->post('txtareaMark');
            $callModel = $this->users->_insert_em($txtName, $txtEmName, $txtEmlastName, $selStatus, $selRole, $txtEmId, $txtAuditId, $txtPassword, $txtNationId, $selMarieStatus, $txtareaAddr1, $txtareaAddr2, $txtTel, $txtEmail, $txtNameFriend, $txtTelFriend, $selGaduLevel, $txtMajor, $txtGpa, $txtInstitute, $datInWork, $txtCoast, $txtRateCoast, $txtWorkDay, $txtareaCondition, $txtareaMark);
        }
    }

    public function insert_customer() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1000;
        $config['max_width'] = 1024;
        $config['max_height'] = 1000;
        $this->upload->initialize($config);
        $this->load->library('upload', $config);


        /* รับค่าตัวแปร */
        $customer = array(
            'txtCusname' => $this->input->post('txtCusname'),
            'selCusStatus' => $this->input->post('selCusStatus'),
            'txtNumTax' => $this->input->post('txtNumTax'),
            'txtNumBand' => $this->input->post('txtNumBand'),
            'txtAddrTh' => $this->input->post('txtAddrTh'),
            'txtAddrEn' => $this->input->post('txtAddrEn'),
            'txtCusTel' => $this->input->post('txtCusTel'),
            'txtCusFax' => $this->input->post('txtCusFax'),
            'txtCusWeb' => $this->input->post('txtCusWeb'),
            'txtCusMail' => $this->input->post('txtCusMail'),
            'txtConditionNam' => $this->input->post('txtConditionNam'),
            'txtContractName' => $this->input->post('txtContractName'),
            'txtContractTel' => $this->input->post('txtContractTel'),
            'txtContractMail' => $this->input->post('txtContractMail'),
            'txtLat' => $this->input->post('txtLat'),
            'txtLong' => $this->input->post('txtLong'),
            'txtCustomerMark' => $this->input->post('txtCustomerMark'),
            'txtNameCon' => $this->input->post('txtNameCon[]'), //ติดสองตัวล่างเดี๋ยวดูได้จาก code เก่า
            'selStatusCondition' => $this->input->post('selStatusCondition[]')
        );

        $callModelCustomer = $this->customer->_insert_customer($customer); //นำเข้าข้อมูล
        $tbCustomerId = $this->customer->_sel_customer_id($customer['txtNumTax']); //เลื่อก customer_id ที่ตรงกับ txtNumTax
        //insert ลง sign
        $countofSign = count($customer['txtNameCon']);  //นับจำนวนผู้ลงนาม
        $insertTosign = $this->customer->_insert_sign($customer, $tbCustomerId, $countofSign); //เอาลง tb sign
        /* Upload */

        if (!empty($_FILES['fileImgCustomer']['name'])) {  //ตรวจว่าฟิวไฟล์ว่างหรือไม่
            if (!$this->upload->do_upload('fileImgCustomer')) {
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            } else {

                $upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
                $file_name = $upload_data['file_name'];
                /* insertFile */
                $insertPhotoFile = $this->customer->_insert_file($file_name, $tbCustomerId);
            }
        }
        $this->load->view('maindata_view_load');
    }

}
