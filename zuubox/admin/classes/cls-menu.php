<?php

require_once("cls-connection.php");

class Menu extends Connection {

    public function __construct() {
        parent::__construct();
    }



    public function getmenu($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_aboutmenu', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertmenu($insert_data, $debug = 0) {

        $this->insertRow("tbl_aboutmenu", $insert_data, $debug);
    }

    public function deletemenu($condition = '', $debug = 0) {
        $this->deleteRow("tbl_aboutmenu", $condition, $debug);
    }

    public function updatemenu($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_aboutmenu", $update_data, $condition, $debug);
    }

}

?>