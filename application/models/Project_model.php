<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Project_model
 *
 * @author Administrator
 */
class Project_model extends CI_Model {

    public function _sel_project($customer_id) {
        $query = $this->db->where('customer_id', $customer_id)
                ->get('project')
                ->result();
        return $query;
    }

    public function _add_project($curentYearSub, $customer_id, $customer_tax_id) {
        //สร้างรหัสงานใหม่
        $sql = "SELECT MAX(project_number) AS max_project_id FROM project WHERE customer_id = '$customer_id' AND project_year LIKE '%$curentYearSub'";
        $query = $this->db->query($sql)->result();
        foreach ($query as $row) {
            $maxProId = $row->max_project_id; //จะได้หมายเลขโปรเจคของลูกค้าที่ล่าสุด
        }
        $maxProIdExPlode = (explode("-", $maxProId));
        $sizemaxProIdExPlode = sizeof($maxProIdExPlode) - 1; //เอาอาเรย์ตัวสุดท้าย
        $maxOfProIdExPlode = $maxProIdExPlode[$sizemaxProIdExPlode];
        $maxOfProIdExPlodeAdd1 = $maxOfProIdExPlode + 1;
        return $newProNumber = $curentYearSub . "-" . $customer_tax_id . "-" . $maxOfProIdExPlodeAdd1;
    }

    public function _update_project($project_id) {
        
    }

    public function _del_project($project_id) {
        
    }

    public function _insert_project($project_id) {
        
    }

}
