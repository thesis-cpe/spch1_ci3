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

        $query = $this->db->query($sqlSelWorkFromTeam);
        $result = $query->result_array();
        return $result;
    }

    function _sel_data_daily_sum($team_data, $em_id) {
        $sqlSelWorkFromTeam = "SELECT *"
                . "FROM `team` JOIN project ON team.project_id = project.project_id JOIN customer ON project.customer_id = customer.customer_id "
                . "WHERE team.em_id = '$em_id' AND project.project_status = 'เปิดโครงการ'";

        $query = $this->db->query($sqlSelWorkFromTeam);
        $result = $query->result_array();
        foreach ($result as $rowquery) {

            $rows[] = $rowquery['project_id'];
        }
        return $rows;
    }

    function _insert_daily($dataDaily, $countProid) {
        $dataToSql = array(
            'daily_dat' => $dataDaily['daily_dat'],
            'daily_start_time' => $dataDaily['daily_start_time'],
            'daily_end_time' => $dataDaily['daily_end_time'],
            'daily_use_time' => $dataDaily['daily_use_time'],
            'daily_rec_insert' => $dataDaily['daily_rec_insert'],
            'daily_note' => $dataDaily['daily_note'],
            'em_id' => $dataDaily['em_id'],
            'project_id' => $dataDaily['project_id'],
        );

        for ($i = 0; $i < $countProid; $i++) {
            $query = $this->db->set('daily_dat', $dataToSql['daily_dat'])
                    ->set('daily_start_time', $dataToSql['daily_start_time'][$i])
                    ->set('daily_end_time', $dataToSql['daily_end_time'][$i])
                    ->set('daily_use_time', $dataToSql['daily_use_time'][$i])
                    ->set('daily_rec_insert', $dataToSql['daily_rec_insert'][$i])
                    ->set('daily_note', $dataToSql['daily_note'][$i])
                    ->set('em_id', $dataToSql['em_id'])
                    ->set('project_id', $dataToSql['project_id'][$i])
                    ->insert('daily');
        }
    }

}
