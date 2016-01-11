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
        $this->load->helper('url');
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            //ใส่ code ส่วนนี้
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function customer() {

        if ($this->session->userdata('logged')) {
            $this->load->view('report_customer_view');
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function employee() {

        if ($this->session->userdata('logged')) {
            $this->load->view('report_employee_view');
        } else {
            $this->load->view('template/404anime');
        }
    }

}
