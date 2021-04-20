<?php
require_once("classes/cls-admin.php");
$obj_admin = new Admin();

if (isset($_POST['email']) && $_POST['email'] != "") 
{
    $condition = "email = '" . $_POST['email'] . "'";
    $admin_details = $obj_admin->getAdminDetails('', $condition, '', '', 0);
    if (count($admin_details) > 0) 
    {
        $admin_detail = end($admin_details);
        $host = $_SERVER['HTTP_HOST'];
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: CodeSevenStudio <noreply@$host>\n";

        $message = "<html>
                <head>
                <title>Forgot Password - CodeSevenStudio</title>
                </head>
                <body>
                <div  style='width:auto; height:405px; padding-left:25px'>
                    <div>
                        <p>Hello " . $admin_detail['uname'] . ",</p>
                        <p>We have received your request that you have forgotten your password on <strong>CodeSevenStudio</strong></p>
                        <br>
                        <p>Please see below your username and password of your account.</p>
                        <p><strong>Email Id</strong> : " . $admin_detail['email'] . "</p>
                        <p><strong>Password</strong> : " . base64_decode($admin_detail['password']) . "</p>
                        <br>
                        <p> Thank You!</p>
                        <p> CodeSevenStudio</p>
                    </div>
                </div>
                </body>
                </html>";

        $to = trim($_POST['email']);
        //$to = "mike111taylor@gmail.com";
        $subject = "Forgot Password - CodeSevenStudio";

        $mailsent = mail($to, $subject, $message, $headers);
        $_SESSION['success'] = "<strong>Congratulations</strong> Username and Password has been sent to your Mail id";
        header("location:forgot-password.php");
    } else {
        $_SESSION['error'] = "<strong>Sorry</strong> Provided email id does not exists";
        header("location:forgot-password.php");
    }
} else {
    $_SESSION['error'] = "<strong>Sorry</strong> Please enter the Email Id";
    header("location:forgot-password.php");
}
?>