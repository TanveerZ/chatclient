<?php

require_once("cls-connection.php");

class Artical extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getartical($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_artical', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertartical($insert_data, $debug = 0) {

        $this->insertRow("tbl_artical", $insert_data, $debug);
    }

    public function deleteartical($condition = '', $debug = 0) {
        $this->deleteRow("tbl_artical", $condition, $debug);
    }

    public function updateartical($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_artical", $update_data, $condition, $debug);
    }

}

?>