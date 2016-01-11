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
        $this->load->model('users_model','users');
       
        
    }

    public function index() {

        if (!$this->session->userdata('logged')) {  //ถ้าไม่มีการล๊อคอินให้ไป sigin()
            redirect('login/sigin', 'refresh');
        } else {
            redirect('main_panel', 'refresh');  //ถ้ามีการล๊อคอินแล้วให้ไปหน้าหลัก
        }
    }

    public function sigin() {
        $this->load->view('singin_view');
    }

    public function check_auth() {
        
        if($this->input->post('btnLogin')){
            /*รับค่าตัวแปร*/
            $username = $this->input->post('user');
            $password = $this->input->post('pass');
            $check = $this->users->_checkUser($username, $password);
            if($check){ //ชื่อผู้ใช้รหัสถูกต้อง
                $dataEm = array(
                    'username' => '$username',
                    'logged'	=> TRUE
                );
                $this->session->set_userdata($dataEm); //สร้างตัวแปร Session
                redirect('login');
            }else{ //ชื่อผู้ใช้รหัสไม่ถูกต้อง
                redirect('login/sigin', 'refresh');
            }
        }
    }

    public function sigout() {
        $this->session->sess_destroy(); //ล้างค่าตัวแปร Session
        redirect('login/sigin', 'refresh'); //กลับไปหน้าล๊อกอิน
    }

}
