<?php
session_start();
require_once("classes/cls-admin.php");
$obj_admin = new Admin();
if ($_POST['btn_submit'] == 'Login') {

//base64_encode($_POST['password'])

    $condition = "email = '" . $_POST['email'] . "' AND password ='" . base64_encode($_POST['password']) . "'";
    //echo $condition;
    $admin_details = $obj_admin->getAdminDetails('', $condition, '', '', 0);
       //echo "<pre>"; print_r($admin_details); die();
    if (count($admin_details) > 0) {
        if ($_POST['remember'] == "on") {
            setcookie("css_uname", $_POST['email'], time() + 7200);
            setcookie("css_password", $_POST['password'], time() + 7200);
        }
        $admin_details = end($admin_details);
        $_SESSION['css_admin'] = $admin_details;
        header("location:index.php");
    } else {
        $_SESSION['error'] = "Invalid username or password.";
        header("location:login.php");
    
    }
}
?>