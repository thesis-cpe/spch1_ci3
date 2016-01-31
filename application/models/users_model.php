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

    function _insert_file($file_name, $emId) { //ใส่รูปพนักงาน
        $data = array(
            'file_path' => $file_name,
            'em_id' => $emId
        );
        $this->db->insert('file', $data);
    }

    function _sel_emid_by_em_number($em_number) {
        $query = $this->db->where('em_number', $em_number)
                        ->get('employee')->result();
        foreach ($query as $row) {
            $emId = $row->em_id;
        }

        return $emId;
    }

    function _chang_pass($data) {
        $txtPasswordSecret = $data['pass'] . "bmpkobroTN";
        $dataUpdate = array(
            'em_password' => md5($txtPasswordSecret)
        );
        $this->db->where('em_id', $data['em_id']);
        $this->db->update('employee', $dataUpdate);

        header('Location: ' . $_SERVER['HTTP_REFERER']); //กลับก่อนหน้า
    }

    function _update_em_detail($data) {


        if ($this->session->userdata('em_role') == "ผู้ใช้งาน") {
            $dataEmployee = array(
                'em_name' => "$data[txtName]" . " $data[txtEmName]" . " $data[txtEmlastName]",
                //'em_status' => $data['selStatus'],
                //'em_role' => $data['selRole'],
                //'em_number' => $data['txtEmId'],
                // 'em_audit_number' => $data['txtAuditId'],
                'em_nationn_id' => $data['txtNationId'],
                'em_marie_status' => $data['selMarieStatus'],
                'em_addr' => $data['txtareaAddr1'],
                'em_addr_curent' => $data['txtareaAddr2'],
                'em_tel' => $data['txtTel'],
                'em_mail' => $data['txtEmail'],
                'em_friend_name' => $data['txtNameFriend'],
                'em_friend_tel' => $data['txtTelFriend'],
                'em_level' => $data['selGaduLevel'],
                'em_major' => $data['txtMajor'],
                'em_gpa' => $data['txtGpa'],
                'em_insutution' => $data['txtInstitute']
                    //'em_start_work' => $data['datInWork'],
                    //'em_salary_rate' => $data['txtCoast'],
                    //'em_salary_day' => $data['txtRateCoast'],
                    //'em_day_work' => $data['txtWorkDay'],
                    //'em_benefit' => $data['txtareaCondition'],
                    // 'em_note' => $data['txtareaMark']
            );
        } elseif ($this->session->userdata('em_role') == "ผู้ดูแลระบบ") {
            $dataEmployee = array(
                'em_name' => "$data[txtName]" . " $data[txtEmName]" . " $data[txtEmlastName]",
                'em_status' => $data['selStatus'],
                'em_role' => $data['selRole'],
                'em_number' => $data['txtEmId'],
                'em_audit_number' => $data['txtAuditId'],
                'em_nationn_id' => $data['txtNationId'],
                'em_marie_status' => $data['selMarieStatus'],
                'em_addr' => $data['txtareaAddr1'],
                'em_addr_curent' => $data['txtareaAddr2'],
                'em_tel' => $data['txtTel'],
                'em_mail' => $data['txtEmail'],
                'em_friend_name' => $data['txtNameFriend'],
                'em_friend_tel' => $data['txtTelFriend'],
                'em_level' => $data['selGaduLevel'],
                'em_major' => $data['txtMajor'],
                'em_gpa' => $data['txtGpa'],
                'em_insutution' => $data['txtInstitute'],
                'em_start_work' => $data['datInWork'],
                'em_salary_rate' => $data['txtCoast'],
                'em_salary_day' => $data['txtRateCoast'],
                'em_day_work' => $data['txtWorkDay'],
                'em_benefit' => $data['txtareaCondition'],
                'em_note' => $data['txtareaMark']
            );
        }

        $this->db->where('em_id', $data['em_id']);
        $this->db->update('employee', $dataEmployee);
    }

    function _sel_photo($emId) {
        $query = $this->db->where('em_id', $emId)
                        ->get('file')->result();
        foreach ($query as $row){
            $dataRe = array(
                'file_id' => $row->file_id,
                'file_path' => $row->file_path
            );
        }
        return $dataRe;
    }
    
    function _update_photo($file_id,$file_path){
        $dataUp = array(
            'file_path' => $file_path
        );
        $this->db->where('file_id',$file_id);
        $this->db->update('file',$dataUp);
    }
    
    public function _del_em_cascade($emId){
        $this->db->where('em_id',$emId);
        $this->db->delete('employee');
    }

}
