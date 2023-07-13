<?php
    include '../db/dbconnect.php';
      if($_SERVER['REQUEST_METHOD']=='POST')
      {
          $fname=$_POST["fname"];
          $lname=$_POST["lname"];
          $username=$_POST["username"];
          $phoneno=$_POST["phone"];
          $email=$_POST["email"];
          $password=$_POST["password"];
          $cpassword=$_POST["cpassword"];
          $branch=$_POST["dept"];
          $year=$_POST['year'];
          $section=$_POST['section'];
          if(!empty($fname) && !empty($lname) && !empty($username) && !empty($phoneno) && !empty($email) && !empty($password) && !empty($branch) && !empty($year) && !empty($section))
          {
            if($password != $cpassword)
            {
                echo "<script>alert('Password des not match')</script>";
            }
            else
            {
                $query = "SELECT `email` FROM `student` WHERE `username` = '$username'" ;
                if($query_run = mysqli_query($mycon,$query))
                {
                    $num_rows = mysqli_num_rows($query_run);
                    if($num_rows == 1)
                    {
                        echo "<script>alert('User is already Exists!')</script>";
                        
                    }
                    else if($num_rows == 0){
                        $query = "INSERT INTO student VALUES ('$fname','$lname','$username','$phoneno','$email','$password','$year','$branch','$section')";
                        if($query_run = mysqli_query($mycon,$query)){
                            echo "<script>alert('Successfully Registered')</script>";
                             header('Location: index.php');
                        }
                    }
                }
            }
          }
        }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>TTMS Student Registration</title>
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
                    <div class="col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body p-4">
                                <h5 class="auth-title">Register</h5>
                                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                                    
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Firstname</label>
                                            <input class="form-control" type="text" id="emailaddress" name="fname" placeholder="Enter your Firstname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Lastname</label>
                                            <input class="form-control" type="text" id="emailaddress" name="lname" placeholder="Enter your Lastname">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">username</label>
                                            <input class="form-control" type="text" id="emailaddress" name="username" placeholder="Enter your username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Phone</label>
                                            <input class="form-control" type="text" id="emailaddress" name="phone" placeholder="Enter your Phone">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Email</label>
                                            <input class="form-control" type="Email" id="emailaddress" name="email" placeholder="Enter your Email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password" name="password"  placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password">Confirm Password</label>
                                            <input class="form-control" type="password" id="password" name="cpassword"  placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Year</label>
                                            <select class="form-control" name="year">
                                                <option selected="" disabled="">--Select year--</option>
                                                <option value="I">I</option>
                                                <option value="II">II</option>
                                                <option value="III">III</option>
                                                <option value="IV">IV</option>
                                               
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Branch</label>
                                            <select class="form-control" name="dept">
                                                <option selected="" disabled="">--Select Branch--</option>
                                                <option value="cse">CSE</option>
                                                <option value="ece">ECE</option>
                                                <option value="eee">EEE</option>
                                                <option value="civil">CIVIL</option>
                                                <option value="mech">MECH</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="emailaddress">Section</label>
                                            <select class="form-control" name="section">
                                                <option selected="" disabled="">--Select section--</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-danger btn-block" type="submit" name="submit"> Register </button>
                                            <a href="index.php">Have an account? Login</a>
                                        </div>
                                    </div>
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