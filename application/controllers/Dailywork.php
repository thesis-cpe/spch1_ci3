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

            redirect('dailywork/dailywork2', 'refresh');  //ย้ายไป v2
            /*  foreach ($dataDate['team_data']->result() as $row){
              echo  $row->project_number;
              } */

            $this->load->view('daily_work_view', $dataDate);
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function dailywork2() {
        
         /* LOOP ใหญ่ เลือกโปรเจคจากทีม */
        $em_id = $this->session->userdata('em_id');
        $dataDate['team_data'] = $this->daily->_sel_work_team_em($em_id); //ได้ข้อมูลลูปใหญ่ ว่าอยู่ในทีมไหนบ้างรับผิดชอบรหัสงานไหนบ้าง
// $dataDate['daily_data'] = $this->daily->_sel_data_daily_sum($dataDate['team_data'],$em_id);
        $dataDate['dateSel'] = "";
        
       
        if ($this->input->post('btnSelDate') != "") {
            $dateselFromView = $this->input->post('datInWork');
            $dateExplodeFromView = explode('/', $dateselFromView);

            $yearthaiBank = $dateExplodeFromView[2] + 543;
            $dateBankFormat = $dateExplodeFromView[0] . "/" . $dateExplodeFromView[1] . "/" . $yearthaiBank;

            //$dataDate['dateSel'] = $this->input->post('btnSelDate');
            $dataDate['dateSel'] = $dateBankFormat;
            
            
             
             foreach ( $dataDate['team_data'] as $rowTeamdata){
                   
                   $DateSelDetial[] = $this->daily->sel_daily_datsel($em_id,$rowTeamdata['project_id'],$dataDate['dateSel']);
                   
             }
             $dataDate['DateSelDetial'] = $DateSelDetial;
             //print_r($DateSelDetial)."<br>";
             echo $dataDate['DateSelDetial'][0][1]['daily_id'];
            
             
        }/*/.ถ้ามีการเลือกวันที่*/
       $this->load->view('daily_work_view2', $dataDate);
    }

    public function insert_daily() {
        /// insert ตรงนี้เราต้องเพิ่มวันที่เข้ามา
        $startTime = $this->input->post('txtStartTime[]');
        $dataDaily = array(
            'daily_dat' => $this->input->post('hdfDateSelected'),
            'daily_start_time' => $this->input->post('txtStartTime[]'),
            'daily_end_time' => $this->input->post('txtEndTime[]'),
            'daily_use_time' => $this->input->post('txtUseTime[]'),
            'daily_rec_insert' => $this->input->post('txtCountRec[]'),
            'daily_note' => $this->input->post('areaNote[]'),
            'em_id' => $this->input->post('hdfEmID'),
            'project_id' => $this->input->post('hdfProId[]'),
            /* ที่เพิ่มเข้ามา 2 */
            'daily_start_time_min' => $this->input->post('txtStartTimeMin[]'),
            'daily_end_time_min' => $this->input->post('txtEndTimeMin[]')
        );
        $countProid = count($dataDaily['project_id']); //จำนวนอาเรย์ที่รับมา
        /* insert */ //$insertDaily = $this->daily->_insert_daily($dataDaily, $countProid);
        $insertDaily = $this->daily->_insert_daily2($dataDaily, $countProid);

        redirect('dailywork/dailywork2', 'refresh');
    }

}

//class
