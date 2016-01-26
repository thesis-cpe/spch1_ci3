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
        $this->load->model('Report_model', 'report');
        $this->load->model('users_model', 'users');
    }

    public function index() {
        if ($this->session->userdata('logged')) {
            //ใส่ code ส่วนนี้
            redirect('report/customer', 'refresh');
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function customer() {

        if ($this->session->userdata('logged')) {

            $data['proNumber'] = $this->report->_sel_pro_num();
            $data['customerName'] = $this->report->_sel_customer_name();
            /* POST ค่า */
            if ($this->input->post('selProjectNumber') || $this->input->post('selCustomerName') || $this->input->post('selYear') != "") {
                $dataToSearchL1 = array(
                    'selProjectNumber' => $this->input->post('selProjectNumber'),
                    'selCustomerName' => $this->input->post('selCustomerName'),
                    'selYear' => $this->input->post('selYear')
                );
                /* เก็บ post $dataToSearchL1 */ $data['dataToSearchL1'] = $dataToSearchL1;

                $data['searhL1'] = $this->report->_search_L1($dataToSearchL1);

                $data['searhL2'] = $this->report->_search_L2($dataToSearchL1); //อาจมี bug L2

                if (!empty($data['searhL2'])) {  //ถ้า L2 ไม่คืนค่ากลับมาเป็นค่าว่าง
                    foreach ($data['searhL2'] as $row) {  //อาจมี bug //วนลูป2
                        $dailyRecInsert[] = $row['daily_rec_insert']; //rec วันนี้
                        $dailyNoteInsert[] = $row['daily_note']; //โน้ตวันนี้ อนาคตเปลี่ยนเป็นที่มีล่าสุด
                    }

                    $data['dailyRecInsert'] = $dailyRecInsert;
                    $data['dailyNoteInsert'] = $dailyNoteInsert;


                    //L3
                    foreach ($data['searhL1'] as $rowL1) {
                        $emInTeam[] = $rowL1['em_id'];  //em_id ในทีมที่ถูกเลือก
                    }
                    $cuontEmId = count($emInTeam);
                    $data['search3'] = $this->report->_search_L3($dataToSearchL1, $emInTeam, $cuontEmId); //L3
                    for ($iii = 0; $iii < $cuontEmId; $iii++) {
                        foreach ($data['search3'][$iii] as $rowL3) {
                            $search3IntTime[] = $rowL3['team_hour'];
                        }
                    }
                    $data['searchIntTime'] = $search3IntTime;
                }


                $this->load->view('report_customer_view2', $data); //set ตัวแปร
            } else {
                $this->load->view('report_customer_view2_before', $data);
            }
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function employee() {

        if ($this->session->userdata('logged')) {
            $emName = $this->users->_sel_employee_details();
            //ตรวจการคลิกปุ่มค้นหาและดูค่าฟิวที่ส่งมา
            if ($this->input->post('txtEmName') || $this->input->post('selProjectStatus') || $this->input->post('selYear') != "") {
                /* หา loop1 */ $reportL1 = $this->report->_sel_em_L1($this->input->post('txtEmName'), $this->input->post('selProjectStatus'), $this->input->post('selYear'));
                /*หา loop 2 */ $reportL2 = $this->report->_sel_em_L2($this->input->post('txtEmName'), $this->input->post('selProjectStatus'), $this->input->post('selYear'));
                /*หา loop 3 */ $reportL3 = $this->report->_sel_em_L3($this->input->post('txtEmName'), $this->input->post('selProjectStatus'), $this->input->post('selYear'));
                //print_r($reportL3);
                $data = array(
                    'emName' => $emName,
                    'reportL1' => $reportL1,
                    'reportL2' => $reportL2,
                    'reportL3' => $reportL3,
                    'emId' => $this->input->post('txtEmName')
                );
                $this->load->view('report_employee_view2', $data);
            }else{
                 $data = array(
                    'emName' => $emName,
                   
                );
                $this->load->view('report_employee_view2_before',$data);
                
            } /*หากไม่มีการกดปุ่มค้นหา*/
        } else {
            $this->load->view('template/404anime');
        }
    }

    public function record($em_id , $project_id) {  //เรคคอร์ดย่อย
        $data['argument'] = array(
            //'em_number' => $em_number,
            'em_id' => $em_id,
            //'em_name' => $em_name,
            //project_number' => $project_number,
            'project_id' => $project_id
        );

        $data['customer_pro_details'] = $this->report->_sel_pro_customer_detail($data['argument']);
        //print_r($data['customer_pro_details']);

        $this->load->view('customer_rec_detail_view', $data);
    }

    public function cheked($check, $id) {
        $this->report->_checker_daily($check, $id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

}
