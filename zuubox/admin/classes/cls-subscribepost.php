<?php

require_once("cls-connection.php");

class Subscribepost extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getsubpost($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_subscriberpost', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertsubpost($insert_data, $debug = 0) {

        $this->insertRow("tbl_subscriberpost", $insert_data, $debug);
    }

    public function deletesubpost($condition = '', $debug = 0) {
        $this->deleteRow("tbl_subscriberpost", $condition, $debug);
    }

    public function updatesubpost($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_subscriberpost", $update_data, $condition, $debug);
    }

}

?>