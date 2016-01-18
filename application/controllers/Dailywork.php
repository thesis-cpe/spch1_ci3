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

        $this->load->model('Daily_model', 'daily');
    }

    public function index() {

        if ($this->session->userdata('logged')) {

            $dataDate['dateSel'] = "";
            if ($this->input->post('btnSelDate') != "") {
                $dataDate['dateSel'] = $this->input->post('datInWork');
            }
            /* LOOP ใหญ่ เลือกโปรเจคจากทีม */
            
            $em_id = $this->session->userdata('em_id');

            $dataDate['team_data'] = $this->daily->_sel_work_team_em($em_id); //ได้ข้อมูลลูปใหญ่ ว่าอยู่ในทีมไหนบ้างรับผิดชอบรหัสงานไหนบ้าง
            
            
          /*  foreach ($dataDate['team_data']->result() as $row){
               echo  $row->project_number;
            } */
            
                $this->load->view('daily_work_view', $dataDate);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function insert_daily() {
        
    }
    
    public function dailywork_test(){
        
          $dataDate['dateSel'] = "";
            if ($this->input->post('btnSelDate') != "") {
                $dataDate['dateSel'] = $this->input->post('datInWork');
            }
            /* LOOP ใหญ่ เลือกโปรเจคจากทีม */
            
            $em_id = $this->session->userdata('em_id');

            $dataDate['team_data'] = $this->daily->_sel_work_team_em($em_id); //ได้ข้อมูลลูปใหญ่ ว่าอยู่ในทีมไหนบ้างรับผิดชอบรหัสงานไหนบ้าง
           // $dataDate['daily_data'] = $this->daily->_sel_data_daily_sum($dataDate['team_data'],$em_id);
           
            
            
            
            
                $this->load->view('daily_work_view2', $dataDate);
    }

}
