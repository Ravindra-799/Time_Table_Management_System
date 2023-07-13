<!DOCTYPE html>
<html lang="en">
    <head>
        <title>TTMS</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

		<!-- custom css style -->
		<style>
			/* body{
				overflow-x: hidden;
			} */
			.main-body{
				background-image: url(assets/images/travelers-notebook-2245970.jpg);
				background-size: cover;
				background-position: center;
				width: 100vw;
				height: 100vh;
			}

			.main{
				width: 60%;
				height: 40vh;
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				color:white;
	}
		</style>
    </head>
<body>
	<div class="container-fluid main-body">
		<div class="row main">
			<div class="col-md-12">
				<h2 class="text-center text-white text-uppercase" style="font-family: rockwell extrabold">Time table management system</h2>
			</div>

				<!-- admin -->

			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<!-- for logo purpose -->
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<!-- logo -->
					<div class="col-md-12 text-center">
						<a href="admin/index.php" class="h4 text-white text-capitalize text-center">Admin</a>
					</div>
				</div>
			</div>
				<!-- lecturer -->

			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<div class="col-md-12 text-center">
						<a href="lecturer/index.php" class="h4 text-white text-capitalize text-center">Lecturer</a>
					</div>
				</div>
			</div>
			<!-- Student -->


			<div class="col-md-4 d-flex align-items-center justify-content-center">
				<div class="row">
					<div class="col-md-12 text-center">
						<i class="la la-user la-5x text-center"></i>
					</div>
					<div class="col-md-12 text-center">
						<a href="student/index.php" class="h4 text-white text-capitalize text-center">Student</a>
					</div>
				</div>
			</div>


		</div>
	</div>
</body>
</html>