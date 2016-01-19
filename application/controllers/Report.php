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
                $data['searhL1'] = $this->report->_search_L1($dataToSearchL1);
                $data['searhL2'] = $this->report->_search_L2($dataToSearchL1); //อาจมี bug L2







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
                        $search3IntTime[] =  $rowL3['team_hour'];
                    }
                }
                $data['searchIntTime'] =  $search3IntTime;
                //print_r($data['searchIntTime'] );
                //echo  $data['dailyRecInsert'][1];
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
            $this->load->view('report_employee_view2');
        } else {
            $this->load->view('template/404anime');
        }
    }

}
