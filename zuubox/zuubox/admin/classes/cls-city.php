<?php

require_once("cls-connection.php");

class City extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getcity($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_city', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertcity($insert_data, $debug = 0) {
        return $this->insertRow("tbl_city", $insert_data, $debug);
    }

    public function deletecity($condition = '', $debug = 0) {
        $this->deleteRow("tbl_city", $condition, $debug);
    }

    public function updatecity($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_city", $update_data, $condition, $debug);
    }

 public function getcountry($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_country', $fields, $condition, $order_by, $limit, $debug);
    }
    
}

?>