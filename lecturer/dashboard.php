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
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-xl-4">
                            
                    <div class="card-box">
                        <h4 class="mt-0 font-16">No of Courses</h4>
                        <h2 class="text-dark my-4 text-center"><i class="fa fa-clock text-dark"></i> <span data-plugin="counterup">
                        <?php 
                            $uname = $_SESSION['user_id'];
                            $query = "SELECT * FROM assigncourse where lecturername = '$uname'";
                            $query_run = mysqli_query($mycon,$query);
                            $count = mysqli_num_rows($query_run);
                            echo $count;
                        ?>
                        </span></br></h2>
                    </div> <!-- end card-box-->
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Next Lecture Time</h4>
                        <h2 class="text-dark my-4 text-center"><i class="fa fa-book text-dark"></i> <span data-plugin=""></span></h2>
                    </div> <!-- end card-box-->
                </div>

                <div class="col-xl-4">
                    <div class="card-box">
                        <h4 class="mt-0 font-16">Next Lecture Venue</h4>
                        <h2 class="text my-4 text-center"><i class="fa fa-home text-dark"></i> <span data-plugin=""></span></h2>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container -->

    </div> <!-- content -->
<?php
include "includes/footer.php";
?>