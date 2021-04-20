<?php

require_once("cls-connection.php");

class Event extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getevent($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_adminevent', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertevent($insert_data, $debug = 0) {

        $this->insertRow("tbl_adminevent", $insert_data, $debug);
    }

    public function deleteevent($condition = '', $debug = 0) {
        $this->deleteRow("tbl_adminevent", $condition, $debug);
    }

    public function updateevent($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_adminevent", $update_data, $condition, $debug);
    }

}

?>