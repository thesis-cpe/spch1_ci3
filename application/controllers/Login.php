<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author Administrator
 */
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }
    
    public function index(){
        
    }
    
    public function sigin(){
        
    }
    
    public function sigout(){
        
    }
}
