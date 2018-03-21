<?php
	$classId=$_GET["id"];
	require("db_conn.php");

	$query1 = "select * from class where id = $classId";

	$result1=mysqli_query($conn,$query1);

	if(mysqli_num_rows($result1)>0){	
	$row=mysqli_fetch_array($result1);
	
		$id=$row['id'];
		$name=$row['name'];
		$address=$row['address'];
		$contactNo=$row['contact_no'];
		$email=$row['email'];
	}
	else{
		echo "Unable to get class details";
	}
?>

<!DOCTYPE html>
<html>
<head>

		<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115094610-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-115094610-1');
    </script>
    
    <!--Responsive-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">

		<link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="jquery.js"></script>		
		<script src="bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css">
		
	</style>
</head>
<body>
<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.php">Course Guru</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item" active>
		        <a class="nav-link" href="">About Us</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
		      </li>
		      
		    </ul>
		  </div>
		</nav>
		<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
						<li><a data-toggle="tab" href="#studentLogin"><h2>Student/</h2></a></li>
						<li><a data-toggle="tab" href="#classLogin"><h2>Classes<h2></a></li>
					</ul>
		
		<div class="tab-content">
			
			<div id="studentLogin" class="tab-pane fade">
				<label> Email </label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
			</div>
			
			
			
			<div id="classLogin" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button"  class="btn btn-warning">Login</button>
			</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="registerModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registration Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
			<li><a data-toggle="tab" href="#student"><h2>Student/</h2></a></li>
			<li><a data-toggle="tab" href="#classes"><h2>Classes<h2></a></li>
		</ul>
		
		<div class="tab-content">
			
			<div id="student" class="tab-pane fade">
				<label> Email: </label>
				<input type="email" name="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password: </label>
				<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Register</button>
			</div>
			
			
			
			<div id="classes" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password:</label>
				<input type="password" name="cpassword"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" class="btn btn-warning">Register</button>
			</div>
						
				</div>
			</div>
		</div>
	</div>
	</div>

<div class="jumbotron"></div>

</body>
</html>