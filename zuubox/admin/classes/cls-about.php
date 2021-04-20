<?php

require_once("cls-connection.php");

class About extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getabout($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_about', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertabout($insert_data, $debug = 0) {

        $this->insertRow("tbl_about", $insert_data, $debug);
    }

    public function deleteabout($condition = '', $debug = 0) {
        $this->deleteRow("tbl_about", $condition, $debug);
    }

    public function updateabout($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_about", $update_data, $condition, $debug);
    }

}

?>