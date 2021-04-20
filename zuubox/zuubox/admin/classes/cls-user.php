<?php

require_once("cls-connection.php");

class User extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getuser($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_singup', $fields, $condition, $order_by, $limit, $debug);
    } 

    public function deleteuser($condition = '', $debug = 0) {
        $this->deleteRow("tbl_singup", $condition, $debug);
    }
    public function updateuser($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_singup", $update_data, $condition, $debug);
    }

}

?>