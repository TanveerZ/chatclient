<?php
error_reporting(1);
session_start();

        if ($_SERVER['HTTP_HOST'] == "localhost") {
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'codesevenstudio');
    //define('SITEPATH', 'http://zuubox.local/');
    define('SITEPATH', 'http://localhost/zubox/');
} else {

    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'zuuboxco_eli');
    define('DB_PASSWORD', 'Qawsed@123');
    define('DB_DATABASE', 'zuuboxco_DB');
    define('SITEPATH', 'https://zuubox.com/');
}
    
    /*define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'codesevenstudio');
	define('DB_PASSWORD', '@]VcC~+dKHYR');
	define('DB_DATABASE', 'codesevenstudio');
	define('SITEROOT', 'http://zuubox.com/');
	*/


// SET Time Zone
date_default_timezone_set('Asia/Kolkata');

abstract class Connection {

    private $mysql;
    public $row, $result;

    public function __construct() {
        try {
            $this->mysql = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('Oops connection error -> ' . mysqli_error());
            mysqli_select_db($this->mysql, DB_DATABASE) or die('Database error -> ' . mysqli_error());

        } catch (Exception $e) {
            echo "Error  in connection : " . $e->getMessage();
        }
    }

    public function db_connection() {
        $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die('Oops connection error -> ' . mysqli_error($connection));

        return $connection;
    }

    public function query($sql, $debug = 0) {
        if ($debug == 1) {
            die;
        }

        return $this->result = mysqli_query($this->db_connection(), $sql);

    }

    public function getRow() {
        if ($this->row = mysqli_fetch_assoc($this->result)) {
            return $this->row;
        }
        return false;
    }

    public function getRecords($table, $fields_string = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        if ($fields_string == '') {
            $fields_string = '*';
        }
        $sql = "";
        $sql.="select " . $fields_string . " from " . $table;

        if ($condition != "") {
            $sql.=" where " . $condition;

        }

        if ($order_by != "") {
            $sql.=" order by " . $order_by;
        }

        if ($limit != "") {
            $sql.=" limit " . $limit;
        }
        //echo $sql;
        $result_array = array();
        $this->result = $this->query($sql, $debug);

        while ($row = $this->getRow()) {
            $result_array[] = $row;
        }

        if ($debug == 2) {
            echo "<pre>";
            print_r($result_array);
            echo "</pre>";
            die;

        }

        return $result_array;
    }
    
    public function getDistRecords($table, $fields_string = '', $condition = '', $order_by = '', $limit = '', $debug = 0) {
        
        $sql = "";
        $sql.="select distinct(" . $fields_string . ") from " . $table;

        if ($condition != "") {
            $sql.=" where " . $condition;
        }

        if ($order_by != "") {
            $sql.=" order by " . $order_by;
        }

        if ($limit != "") {
            $sql.=" limit " . $limit;
        }
        $result_array = array();
        $this->result = $this->query($sql, $debug);

        while ($row = $this->getRow()) {
            $result_array[] = $row;
        }

        if ($debug == 2) {
            echo "<pre>";
            print_r($result_array);
            echo "</pre>";
            die;
        }

        return $result_array;
    }
    

    public function insertRow($table, $insert_data, $debug) {
        $value_string = '';
        $field_string = '';
        $sql = '';
        if (count($insert_data) > 0) {
            foreach ($insert_data as $field => $value) {
                if ($field_string == "") {
                    $field_string.="`" . $field . "`";
                } else {
                    $field_string.=",`" . $field . "`";
                }

                if ($value_string == "") {
                    $value_string.="'" . $value . "'";
                } else {
                    $value_string.=",'" . $value . "'";
                }
            }

            $sql.="insert into " . $table . " (" . $field_string . ") values(" . $value_string . ")";

            $this->query($sql, $debug) or die(mysqli_error());
            return $this->lastInsertId();

        }
    }

    public function lastInsertId() {
        return mysqli_insert_id($this->mysql);
    }

    public function updateRow($table, $update_data, $condition = '', $debug = 0) {
        $set_string = '';
        $sql = '';
        //echo "<pre>"; print_r($update_data); die();
        if (count($update_data) > 0) {
            foreach ($update_data as $key => $value) {
                if ($set_string == '') {
                    $set_string.="`" . $key . "`='" . $value . "'";
                } else {
                    $set_string.=",`" . $key . "`='" . $value . "'";
                }
            }

            $sql.="update " . $table . " set " . $set_string;

            if ($condition != "") {
                $sql.=" where " . $condition;
            }

            $this->query($sql, $debug) or die(mysqli_error());
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteRow($table, $condition = '', $debug = 0) {
        $sql = '';
        $sql.="delete from " . $table;

        if ($condition != "") {
            $sql.=" where " . $condition;
        }

        return $this->query($sql, $debug) or die(mysqli_error());
    }

    public function isEmpty($string) {
        if ($string != '' && trim($string) != "" && strlen($string) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isNumeric($string) {
        if (is_numeric($string)) {
            return true;
        } else {
            return false;
        }
    }

    public function isValidEmail($string) {
        if (!filter_var($string, FILTER_VALIDATE_EMAIL) === false) {
            return true;
        } else {
            return false;
        }
    }

    public function times_ago($pdate) {
        $ptime = strtotime($pdate);
        $etime = time() - $ptime;
        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(365 * 24 * 60 * 60 => 'year',
            30 * 24 * 60 * 60 => 'month',
            24 * 60 * 60 => 'day',
            60 * 60 => 'hour',
            60 => 'minute',
            1 => 'second'
        );
        $a_plural = array('year' => 'years',
            'month' => 'months',
            'day' => 'days',
            'hour' => 'hours',
            'minute' => 'minutes',
            'second' => 'seconds'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
            }
        }
    }

}

?>