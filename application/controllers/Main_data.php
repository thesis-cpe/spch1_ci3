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
        $this->load->helper('url');
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

}
