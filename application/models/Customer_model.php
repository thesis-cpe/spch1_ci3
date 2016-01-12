<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer_model
 *
 * @author Administrator
 */
class Customer_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function _insert_customer($customer) {
        $dataCustomer = array(
            'customer_name' => $customer['txtCusname'],
            'customer_status' => $customer['selCusStatus'],
            'customer_tax_id' => $customer['txtNumTax'],
            'customer_band_id' => $customer['txtNumBand'],
            'customer_addr_th' => $customer['txtAddrTh'],
            'customer_addr_en' => $customer['txtAddrEn'],
            'customer_tel' => $customer['txtCusTel'],
            'customer_fax' => $customer['txtCusFax'],
            'customer_web' => $customer['txtCusWeb'],
            'customer_mail' => $customer['txtCusMail'],
            'customer_condition' => $customer['txtConditionNam'],
            'customer_coor_name' => $customer['txtContractName'],
            'customer_coor_tel' => $customer['txtContractTel'],
            'customer_coor_mail' => $customer['txtContractMail'],
            'customer_lat' => $customer['txtLat'],
            'customer_long' => $customer['txtLong'],
            'customer_note' => $customer['txtCustomerMark']
        );



        $this->db->insert('customer', $dataCustomer);
    }

    public function _sel_customer_id($tax_number) {

        $query = $this->db->select('customer_id')
                        ->where('customer_tax_id', $tax_number)
                        ->get('customer')->result();

        foreach ($query as $row) {
            $customerId = $row->customer_id;
        }

        return $customerId;
    }

    public function _insert_sign($customer, $customer_id, $count) {
        $dataConditionSign = array(
            'txtNameCon' => $customer['txtNameCon'], /* อาเรย์ข้างใน */
            'selStatusCondition' => $customer['selStatusCondition'] /* อาเรย์ข้างใน */
        );

        for ($i = 0; $i < $count; $i++) { //วนนำข้อมูลเข้า
            // $dataConditionSign['txtNameCon']['$i'];
            //$dataConditionSign['selStatusCondition']['$i'];
            $query = $this->db->set('sing_name', $dataConditionSign['txtNameCon'][$i])
                    ->set('sign_status', $dataConditionSign['selStatusCondition'][$i])
                    ->set('customer_id', $customer_id)
                    ->insert('sign');
        }
    }

}
