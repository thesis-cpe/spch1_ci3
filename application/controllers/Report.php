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
    
    public function index(){
        
    }
    
    public function customer(){
        $this->load->view('report_customer_view');
    }
    
    public function employee(){
        $this->load->view('report_employee_view');
    }
}
