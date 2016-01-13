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
        $this->load->model('users_model', 'users');
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

        if ($this->input->post('btnLogin')) {

            //ifใหญ่ g-recaptcha
            if ($this->input->post('g-recaptcha-response') && $this->input->post('g-recaptcha-response')) {
                $secret = "6LcfABUTAAAAAIxe6Xa5-LWOniOSZ4G0nzSeNrIX";
                //$ip = $_SERVER['REMOTE_ADDR'];
                $ip = $this->input->server('REMOTE_ADDR');
                //$captcha = $_POST['g-recaptcha-response'];
                $captcha = $this->input->post('g-recaptcha-response');
                $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
                
                $arr = json_decode($rsp, TRUE);
                if ($arr['success']) {
                    //ผ่านการตรวจสอบว่าเป็นคน
                    /* รับค่าตัวแปร */
                    $username = $this->input->post('user');
                    $password = $this->input->post('pass');
                    $check = $this->users->_checkUser($username, $password);
                    if ($check) { //ชื่อผู้ใช้รหัสถูกต้อง
                        $dataEmDb = $this->users->_sel_customer_details($username);
                        
                        $dataEm = array(  //ตัวแปร session
                            'username' => $username,
                            'logged' => TRUE,
                            'em_name' => $dataEmDb['name']
                            
                        );
                        $this->session->set_userdata($dataEm); //สร้างตัวแปร Session
                        redirect('login');
                    } else { //ชื่อผู้ใช้รหัสไม่ถูกต้อง
                       //redirect('login/sigin', 'refresh');
                       $this->load->view('template/incorect_user'); 
                    }
                } else {
                    echo 'SPAM';
                }
            }else{  //ไม่มีการกด recaptcha
                $this->load->view('template/404recaptcha');
            }//ตรวจ recapthap  //เครดิต https://www.youtube.com/watch?v=pPITBtE45bg
        }//ตรวจกดปุ่ม login
    }

    public function sigout() {
        $this->session->sess_destroy(); //ล้างค่าตัวแปร Session
        redirect('login/sigin', 'refresh'); //กลับไปหน้าล๊อกอิน
    }
    
    

}
