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

    public function _add_project($customer_id) {
        
    }

    public function _update_project($project_id) {
        
    }

    public function _del_project($project_id) {
        
    }

}
