<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author Administrator
 */
class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model','report');
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            //ใส่ code ส่วนนี้
            redirect('report/customer','refresh');
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function customer() {

        if ($this->session->userdata('logged')) {
            
            $data['proNumber'] = $this->report->_sel_pro_num();
            $this->load->view('report_customer_view2',$data);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function employee() {

        if ($this->session->userdata('logged')) {
            $this->load->view('report_employee_view2');
        } else {
            $this->load->view('template/404anime');
        }
    }

}
