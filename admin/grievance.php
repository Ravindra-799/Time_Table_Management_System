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
                              
                                <li class="breadcrumb-item active">Grievance</li>
                            </ol>
                        </div>
                        <h4 class="page-title">View Grievance</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>Grievance</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=0;
                                        $query = "SELECT * FROM feedback";
                                        $query_run = mysqli_query($mycon,$query);
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                        ?>
                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $row['lecturerName'];?></td>
                                                
                                                <td><?php echo $row['message'];?></td>
                                                <!-- <td>
                                                    <a href="operations.php?student=<?php echo $row['username'] ?>" role = 'button' class="btn btn-danger text-white btn-sm"><i class="fa fa-trash"></i> delete </a>
                                                </td> -->
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