<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

<!-- ============================================================== -->
<!-- Department DataConnection -->
<!-- ============================================================== -->

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['department']))
        {
            $deprtName = $_POST['department'];
            if(!empty($deprtName))
            {
                $query = "SELECT * FROM department where `departmentName`= '$deprtName'";
                if($query_run  = mysqli_query($mycon,$query))
                {
                    $num_rows = mysqli_num_rows($query_run);
                    if($num_rows == 0){
                        $query = "INSERT INTO department VALUES(NULL,'$deprtName')";
                        if($query_run = mysqli_query($mycon,$query) )
                        {
                            echo 'Successfully inserted.....';
                        }
                    }
                    else if($num_rows == 1){
                        echo 'Department is already Exist';
                    }
                }
            }
            else
            {
                echo 'Please Enter Department';
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
                                <li class="breadcrumb-item active">Add/Modify Department</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Add/Modify Department</h4>
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
                                    <form  action ="<?php $_SERVER['PHP_SELF'] ?>" method="post" action="">
                                    <div class="row">
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                                <label>Department Title</label>
                                                <input type="text" class="form-control" name="department" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">  
                                            <div class="form-group">
                                               <button class="btn btn-block btn-info rounded-0" name="add_time">Add Department</button> 
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            

            
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <table id="basic-datatable" class="table dt-responsive nowrap w-auto">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">S/N</th>
                                        <th>Department</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $count=0;
                                        $query = "SELECT * FROM department";
                                        $query_run = mysqli_query($mycon,$query);
                                        while($row = mysqli_fetch_assoc($query_run)){
                                            ?>
                                            <tr>
                                                <td><?php echo ++$count; ?></td>
                                                <td><?php echo $row['departmentName']; ?></td>
                                                <td>
                                                <button type="button" class="btn btn-danger btn-sm"></a><i class="fa fa-trash"></i><a href="operations.php?depart=<?php echo $row['departmentName']; ?>" class="text-white"> Delete</button>
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