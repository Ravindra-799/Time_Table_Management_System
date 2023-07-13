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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card-box">
                        <div class="row">
                  	 		<div id="content" class="col-md-12">
							   <center> 
								 <?php
								 	$uname=$_SESSION['user_id'];
								 	$query="SELECT * FROM student WHERE username='$uname'";
									$query_run=mysqli_query($mycon,$query);
									$row=mysqli_fetch_assoc($query_run);
								  echo "<h2>TIMETABLE FOR</h2>";
								  echo "<h2>$row[year] $row[branch] - $row[section]  </h2>";?>
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
													<?php
														$query="SELECT * FROM days";
														$query_run=mysqli_query($mycon,$query);
														$query1="SELECT * FROM student WHERE username='$uname'";
														$query_run1=mysqli_query($mycon,$query1);
														$row1=mysqli_fetch_assoc($query_run1);
														$section=$row1['section'];
														while($row=mysqli_fetch_assoc($query_run))
														{
															echo "<tr>";
																echo "<td>$row[day]</td>";
																$period="SELECT * FROM periods";
																$period_run=mysqli_query($mycon,$period);
																while($prow=mysqli_fetch_assoc($period_run))
																{
																	$option="SELECT * FROM ttms WHERE day='$row[day]' AND `period`='$prow[pid]' AND section='$section'";
																	$option_run=mysqli_query($mycon,$option);
																	$option_row=mysqli_num_rows($option_run);
																	if($option_row==1)
																	{
																		$myoption=mysqli_fetch_assoc($option_run);
																		echo "<td>$myoption[course_title]</td>";
																	}
																	else if($option_row==0)
																	{
																		echo "<td>---</td>";
																	}
																}

														} 
													?>
														
                  	 				            <tbody>
											</table>
                        </div>
                    </div> <!-- end card-box-->
                </div>
            </div>
            <button id="cmd" class="btn btn-success cmd">Download Time-Table</button>
    		</div>
		</div>
    </div>
</div> <!-- container -->
</div> <!-- content -->
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
	.time-text{
		text-align: center;
		font-weight: bold;
	}

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