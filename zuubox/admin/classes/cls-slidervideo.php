<?php

require_once("cls-connection.php");

class Slidervideo extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getslidervideo($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_slidervideo', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertslidervideo($insert_data, $debug = 0) {
        $this->insertRow("tbl_slidervideo", $insert_data, $debug);
    }

    public function deleteslidervideo($condition = '', $debug = 0) {
        $this->deleteRow("tbl_slidervideo", $condition, $debug);
    }

    public function updateslidervideo($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_slidervideo", $update_data, $condition, $debug);
    }

}

?>