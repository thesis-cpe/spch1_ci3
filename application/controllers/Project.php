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
        $cusIdFromproNumber = $this->projects->_proid_from_pro_number($proNumber);  //ได้ pro_id ทีมีการ insert ลง project ด้วยรหัสงานใหม่
        //insert ลง team
        $selEmTeam = $projectData['selEmName'];  //นับจำนวนพนักงานลงทีม
        $countEm = count($selEmTeam);
        $insertToteam = $this->projects->_insert_team($cusIdFromproNumber, $projectData, $countEm); //insert ลง ทีมเรียบร้อย
        //ลง tb doc pro
        if ($projectData['datOffers'] != "" || $projectData['datOffersEmploy'] != "") {  //ถ้ามีการกรอกใบเสนอราคาหรือจ้างอย่างใดอย่างหนึ่ง
            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {//มีไฟล์อย่างใดอย่างหนึ่ง
                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $cusIdFromproNumber, 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataEmploy = $this->upload->data();
                        $fileDocEmploy = $upload_dataEmploy['file_name'];
                        //$insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                        $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $cusIdFromproNumber, 'สัญญาจ้าง');
                    }
                }
            } else {  //ถ้าไม่มีไฟล์
                if ($projectData['datOffers'] != "") {
                    $fileDocOfffer = "";
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $cusIdFromproNumber, 'ใบเสนอราคา');
                }
                if ($projectData['datOffersEmploy'] != "") {
                    $fileDocEmploy = "";
                    $insertToDocPro = $this->projects->_insert_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $cusIdFromproNumber, 'สัญญาจ้าง');
                }
            }
        }
        
        $this->load->view('project_view_load');
    }

    public function close_open($command, $id) {
        $this->projects->_close_open($command, $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function edit_project($tax_id, $name, $project_id) {

        $projectDetail = $this->projects->_sel_pro_details($project_id); //รายละเอียดโปรเจค
        $employeeDetail = $this->users->_sel_employee_details(); //รายละเอียดพนักงาน
        $teamDetail = $this->projects->_sel_team_details($project_id); //รายละเอียดทีม
        $proDocDetail =  $this->projects->_sel_pro_doc($project_id);
        //print_r($proDocDetail);
        $data = array(
            'taxId' => $tax_id,
            'projectId' => $project_id,
            'customerName' => $name,
            'project_detail' => $projectDetail,
            'employeeDetail' => $employeeDetail,
            'teamDetail' => $teamDetail,
            'prodoc' => $proDocDetail 
        );
        //echo $data['teamDetail'][0]['team_role'];


        $this->load->view('edit_project_view', $data);
    }
    
    public function update_project(){
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'doc|docx|pdf|xl|xls';
        $config['max_size'] = 10000; //10 mb

        $this->upload->initialize($config);
        $this->load->library('upload', $config);
       
        
        $projectData = array(
            'hdfProId' => $this->input->post('hdfProId'),
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
            'prodocOfferId' => $this->input->post('hdf1'), //id ใบเสนอราคา
            'prodocEmployId' => $this->input->post('hdf2'), // id สัญญาจ้าง
        );
        
        /*อัตเดตตัวโปรเจค */ $upPro = $this->projects->_update_project($projectData);
        /*update team*/ 
            /*ลบของเก่า*/  $delOldTeam = $this->projects->_delteam($projectData['hdfProId']);
                       $countEm = 0;
                       $countEm = count($projectData['selEmName']);
            /*เพิ่มของใหม่*/ $insertNewTeam = $this->projects->_insert_team($projectData['hdfProId'], $projectData, $countEm);
                       $countEm = 0;
        
        
        /*อัพเดตไฟล์*/
           if ($projectData['datOffers'] != "" || $projectData['datOffersEmploy'] != "") {  //ถ้ามีการกรอกใบเสนอราคาหรือจ้างอย่างใดอย่างหนึ่ง
            if (!empty($_FILES['fileDocOfffer']['name']) || !empty($_FILES['fileDocEmploy']['name'])) {//มีไฟล์อย่างใดอย่างหนึ่ง
                if (!empty($_FILES['fileDocOfffer']['name'])) {
                    if (!$this->upload->do_upload('fileDocOfffer')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataOffer = $this->upload->data();
                        $fileDocOfffer = $upload_dataOffer['file_name'];
                        $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $projectData['prodocOfferId'], 'ใบเสนอราคา');
                    }
                }
                if (!empty($_FILES['fileDocEmploy']['name'])) {
                    if (!$this->upload->do_upload('fileDocEmploy')) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                    } else {
                        $upload_dataEmploy = $this->upload->data();
                        $fileDocEmploy = $upload_dataEmploy['file_name'];
                        //$insertToDocPro = $this->projects->_insert_prodoc($projectData, $cusIdFromproNumber, 'สัญญาจ้าง');
                        $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $projectData['prodocEmployId'], 'สัญญาจ้าง');
                    }
                }
            } else {  //ถ้าไม่มีไฟล์
                if ($projectData['datOffers'] != "") {
                    $fileDocOfffer = "";
                    $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffers'], $projectData['txtSumMoney'], $projectData['txtNoOffer'], $fileDocOfffer, $projectData['prodocOfferId'], 'ใบเสนอราคา');
                }
                if ($projectData['datOffersEmploy'] != "") {
                    $fileDocEmploy = "";
                    $insertToDocPro = $this->projects->_update_prodoc($projectData['datOffersEmploy'], $projectData['txtSumMoneyEmploy'], $projectData['txtNoEmploy'], $fileDocEmploy, $projectData['prodocEmployId'], 'สัญญาจ้าง');
                }
            }
        } 
        /*.อัพเดตไฟล์*/
                       
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
        
        
        
        
    }
    
    

}
