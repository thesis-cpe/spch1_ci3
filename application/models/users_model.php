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

    function _insert_employee_file() { //ใส่รูปพนักงน
    }

    function _sel_employee_details() {
        $query = $this->db->get('employee')->result();
        return $query;
    }

    function _get_employee_session($username) {
        $query = $this->db->where('em_number', $username)
                ->get('employee')
                ->result();
        // $query = $this->db->get_where('employee', array('em_number' => $username))->result();
        return $query;
    }

    function _sel_em_by_id($id) {
        $query = $this->db->where('em_id', $id)
                        ->get('employee')->result();
        foreach ($query as $row) {

            $nameEx = explode(" ", $row->em_name);
            $nam = $nameEx[0];
            $firstName = $nameEx[1];
            $lastName = $nameEx[2];

            $dataRetrun = array(
                'nam' => $nam,
                'firstName' => $firstName,
                'lastName' => $lastName,
                'em_status' => $row->em_status,
                'em_role' => $row->em_role,
                'em_number' => $row->em_number,
                'em_audit_number' => $row->em_audit_number,
                'em_password' => $row->em_password,
                'em_nationn_id' => $row->em_nationn_id,
                'em_marie_status' => $row->em_marie_status,
                'em_addr' => $row->em_addr,
                'em_addr_curent' => $row->em_addr_curent,
                'em_tel' => $row->em_tel,
                'em_mail' => $row->em_mail,
                'em_friend_name' => $row->em_friend_name,
                'em_friend_tel' => $row->em_friend_tel,
                'em_level' => $row->em_level,
                'em_major' => $row->em_major,
                'em_gpa' => $row->em_gpa,
                'em_insutution' => $row->em_insutution,
                'em_start_work' => $row->em_start_work,
                'em_salary_rate' => $row->em_salary_rate,
                'em_salary_day' => $row->em_salary_day,
                'em_day_work' => $row->em_day_work,
                'em_benefit' => $row->em_benefit,
                'em_note' => $row->em_note,
            );
        }

        return $dataRetrun;
    }

}
