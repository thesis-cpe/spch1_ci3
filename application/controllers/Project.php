<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project
 *
 * @author Administrator
 */
class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Project_model', 'projects');
        $this->load->model('Customer_model', 'customers');
        $this->load->model('users_model', 'users');
    }

    public function index() {
        if ($this->session->userdata('logged')) {//ผ่านการลงชื่อเข้าใช้
            $dataProject['listCustomer'] = $this->customers->_sel_customer_details();
            $this->load->view('project_view', $dataProject);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function add_project($customer_id, $customer_tax_id, $customer_name) {
        //เจนรหัสใหม่
        $curentYear = date("Y") + 543; //ปีปัจจุบัน พ.ศ.   
        $curentYearSub = substr($curentYear, 2);
        $newProNumber = $this->projects->_add_project($curentYearSub, $customer_id, $customer_tax_id);
        /* เลือก Em Name */
        $emname = $this->users->_sel_employee_details();

        /* เอา Data ไปยัด */
        $dataOpenPro = array(
            'newProNumber' => $newProNumber,
            'taxId' => $customer_tax_id,
            'customerName' => $customer_name,
            'customer_id' => $customer_id,
            'em_name' => $emname
        );

        $this->load->view('add_project_view', $dataOpenPro);
    }

    public function project_customer($customer_id, $customer_name, $tax_id) {

        $dataProCus['details'] = $this->projects->_sel_project($customer_id);
        $dataProCus['customer_name'] = $customer_name;
        $dataProCus['tax_id'] = $tax_id;
        $this->load->view('project_customer_view', $dataProCus);
    }

    public function insert_project() { //เอาลงฐานข้อมูล
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        $projectData = array(
            'hdfCustomerId' => $this->input->post('hdfCustomerId'),
            'txtIdWorkCustomer' => $this->input->post('txtIdWorkCustomer'),
            'txtAssetProject' => $this->input->post('txtAssetProject'),
            'txtCoastOffice' => $this->input->post('txtCoastOffice'),
            'txtMarkProject' => $this->input->post('txtMarkProject'),
            /* team */
            'selEmRole' => $this->input->post('selEmRole[]'),
            'selEmName' => $this->input->post('selEmName[]'),
            'txtCountWorkHour' => $this->input->post('txtCountWorkHour[]'),
            'txtBathTime' => $this->input->post('txtBathTime[]'),
            /* Project ต่อ */
            'datIntWork' => $this->input->post('datIntWork'),
            'datFinalWork' => $this->input->post('datFinalWork'),
            'datAcepeWork' => $this->input->post('datAcepeWork'),
            'selRateCoast' => $this->input->post('selRateCoast'),
            'txtRevenueAudit' => $this->input->post('txtRevenueAudit'),
            'txtInstallment' => $this->input->post('txtInstallment'),
            /* Project_doc */
            'datOffers' => $this->input->post('datOffers'), //ใบเสนอราคา
            'txtSumMoney' => $this->input->post('txtSumMoney'),
            'txtNoOffer' => $this->input->post('txtNoOffer'),
            'datOffersEmploy' => $this->input->post('datOffersEmploy'), //สัญญาจ้าง
            'txtSumMoneyEmploy' => $this->input->post('txtSumMoneyEmploy'),
            'txtNoEmploy' => $this->input->post('txtNoEmploy'),
        );
        $insertToProject = $this->projects->_insert_project($projectData);  //insert ลง project
        $proNumber = $this->input->post('txtIdWorkCustomer');  //รับค่ารหัสงานใหม่
        $cusIdFromproNumber = $this->projects->_proid_from_pro_number($proNumber);  //ได้ cus_id ทีมีการ insert ลง project ด้วยรหัสงานใหม่
        //insert ลง team
        $selEmTeam = $projectData['selEmName'];  //นับจำนวนพนักงานลงทีม
        $countEm = count($selEmTeam);
        $insertToteam = $this->projects->_insert_team($cusIdFromproNumber, $projectData, $countEm); //insert ลง ทีมเรียบร้อย
        //ลง tb doc pro
        if ($projectData['datOffers'] != "") {


            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {

                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                } else {
                    $upload_dataEmploy = $this->upload->data();
                    $fileDocOfffer = $upload_dataEmploy['file_name'];
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                }
            } else {

                $docName = "";
                $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, $docName);  //เรียก model  _insert_prodoc
            }
        }////

        if ($projectData['datOffersEmploy'] != "") {


            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {

                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    }
                } else {
                    $upload_dataEmploy = $this->upload->data();
                    $fileDocOfffer = $upload_dataEmploy['file_name'];
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                }
            } else {


                $docName = "";
                $insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, $docName);  //เรียก model  _insert_prodoc
            }
        }
    }

}
