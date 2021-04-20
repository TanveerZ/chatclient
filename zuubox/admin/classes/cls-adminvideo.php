<?php

require_once("cls-connection.php");

class Adminvideo extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getadminvideo($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_adminvideo', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertadminvideo($insert_data, $debug = 0) {
        $this->insertRow("tbl_adminvideo", $insert_data, $debug);
    }

    public function deleteadminvideo($condition = '', $debug = 0) {
        $this->deleteRow("tbl_adminvideo", $condition, $debug);
    }

    public function updateadminvideo($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_adminvideo", $update_data, $condition, $debug);
    }

}

?>