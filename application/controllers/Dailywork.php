<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dailywork
 *
 * @author Administrator
 */
class Dailywork extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {

        if ($this->session->userdata('logged')) {
                
                $this->load->view('daily_work_view');
        
                
                
                
        } else {
            $this->load->view('template/404anime');
        }
    }
    
   

    public function insert_daily() {
        
    }

}
