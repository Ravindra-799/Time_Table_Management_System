
<!-- ============================================================== -->
<!-- Accepted Staff here -->
<!-- ============================================================== -->
<?php
    include '../db/dbconnect.php';
    if(isset($_GET['accept']))
    {
        $acceptuser = $_GET['accept'];
        $query = "SELECT * FROM  staff where username = '$acceptuser'";
        $query_run = mysqli_query($mycon,$query);
        if($row = mysqli_fetch_assoc($query_run));
        {
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $uname = $row['username'];
            $phno =  $row['phonenumber'];
            $email = $row['email'];
            $password = $row['password'];
            $deprt = $row['department'];
            $desg = $row['designation'];
            $insert = "INSERT INTO lecturer VALUES('$fname','$lname','$uname','$phno','$email','$password','$deprt','$desg')";
            if($query_run2 = mysqli_query($mycon,$insert))
            {
                $delete = "DELETE FROM staff where username = '$acceptuser'";
                $query_run3 = mysqli_query($mycon,$delete);
                if($query_run3)
                {
                    header("Location:add-lecturer.php");

                 }
            }
        }  
    }
?>
<!-- ============================================================== -->
<!-- Delete Operation for staff rejected here -->
<!-- ============================================================== -->
<?php
    if(isset($_GET['reject']))
    {
        $user = $_GET['reject'];
        $delete = "DELETE FROM staff where username = '$user'";
        if($query_run = mysqli_query($mycon,$delete))
        {
            header("Location:add-lecturer.php");
        }
    }
?>


<!-- ============================================================== -->
<!-- Delete Operation for Lecturer here -->
<!-- ============================================================== -->
<?php
    if(isset($_GET['delete']))
    {
        $user = $_GET['delete'];
        $delete = "DELETE FROM lecturer where username = '$user'";
        if($query_run = mysqli_query($mycon,$delete))
        {
            header("Location:view-lecturer.php");
        }
    }
?>
<!-- ============================================================== -->
<!-- Unassign Operation for course here -->
<!-- ============================================================== -->

<?php
     if(isset($_GET['assign']))
     {
         $assign = $_GET['assign'];
         $delete = "DELETE FROM assignCourse where lecturername = '$assign'";
         if($query_run = mysqli_query($mycon,$delete))
         {
             header("Location:assign-course.php");
         }
     }
?>
<!-- ============================================================== -->
<!-- Delete Operation for student here -->
<!-- ============================================================== -->

<?php
     if(isset($_GET['student']))
     {
         $stuname = $_GET['student'];
         $delete = "DELETE FROM student where username = '$stuname'";
         if($query_run = mysqli_query($mycon,$delete))
         {
             header("Location:view-student.php");
         }
     }
?>



<!-- ============================================================== -->
<!-- Delete Operation for course here -->
<!-- ============================================================== -->

<?php
     if(isset($_GET['course']))
     {
         $code = $_GET['course'];
         $delete = "DELETE FROM course where course_code = '$code'";
         if($query_run = mysqli_query($mycon,$delete))
         {
             header("Location:course.php");
         }
     }
?>
<!-- ============================================================== -->
<!-- Delete Operation for DEpartment here -->
<!-- ============================================================== -->

<?php
     if(isset($_GET['depart']))
     {
         $depart = $_GET['depart'];
         $delete = "DELETE FROM department where departmentName = '$depart'";
         if($query_run = mysqli_query($mycon,$delete))
         {
             header("Location:department.php");
         }
     }
?>