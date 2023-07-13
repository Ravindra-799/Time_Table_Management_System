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
                                <li class="breadcrumb-item active">Time Table</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Time Table</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            	<div class="form-inline">
                    <select class="form-control col-2" name="batch">
            			<option>--Select Batch--</option>
                        <?php
							$academic="SELECT batch FROM academic";
							$academic_run=mysqli_query($mycon,$academic);
                            while($academic_row=mysqli_fetch_assoc($academic_run))
                            {
                                echo "<option value='$academic_row[batch]'>$academic_row[batch]</option>";
                            }
                        ?>
            		</select>
            		<select class="form-control col-2" name="year">
            			<option>--Select year--</option>
                        <?php
							$academic="SELECT year FROM academic";
							$academic_run=mysqli_query($mycon,$academic);
                        	while($academic_row=mysqli_fetch_assoc($academic_run))
                            {
                                echo "<option value='$academic_row[year]'>$academic_row[year]</option>";
                            }
                        ?>
            		</select>
            		<select class="form-control col-2" name="semister">
            			<option>--Select Semester--</option>
                        <?php
							$academic="SELECT semester FROM academic";
							$academic_run=mysqli_query($mycon,$academic);
                            while($academic_row=mysqli_fetch_assoc($academic_run))
                            {
                                echo "<option value='$academic_row[semester]'>$academic_row[semester]</option>";
                            }
                       ?>
            		</select>
                    <select class="form-control col-2" name="dept">
            			<option>--Select Department--</option>
                            <?php
								$academic="SELECT department FROM academic";
								$academic_run=mysqli_query($mycon,$academic);
                                while($academic_row=mysqli_fetch_assoc($academic_run))
                            	{
                                    echo "<option value='$academic_row[department]'>$academic_row[department]</option>";
                                }
                            ?>
            		</select>
					<select class="form-control col-2" name="section">
            			<option>--Select Section--</option>
                            <?php
								$academic="SELECT sectionName FROM section";
								$academic_run=mysqli_query($mycon,$academic);
                                while($academic_row=mysqli_fetch_assoc($academic_run))
                            	{
                                    echo "<option value='$academic_row[sectionName]'>$academic_row[sectionName]</option>";
                                }
                            ?>
            		</select>
            		<button class="btn btn-primary" name="submit">Schedule</button>
            	</div>
            </form>
            <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
				
			<?php	

				if($_SERVER['REQUEST_METHOD'] == 'POST')
				{
					if(isset($_POST['submit']))
					{
					?>

			        <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <div class="row">
                  	 		        <div id="content" class="col-md-12">
                                       <center> 
										    <?php echo "<h2> SCHEDULE FOR $_POST[year] -  $_POST[semister]  $_POST[dept] -  $_POST[section] </h2>";?>
											
										</center>
								            <table class="table table-bordered content">
                  	 				            <thead>
                                                    <tr>
                                                        <?php 
                                                            $query="SELECT * FROM periods";
                                                            $query_run=mysqli_query($mycon,$query);
                                                            echo "<th>DAY</th>";
                                                            while($row=mysqli_fetch_assoc($query_run))
                                                            {
                                                                echo "<th>$row[pid]</th>";
                                                            }
                                                        ?>
                                                    </tr>
                                                </thead>
                  	 				            <tbody>
                                                    <?php
                                                        $section=$_POST['section'];
                                                        $deprt=$_POST['dept'];
                                                        $semister=$_POST['semister'];
                                                        $year=$_POST['year'];
                                                        $batch=$_POST['batch'];
                                                        echo "<input type='hidden' name='ssection' value='$section'>";
                                                        echo "<input type='hidden' name='sdeprt' value='$deprt'>";
                                                        echo "<input type='hidden' name='ssemister' value='$semister'>";
                                                        echo "<input type='hidden' name='syear' value='$year'>";
                                                        echo "<input type='hidden' name='sbatch' value='$batch'>";
                                                        $query="SELECT * FROM days";
                                                        $query_run=mysqli_query($mycon,$query);
                                                        $option="SELECT course_title FROM assigncourse WHERE year='$year' AND semester='$semister' AND department='$deprt' AND section='$section'";
                                                        $period_query="SELECT pid FROM periods";
                                                        $section=$_POST['section'];
                                                        while($row=mysqli_fetch_assoc($query_run))
                                                        {?>
                                                            <tr>
                                                                <td><?php echo $row['day'] ?></td>
                                                               <?php $period_run=mysqli_query($mycon,$period_query);
                                                                    while($period=mysqli_fetch_assoc($period_run))
                                                                    {
                                                                       $query_run1 = mysqli_query($mycon,$option);
                                                                       ?>
                                                                            <td>
                                                                                <?php
                                                                                    $disable = "SELECT course_title FROM ttms WHERE day='$row[day]' AND `period`='$period[pid]' AND section='$section'";
                                                                                    $disable_run = mysqli_query($mycon,$disable);
                                                                                    $count_rows=mysqli_num_rows($disable_run);
                                                                                    if($count_rows==1)
                                                                                    {
                                                                                        $cname=mysqli_fetch_assoc($disable_run);

                                                                                        echo "<b>$cname[course_title]</b>";
                                                                                    }
                                                                                    else if($count_rows==0)
                                                                                    { ?>
                                                                                        <select name="<?php echo $row['day'].$period['pid']; ?>" id="" class='form-control'>
                                                                                            <option value="">--select--</option>
                                                                                            <?php 
                                                                                                while($row1=mysqli_fetch_assoc($query_run1))
                                                                                                {
                                                                                                    echo "<option value = '$row1[course_title]'>$row1[course_title]</option>";
                                                                                            }?>
                                                                                        </select>
                                                                            <?php   }
                                                                            ?>
                                                                            </td>
                                                            <?php } ?>
                                                            </tr>
                                                    <?php } ?>
								                </tbody>
								            </table> 
                                            <div class="form-group">
                                                    <button class="btn btn-block btn-primary" name="schedule">Schedule</button> 
                                                    <button class="btn btn-block btn-danger" name="update">update</button> 
                                                </div>             
                                            
							        </div>
                                </div>
                            </div> <!-- end card-box-->
                        </div>
                    </div>




				<?php
					}
				}
			
			?>


			




			</form>
            <button id="cmd" class="btn btn-success cmd">Download Time-Table</button>
    		</div>
		</div>
    </div>
</div> <!-- container -->
</div> <!-- content -->
<!-- ========================
    END Page
========================= -->
<!-- ============================================================
                Schedule Database Connection
=========================================================== -->

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(isset($_POST['schedule']))
        {
            $query = "SELECT * FROM DAYS";
            $query_run=mysqli_query($mycon,$query);
            $query1="SELECT * FROM periods";
            $section=$_POST['ssection'];
            $deprt=$_POST['sdeprt'];
            $semister=$_POST['ssemister'];
            $year=$_POST['syear'];
            $batch=$_POST['sbatch'];
            while($row=mysqli_fetch_assoc($query_run))
            {
                $query_run1=mysqli_query($mycon,$query1);
                while($row1=mysqli_fetch_assoc($query_run1))
                {
                    $day=$row['day'];
                    $pno=$row1['pid'];
                    $slot=$row['day'].$row1['pid'];               
                    if(!empty($_POST[$slot]))
                    {
                        $ct=$_POST[$slot];
                        $assignquery="SELECT * FROM assigncourse WHERE section='$section' AND department='$deprt' AND semester='$semister' AND year='$year' AND course_title='$ct'";
                        $assign_run=mysqli_query($mycon,$assignquery);
                        $assign_row=mysqli_fetch_assoc($assign_run);
                        $assignlecturer=$assign_row['lecturername'];
                        $query2="SELECT course_title FROM ttms WHERE `day` = '$day' AND `period` = '$pno' AND section='$section' AND department='$deprt' AND semister='$semister' AND year='$year' AND batch='$batch'";
                        $query_run2=mysqli_query($mycon,$query2);
                        $num_rows=mysqli_num_rows($query_run2);
                        if($num_rows==0)
                        {
                            $query3 = "INSERT INTO ttms VALUES('$day','$pno','$batch','$year','$semister','$deprt','$section','$assignlecturer','$ct')";
                            $query_run3 = mysqli_query($mycon,$query3);
                            echo '<script>alert("Slot Booked Successfully")</script>';
                        }
                        else{
                            echo '<script>alert(" $day and $pno is bookked for $ct")</script>';
                        }
                    }
                }

            }
         }
    }
?>
<?php
    include "includes/footer.php";
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script>
$(function(){
	let doc = new jsPDF('p','pt','a4');
	$("#cmd").click(function(){
		doc.addHTML(document.getElementById('content'),function() {
    	doc.save('Time-Table.pdf');
		})
	});
  })
 </script>
<style type="text/css">

	table th{
		text-align: center;
	}
	table tr{
		text-align: center;
		font-weight: bold;
	}
	.content{
		background-color: white !important;
	}

</style>