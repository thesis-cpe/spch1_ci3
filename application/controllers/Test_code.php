<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Test_code
 *
 * @author Administrator
 */
class Test_code extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->load->view('test_code/ajax');
    }
}
