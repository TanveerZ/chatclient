<?php

require_once("cls-connection.php");

class Cellsection extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getcellsection($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_celldetails', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertcellsection($insert_data, $debug = 0) {
        return $this->insertRow("tbl_celldetails", $insert_data, $debug);
    }

    public function deletecellsection($condition = '', $debug = 0) {
        $this->deleteRow("tbl_celldetails", $condition, $debug);
    }

    public function updatecellsection($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("tbl_celldetails", $update_data, $condition, $debug);
    }


    public function getcell($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('tbl_cell', $fields, $condition, $order_by, $limit, $debug);
    }
    
}

?>