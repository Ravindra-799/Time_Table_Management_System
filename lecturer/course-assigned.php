<?php
include "includes/header.php";
include "includes/sidebar.php";
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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lecturer</a></li>
                                <li class="breadcrumb-item active">View Assigned Courses</li>
                            </ol>
                        </div>
                        <h4 class="page-title">View Assigned Courses</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive" style="width:1100px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Course Title</th>
                                        <th>Year</th>
                                        <th>semester</th>
                                        <th>Department</th>
                                        <th>section<th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=0;
                                        $uname =  $_SESSION['user_id'];
                                        $query = "SELECT * From assigncourse where lecturername = '$uname'";
                                        $query_run = mysqli_query($mycon,$query);
                                
                                        while($row = mysqli_fetch_assoc($query_run)){

                                        ?>
                                    <tr>
                                        <td><?php echo ++$count ;?></td>
                                        <td><?php echo $row['course_title']; ?></td>
                                        <td><?php echo $row['year']; ?></td>
                                        <td><?php echo $row['semester']; ?></td>
                                        <td><?php   echo $row['department']; ?></td>
                                        <td><?php echo $row['section']; ?></td>
                                        <!-- <td><a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a></td> -->
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