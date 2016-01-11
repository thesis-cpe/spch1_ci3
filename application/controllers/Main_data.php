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
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            $this->load->view('main_data_view');
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

    public function insert_customer() {
        if ($this->input->post('btnsubmit')) {

            /* คำนำหน้า */ $txtName = $this->input->post('selTitle');
            /* ชื่อ */  $txtEmName = $this->input->post('txtEmName');
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

            $callModel = $this->users->_insert_user($txtName, $txtEmName, $txtEmlastName, $selStatus, $selRole, $txtEmId, $txtAuditId, $txtPassword, $txtNationId, $selMarieStatus, $txtareaAddr1, $txtareaAddr2, $txtTel, $txtEmail, $txtNameFriend, $txtTelFriend, $selGaduLevel, $txtMajor, $txtGpa, $txtInstitute, $datInWork, $txtCoast, $txtRateCoast, $txtWorkDay, $txtareaCondition, $txtareaMark);
        }
    }

}
