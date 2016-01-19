<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report_model
 *
 * @author Veriton
 */
class Report_model extends CI_Model {

    public function _sel_pro_num() {
        $em_id = $this->session->userdata('em_id');
        if ($this->session->userdata('em_role') == "ผู้ดูแลระบบ") {
            $sqlSelProjectNumber = "SELECT * FROM project";
        } else {
            $sqlSelProjectNumber = "SELECT  * FROM `team` JOIN project ON team.project_id = project.project_id WHERE em_id = '$em_id'";
        }

        $query = $this->db->query($sqlSelProjectNumber);
        $res = $query->result_array();

        return $res;
    }

    public function _sel_customer_name() {
        $em_id = $this->session->userdata('em_id');

        if ($this->session->userdata('em_role') == "ผู้ดูแลระบบ") {
            $sqlSelCustomerName = "SELECT * FROM customer";
        } else {
            $sqlSelCustomerName = "SELECT * FROM `team` JOIN project ON team.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id WHERE em_id = '$em_id' GROUP BY(customer_name)";
        }
        $query = $this->db->query($sqlSelCustomerName);
        $res = $query->result_array();

        return $res;
    }

    public function _search_L1($dataL1) { //หาในทีมรหัสงาน
        $sqlSerhL1 = "SELECT daily.project_id AS project_id, employee.em_id AS em_id, project.project_number AS project_number, SUM(daily_use_time) AS sum_use_time, em_number, em_name, employee.em_id AS employee_id, SUM(daily.daily_rec_insert) AS sum_rec FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id";

        if (!empty($dataL1['selProjectNumber'])) {
            $sqlSerhL1 = $sqlSerhL1 . " AND project.project_id = '$dataL1[selProjectNumber]'";
        }
        if (!empty($dataL1['selCustomerName'])) {
            $sqlSerhL1 = $sqlSerhL1 . " AND customer.customer_id = '$dataL1[selCustomerName]'";
        }
        if (!empty($dataL1['selYear'])) {
            $sqlSerhL1 = $sqlSerhL1 . " AND project.project_year = '$dataL1[selYear]'";
        }
        $sqlSerhL1 = $sqlSerhL1 . " GROUP BY(daily.em_id)";
        $query = $this->db->query($sqlSerhL1);
        $res = $query->result_array();
        return $res;
    }

    public function _search_L2($dataL1) { //หาบันทึกวันนี้
        $date = $this->session->userdata('date_curent'); //วันที่
        $em_id = $this->session->userdata('em_id');
        /* if($this->session->userdata('em_role') == "ผู้ดูแลระบบ"){
          $sqlSelRecToday = "SELECT * FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id AND daily.daily_dat = '$date'";
          }else{
          $sqlSelRecToday = "SELECT * FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id AND daily.em_id = '$em_id' AND daily.daily_dat = '$date'";
          } */
        $sqlSelRecToday = "SELECT * FROM `daily` JOIN employee ON daily.em_id = employee.em_id JOIN project ON daily.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id AND daily.daily_dat = '$date'";

        if (!empty($dataL1['selProjectNumber'])) {
            $sqlSelRecToday = $sqlSelRecToday . " AND project.project_id = '$dataL1[selProjectNumber]'";
        }
        if (!empty($dataL1['selCustomerName'])) {
            $sqlSelRecToday = $sqlSelRecToday . " AND customer.customer_id = '$dataL1[selCustomerName]'";
        }
        if (!empty($dataL1['selYear'])) {
            $sqlSelRecToday = $sqlSelRecToday . " AND project.project_year = '$dataL1[selYear]'";
        }

        //return $sqlSelRecToday; 
        $query = $this->db->query($sqlSelRecToday);
        $res = $query->result_array();
        return $res;
    }

    public function _search_L3($dataL1, $em_id, $cuontEmId) { //หาในทีมเรียกโปรเจคตั้งต้น
        $sqlSelProjectTime = "SELECT SUM(team_hour) AS team_hour FROM `team`JOIN project ON team.project_id = project.project_id";
        if (!empty($dataL1['selProjectNumber'])) {
            $sqlSelProjectTime = $sqlSelProjectTime . " AND project.project_id = '$dataL1[selProjectNumber]'";
        }
        if (!empty($dataL1['selCustomerName'])) {
            $sqlSelProjectTime = $sqlSelProjectTime . " AND project.customer_id = '$dataL1[selCustomerName]'";
        }
        if (!empty($dataL1['selYear'])) {
            $sqlSelProjectTime = $sqlSelProjectTime . " AND project.project_year = '$dataL1[selYear]'";
        }

        for ($i = 0; $i < $cuontEmId; $i++) {
            //$sqlSelProjectTime2 = "";
            $sqlSelProjectTime2 = $sqlSelProjectTime . " AND team.em_id = '$em_id[$i]'";
            $query = $this->db->query($sqlSelProjectTime2);
            $res[] = $query->result_array();
        }
        return $res;
    }

    public function _sel_pro_customer_detail($data) {
        $query = $this->db->where('em_id', $data['em_id'])
                        ->where('project_id', $data['project_id'])
                        ->get('daily')->result();
        return $query;
    }

}
