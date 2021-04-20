<?php

require_once("cls-connection.php");

class Country extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getcountry($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_country', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertcountry($insert_data, $debug = 0) {
        return $this->insertRow("tbl_country", $insert_data, $debug);
    }

    public function deletecountry($condition = '', $debug = 0) {
        $this->deleteRow("tbl_country", $condition, $debug);
    }

    public function updatecountry($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_country", $update_data, $condition, $debug);
    }


    
}

?>