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
       /* เอา Data ไปยัด */
        $dataOpenPro = array(
            'newProNumber' => $newProNumber,
            'taxId' => $customer_tax_id,
            'customerName' => $customer_name
        );

        $this->load->view('add_project_view', $dataOpenPro);
    }

    public function project_customer($customer_id) {

        $dataProCus['details'] = $this->projects->_sel_project($customer_id);
        $this->load->view('project_customer_view', $dataProCus);
    }

    public function insert_project() {
        //เอาลงฐานข้อมูล
    }

}
