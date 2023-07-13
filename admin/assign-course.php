<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- DataBase Connection For assign -->
<!-- ============================================================== -->


<?php
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(isset($_POST['course']) && isset($_POST['year']) && isset($_POST['lecturer']) && isset($_POST['semester']) && isset($_POST['dept']) && isset($_POST['section']) )
        {
            $course = $_POST['course'];
            $lecturer = $_POST['lecturer'];
            $year = $_POST['year'];
            $semester = $_POST['semester'];
            $dept = $_POST['dept'];
            $section=$_POST['section'];
            $query = "SELECT * FROM assigncourse where course_title = '$course' AND lecturername = '$lecturer' AND section='$section'";
            if($query_run = mysqli_query($mycon,$query))
            {
                $num_rows = mysqli_num_rows($query_run);
                if($num_rows == 0)
                {
                    $query  = "INSERT INTO assigncourse VALUES('$course','$lecturer','$year','$semester','$dept','$section')";
                    if($query_run = mysqli_query($mycon,$query) )
                    {
                        echo 'Successfully assigned.....';
                    }

                }
                elseif($num_rows == 1)
                {
                    echo "Course is Already Assigned";
                }

            }
        }
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
                                <li class="breadcrumb-item active">Assign Course</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Assign Course</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Course</label>
                                                <select class="form-control" name="course">
                                                    <option selected="" disabled="">Select Course</option>
                                                    <?php
                                                        $query = "SELECT * FROM course";
                                                        $query_run  = mysqli_query($mycon,$query);
                                                        while($row = mysqli_fetch_assoc($query_run)){
                                                            echo "<option value = $row[course_title]>$row[course_title]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Course Lecturer</label>
                                                <select class="form-control" name="lecturer">
                                                    <option>--Select Lecturer--</option>
                                                    <?php
                                                        $query = "SELECT * FROM lecturer";
                                                        $query_run  = mysqli_query($mycon,$query);
                                                        while($row = mysqli_fetch_assoc($query_run)){
                                                            echo "<option value = $row[username]>$row[username]</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Year</label>
                                                <select class="form-control" name="year">
                                                    <option>--Select Year--</option>
                                                    <?php 
                                                        $query="SELECT year FROM academic";
                                                        $query_run=mysqli_query($mycon,$query);
                                                        while($row=mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "<option value = '$row[year]'>$row[year]</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Semester</label>
                                                <select class="form-control" name="semester">
                                                    <option>-- Select Semester --</option>
                                                    <?php 
                                                        $query="SELECT semester FROM academic";
                                                        $query_run=mysqli_query($mycon,$query);
                                                        while($row=mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "<option value = '$row[semester]'>$row[semester]</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department</label>
                                                <select type="text" class="form-control" name="dept">
                                                    <option selected="" disabled="">-- Select Department --</option>
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
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Section</label>
                                                <select class="form-control" name="section">
                                                    <option>-- Select Section --</option>
                                                    <?php 
                                                        $query="SELECT sectionName FROM section";
                                                        $query_run=mysqli_query($mycon,$query);
                                                        while($row=mysqli_fetch_assoc($query_run))
                                                        {
                                                            echo "<option value = '$row[sectionName]'>$row[sectionName]</option>";
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_course">Assign Course</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            

            
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Lecturer Name</th>
                                        <th>Year</th>
                                        <th>Semester</th>
                                        <th>Department</th>
                                        <th>Section</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count = 0;
                                        $query = "SELECT * FROM assigncourse";
                                        $query_run = mysqli_query($mycon,$query);
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                    ?>
                                        <tr>
                                            <td><?php echo ++$count; ?></td>
                                            <td><?php echo $row['course_title']; ?></td>
                                            <td><?php echo $row['lecturername']; ?></td>
                                            <td><?php echo $row['year']; ?></td>
                                            <td><?php echo $row['semester']; ?></td>
                                            <td><?php echo $row['department']; ?></td>
                                            <td><?php echo $row['section']; ?></td>
                                            <td><button type="button" class="btn btn-success btn-sm"></a><i class="fa fa-times"></i><a href="operations.php?assign=<?php echo $row['lecturername']; ?>" class="text-white"> unassign</button></td>
                                         </tr>
                                         <?php
                                        }
                                        ?>
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