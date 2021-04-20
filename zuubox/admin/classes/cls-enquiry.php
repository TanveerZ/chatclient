<?php

require_once("cls-connection.php");

class Enquiry extends Connection {

    public function __construct() {
        parent::__construct();
    }

    public function getEnquiryDetails($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getRecords('enquiry', $fields, $condition, $order_by, $limit, $debug);
    }

    public function insertEnquiry($insert_data, $debug = 0) {
        return $this->insertRow("enquiry", $insert_data, $debug);
    }

    public function deleteEnquiry($condition = '', $debug = 0) {
        $this->deleteRow("enquiry", $condition, $debug);
    }

    public function updateEnquiry($update_data, $condition = '', $debug = 0) {
        return $this->updateRow("enquiry", $update_data, $condition, $debug);
    }

    public function getDistEnquiryDetails($fields = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        return $this->getDistRecords('enquiry', $fields, $condition, $order_by, $limit, $debug);
    }
}

?>