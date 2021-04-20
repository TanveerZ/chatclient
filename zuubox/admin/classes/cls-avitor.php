<?php

require_once("cls-connection.php");

class Avitor extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getavitor($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_avitor', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertavitor($insert_data, $debug = 0) {

        $this->insertRow("tbl_avitor", $insert_data, $debug);
    }

    public function deleteavitor($condition = '', $debug = 0) {
        $this->deleteRow("tbl_avitor", $condition, $debug);
    }

    public function updateavitor($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_avitor", $update_data, $condition, $debug);
    }

}

?>