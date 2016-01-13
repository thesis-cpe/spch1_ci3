<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function _checkUser($username, $password) { //ตรวจสอบชื่อผู้ใช้งานและรหัสผ่าน
        $passwordSecret = $password . "bmpkobroTN";

        $result = $this->db->where('em_number', $username)
                ->where('em_password', md5($passwordSecret)) //ต้องเพิ่ม ;bmpkobroTN ต่อท้าย
                ->count_all_results('employee');
        return $result > 0 ? TRUE : FALSE;
    }

    function _insert_em($txtName, $txtEmName, $txtEmlastName, $selStatus, $selRole, $txtEmId, $txtAuditId, $txtPassword, $txtNationId, $selMarieStatus, $txtareaAddr1, $txtareaAddr2, $txtTel, $txtEmail, $txtNameFriend, $txtTelFriend, $selGaduLevel, $txtMajor, $txtGpa, $txtInstitute, $datInWork, $txtCoast, $txtRateCoast, $txtWorkDay, $txtareaCondition, $txtareaMark) {

        $txtPasswordSecret = $txtPassword . "bmpkobroTN"; //ต่อสตริง

        $dataEmployee = array(
            'em_name' => "$txtName" . " $txtEmName" . " $txtEmlastName",
            'em_status' => "$selStatus",
            'em_role' => "$selRole",
            'em_number' => "$txtEmId",
            'em_audit_number' => "$txtAuditId",
            'em_password' => md5($txtPasswordSecret),
            'em_nationn_id' => "$txtNationId",
            'em_marie_status' => "$selMarieStatus",
            'em_addr' => "$txtareaAddr1",
            'em_addr_curent' => "$txtareaAddr2",
            'em_tel' => "$txtTel",
            'em_mail' => "$txtEmail",
            'em_friend_name' => "$txtNameFriend",
            'em_friend_tel' => "$txtTelFriend",
            'em_level' => "$selGaduLevel",
            'em_major' => "$txtMajor",
            'em_gpa' => "$txtGpa",
            'em_insutution' => "$txtInstitute",
            'em_start_work' => "$datInWork",
            'em_salary_rate' => "$txtCoast",
            'em_salary_day' => "$txtRateCoast",
            'em_day_work' => "$txtWorkDay",
            'em_benefit' => "$txtareaCondition",
            'em_note' => "$txtareaMark"
        );
        $this->db->insert('employee', $dataEmployee);
    }

    function _insert_employee_file() {
        
    }

    function _sel_customer_details($username) {///ค้างไว้ยังไม่สมบูรณ์
        $case = array('em_number' => $username);
        $query = $this->db->get_where('employee', $case)->result();

        foreach ($query as $rows) {
            $datarow['name'] = $rows->em_name;
           /* $datarow['em_status'] = $rows['em_status'];
            $datarow['em_role'] = $rows['em_role'];
            $datarow['em_start_work'] = $rows['em_start_work']; */
        }

        return $datarow;
    }

}
