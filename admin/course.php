<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- Course DataConnection -->
<!-- ============================================================== -->
<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['course_title']) && isset($_POST['course_code']) && isset($_POST['dept']))
        {
            $course_title = $_POST['course_title'];
            $course_code  = $_POST['course_code'];
            $dept = $_POST['dept'];
            $query = "SELECT * FROM course where course_code = $course_code";
            if($query_run  = mysqli_query($mycon,$query))
            {
                $num_rows = mysqli_num_rows($query_run);
                if($num_rows == 0){
                    $query = "INSERT INTO course VALUES(NULL,' $course_title','$course_code','$dept')";
                    if($query_run = mysqli_query($mycon,$query) )
                    {
                        echo 'Successfully inserted.....';
                    }
                }
                else if($num_rows == 1){
                    echo 'Course  is already Exist';
                }
            }
        }
        // else
        // {
        //     echo "Please enter the Details of Course";
        // }
    }
?>



<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Add/Modify Course</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Course</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form  action = "<?php $_SERVER['PHP_SELF']?>" method="post" action="">
                                    <div class="row">
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Course Title</label>
                                                <input type="text" class="form-control" name="course_title" placeholder="Course Title">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Course Code</label>
                                                <input type="text" class="form-control" name="course_code" placeholder="Course Code">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select type="text" class="form-control" name="dept">
                                                    <option selected="" disabled="">Select Department</option>
                                                    <?php
                                                        $query = "SELECT * FROM department";
                                                        $query_run  = mysqli_query($mycon,$query);
                                                        while($row = mysqli_fetch_assoc($query_run)){
                                                            echo "<option value = $row[departmentName]>$row[departmentName]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select type="text" class="form-control" name="level">
                                                    <option selected="" disabled="">Select Level</option>
                                                </select>
                                            </div>
                                        </div> -->
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_course">Add Course</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            

            
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Course Code</th>
                                        <th>Department</th>
                                        <!-- <th>Level</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=0;
                                         $query = "SELECT * FROM course";
                                         $query_run = mysqli_query($mycon,$query);
                                         while($row = mysqli_fetch_assoc($query_run)){
                                            ?>
                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $row['course_title']; ?></td>
                                                <td><?php echo $row['course_code']; ?></td>
                                                <td><?php echo $row['department']; ?></td>
                                                <td>
                                                <button type="button" name = "btn-reject" class="btn btn-danger btn-sm"></a><i class="fa fa-trash"></i><a href="operations.php?course=<?php echo $row['course_code']; ?>" class="text-white"> Delete</button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <?php
    include "includes/footer.php";
    ?>