<?php

require_once("cls-connection.php");

class Place extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getplace($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_places', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertplace($insert_data, $debug = 0) {

        $this->insertRow("tbl_places", $insert_data, $debug);
    }

    public function deleteplace($condition = '', $debug = 0) {
        $this->deleteRow("tbl_places", $condition, $debug);
    }

    public function updateplace($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_places", $update_data, $condition, $debug);
    }

}

?>