<?php
include "includes/header.php";
include "includes/sidebar.php";
?>

   <!-- ====FEEDBACK CONNECTion== -->
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['feedback']))
        {
            $message = $_POST['feedback'];
            if(!empty($message))
            {
                $uname = $_SESSION['user_id'];
                $query = "SELECT * FROM feedback where `lecturerName` = '$uname'";
                if($query_run  = mysqli_query($mycon,$query))
                {
                    $num_rows = mysqli_num_rows($query_run);
                    if($num_rows == 0){
                        $query = "INSERT INTO feedback VALUES('$uname','$message')";
                        if($query_run = mysqli_query($mycon,$query) )
                        {
                            echo '<alert>Successfully submitted the Feedback .....</alert>';
                        }
                    }
                    else if($num_rows == 1){
                        echo '<script>alert(" Your FeedBack is Under process")</script>';
                    }
                }
            }
            else
            {
                echo "<script>alert('Please give your Feedback')</script>";
            }
        }
    }

?>

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
                                <li class="breadcrumb-item active">Grievance</li>
                            </ol>
                        </div>
                        <h4 class="page-title">GRIEVANCE</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->
            
            <div class="row">
                <div class="col-12">
                    <div class="card" >
                        <div class="card-body" >
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                        <center>
                        <button type="button" class="btn btn-info btn-lg text-center btn-block">GRIEVANCE</button>
                        <div class="modal-body text-center">
                            <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
                                <h3>Your opinion matters</h3>
                                <h5>Help us ? <strong>Give  your feedback.</strong></h5>
                                 <hr>

                                <!--Text Message-->
                            <div class="text-center">
                             <h4>What could we improve?</h4>
                            </div>
                             <textarea class="form-control-lg btn-block" type="textarea" placeholder="Your Message" rows="10" name="feedback"></textarea>


                        <!-- Modal Footer-->
                        <div class="modal-footer">
                             <div class="col-md-12 text-center">
                                    <button class="btn btn-primary" >Send <i class="fa fa-paper-plane"></i></button>
                                    <a href="dashboard.php" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a>
                             </div>
                        </div>
                         </center>
                     </form>
        </div>          
    </div>
</div>
<?php
    include "includes/footer.php";
?>
