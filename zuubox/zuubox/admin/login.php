<?php session_start(); ?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">

        <meta name="author" content="">

        <title>Cs | Admin Panel</title>

        <!-- Bootstrap Core CSS -->

        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->

        <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->

        <link href="dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->

        <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

                <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

                <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

            <![endif]-->

    </head>

    <body>

        <div class="container">

            <div class="row">

                <div class="col-md-4 col-md-offset-4">

                    <h3 class="page-header text-center"><small>Cs</small> <br>Admin Panel</h3>

                    <?php if (isset($_SESSION['error'])) { ?>

                    <div class="alert alert-danger alert-dismissible" role="alert">

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <?php

                        echo $_SESSION['error'];

                        unset($_SESSION['error']);

                        ?>

                    </div>

                    <?php } ?>

                </div>

                <div class="col-md-4 col-md-offset-4">

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h1 class="panel-title">Please Sign In</h1>

                        </div>

                        <div class="panel-body">

                            <form role="form" id="signinForm" autocomplete="off" method="POST" action="login_action.php">

                                <fieldset>

                                    <div class="form-group">

                                        <label for="email">Email Id</label>

                                        <input class="form-control" placeholder="Email" name="email" type="text" autofocus value="<?php echo isset($_COOKIE['css_uname']) ? trim($_COOKIE['css_uname']) : ""; ?>">

                                    </div>

                                    <div class="form-group">

                                        <label for="email">Password</label>

                                        <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo isset($_COOKIE['css_password']) ? trim($_COOKIE['css_password']) : ""; ?>">

                                    </div>

                                    <div class="checkbox">

                                        <label>

                                            <input name="remember" type="checkbox" checked="checked">

                                            Remember Me 

                                        </label>

                                    </div>

                                    <!-- Change this to a button or input when using this as a form -->

                                    <input type="submit" name="btn_submit" class="btn btn-success btn-block" value="Login">

                                </fieldset>

                            </form>

                            <br>

                            <a href="forgot-password.php">Forgot Password</a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- jQuery -->

        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <script src="bower_components/jquery-validation/jquery.validate.js"></script>

        <!-- Bootstrap Core JavaScript -->

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->

        <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->

        <script src="js/login.js"></script>   

        <script src="dist/js/sb-admin-2.js"></script>

             

    </body>

</html>

