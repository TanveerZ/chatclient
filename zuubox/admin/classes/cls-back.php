<?php

require_once("cls-connection.php");

class Back extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getBackDetails($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_back', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertBack($insert_data, $debug = 0) {
        $this->insertRow("tbl_back", $insert_data, $debug);
    }

    public function deleteBack($condition = '', $debug = 0) {
        $this->deleteRow("tbl_back", $condition, $debug);
    }

    public function updateBack($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_back", $update_data, $condition, $debug);
    }

}

?>