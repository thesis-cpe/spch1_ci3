<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Daily_model
 *
 * @author Administrator
 */
class Daily_model extends CI_Model {

    function _sel_work_team_em($em_id) {
               $sqlSelWorkFromTeam = "SELECT *"
                . "FROM `team` JOIN project ON team.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id "
                . "WHERE team.em_id = '$em_id' AND project.project_status = 'เปิดโครงการ'";
    
       return $query = $this->db->query($sqlSelWorkFromTeam);
    }

}
