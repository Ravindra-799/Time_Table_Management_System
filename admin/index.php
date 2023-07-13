<?php
    session_start();
    include '../db/dbconnect.php';
?>
<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['username']) && isset($_POST['password']))
        {
            $adminname=$_POST['username'];
            $adminpwd=$_POST['password'];
            if(!empty($adminname) && !empty($adminpwd))
            {
                $query = "SELECT `username` FROM `admin` WHERE `username` = '$adminname' AND `password` = '$adminpwd'";
                if($query_run = mysqli_query($mycon,$query))
                {
                    $num_rows = mysqli_num_rows($query_run);
                    if($num_rows == 0){
                        echo '<script>alert("Invalid UserName or Password")</script>';
                    }
                    else if($num_rows == 1){
                        $row= mysqli_fetch_row($query_run);
                        $id = $row[0];
                        $_SESSION['user_id']=$id;
                        header('Location: dashboard.php');
                    }
                }
            }
            else
            {
                echo '<script>alert("Please Enter Credentails")</script>';
            }

        }
    }
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Time Table Management System - Admin Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-4 col-lg-4 col-xl-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="auth-title">Sign In</h5>
                                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address/Username</label>
                                        <input class="form-control" type="text" id="emailaddress" name="username" placeholder="Enter your Username" required="">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required="">
                                    </div>


                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit" name="login"> Log In </button>
                                    </div>
                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->
                       
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    </body>
</html>