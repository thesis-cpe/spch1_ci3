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
          /*  if ($this->input->post('g-recaptcha-response') && $this->input->post('g-recaptcha-response')) {
                $secret = "6LcfABUTAAAAAIxe6Xa5-LWOniOSZ4G0nzSeNrIX";
                //$ip = $_SERVER['REMOTE_ADDR'];
                $ip = $this->input->server('REMOTE_ADDR');
                //$captcha = $_POST['g-recaptcha-response'];
                $captcha = $this->input->post('g-recaptcha-response');
                $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");

                $arr = json_decode($rsp, TRUE); 
                if ($arr['success']) {  */
                    //ผ่านการตรวจสอบว่าเป็นคน
                    /* รับค่าตัวแปร */
                    $username = $this->input->post('user');
                    $password = $this->input->post('pass');
                    $check = $this->users->_checkUser($username, $password);
                    if ($check) { //ชื่อผู้ใช้รหัสถูกต้อง

                        /* วันที่ */
                        $today = date("d-m-Y ");
                        $todayExplode = explode("-", $today);
                        $yearThaiBank = $todayExplode[2] + 543; //ได้เป็นปีพ.ศ.
                        $curentDay = date("d/m") . "/" . $yearThaiBank; //วันที่ปัจจุบัน
                        /* .วันที่ */


                        $emSession = $this->users->_get_employee_session($username);
                        foreach ($emSession as $rowemSession) {
                            $resultEmSession['name'] = $rowemSession->em_name;
                            $resultEmSession['role'] = $rowemSession->em_role;
                            $resultEmSession['em_start_work'] = $rowemSession->em_start_work;
                            $resultEmSession['em_id'] = $rowemSession->em_id;
                        }
                        
                        $getPhoto = $this->users->_sel_photo($resultEmSession['em_id']);
                        if(!empty($getPhoto)){
                            if(file_exists("uploads/$getPhoto[file_path]")){
                                $emPhoto = "uploads/".$getPhoto['file_path'];
                            }else{
                                $emPhoto = 'dashboard/lte/dist/img/avatar5.png';
                                        
                            }
                        }else{
                            $emPhoto = 'dashboard/lte/dist/img/avatar5.png';
                        }
                        
                        

                        $dataEm = array(//ตัวแปร session
                            'username' => $username,
                            'logged' => TRUE,
                            'em_name' => $resultEmSession['name'],
                            'em_role' => $resultEmSession['role'],
                            'em_start' => $resultEmSession['em_start_work'],
                            'em_id' => $resultEmSession['em_id'],
                            'date_curent' => $curentDay,
                            'em_photo' => $emPhoto
                        );
                        $this->session->set_userdata($dataEm); //สร้างตัวแปร Session
                        redirect('login');
                    } else { //ชื่อผู้ใช้รหัสไม่ถูกต้อง
                        //redirect('login/sigin', 'refresh');
                        $this->load->view('template/incorect_user');
                    }
                } /*else {
                    echo 'SPAM';
                }*/
            /*} else {  //ไม่มีการกด recaptcha
                $this->load->view('template/404recaptcha');
            } *///ตรวจ recapthap  //เครดิต https://www.youtube.com/watch?v=pPITBtE45bg
        }//ตรวจกดปุ่ม login
    //}

    public function sigout() {
        $this->session->sess_destroy(); //ล้างค่าตัวแปร Session
        redirect('login/sigin', 'refresh'); //กลับไปหน้าล๊อกอิน
    }

}
