<?php
include "includes/header.php";
include "includes/sidebar.php";
?>


<!-- ============================================================== -->
<!-- Add Lecturer database connection -->
<!-- ============================================================== -->
<?php
    // if($_SERVER['REQUEST_METHOD'] == 'POST')
    // {
        
    // }
        
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
                                <li class="breadcrumb-item active">Approve Lecturer</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Approve Lecturer</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- <div class="card-header">
                            <h4>Registered Staff</h4>
                        </div> -->
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive" style="width:100px">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Username</th>
                                        <th>firstname</th>
                                        <th>lastname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Department</th>
                                        <th>Level</th>
                                        <th colspan='2'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=0;
                                        $query = "SELECT * FROM staff";
                                        $query_run = mysqli_query($mycon,$query);
                                        while($row = mysqli_fetch_assoc($query_run))
                                        {
                                            ?>

                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['firstname']; ?></td>
                                                <td><?php echo $row['lastname']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['phonenumber']; ?></td>
                                                <td><?php echo $row['department']; ?></td>
                                                <td><?php echo $row['designation']; ?></td>
                                                <td>
                                                    <button type="button" name = "btn-accept" class="btn btn-success btn-sm"><a href="operations.php?accept=<?php echo $row['username']; ?>" class="text-white">Accept</a></button>
                                                   
                                                </td>
                                                <td>
                                                <button type="button" name = "btn-reject" class="btn btn-danger btn-sm"><a href="operations.php?reject=<?php echo $row['username']; ?>" class="text-white">Reject</a></button>
                                                </td>
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

