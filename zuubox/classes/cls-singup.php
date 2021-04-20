<?php

require_once("admin/classes/cls-connection.php");

class Singup extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getcell($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_cell', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertCell($insert_data, $debug = 0) {

        $this->insertRow("tbl_singup", $insert_data, $debug);
    }

    public function deleteBack($condition = '', $debug = 0) {
        $this->deleteRow("tbl_cell", $condition, $debug);
    }

    public function updateBack($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_cell", $update_data, $condition, $debug);
    }

}

?>