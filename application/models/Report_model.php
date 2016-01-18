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

}
