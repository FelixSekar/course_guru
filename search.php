<?php
	require('db_conn.php');
	$q=$_POST['query'];

	$query = "select * from course where name='$q'";

	$result=mysqli_query($conn,$query);
?>


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
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    <script src="jquery.js"></script>
    <style>
    	  #course{
          background-color: #dee2e6;
          padding: 5%;
        }
  	</style>
  	<script type="text/javascript">
  		$(document).ready(function(){
  			$(".course-link").click(function(){
	  			var course_id = $(this).attr("id");
	  			window.location.href='course_details.php?course_id='+course_id;  				
  			});
  		});
  	</script>
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
		      <li class="nav-item">
		        <a class="nav-link" href="about_us.html">About Us</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Login</a>
		      </li>
		    </ul>
		  </div>
		</nav>

		<form method="POST" action="">
			<input type="text" class="form-control" name="query" value="<?php echo $q ?>">
		</form>
		<div class="container-fluid">
	    <div class="row">
      	<div class="col-md-2">
      	</div>
				<div class="col-md-8" id="course">
					<?php
						if(mysqli_num_rows($result)>0)
						{	
							while($row=mysqli_fetch_array($result))
							{
								$id=$row['id'];
								$class_id=$row['class_id'];
								$name=$row['name'];
								$duration=$row['duration'];
								$rate=$row['rate'];
								$start=$row['start'];
								$end=$row['end'];
								#echo $id." ".$class_id." ". $name." ". $duration." ". $rate." ". $start ." ".$end;

					?>

								<div class="card mb-3">
								  <div class="card-body">
								    <h5 class="card-text course-link" id="<?php echo $id ?>">Course Name:<?php echo $name ?></h5>
								    <p class="card-text">Duration:<?php echo $duration ?></p>
								    <p class="card-text">Rate:<?php echo $rate ?></p>
								    <p class="card-text">Starts on:<?php echo $start ?></p>
								    <p class="card-text">Ends on:<?php echo $end ?></p>
								  </div>
								</div>
					<?php	
							}
						}
						else
						{
							echo "No classes found for this course";
						}
					?>
				</div>
	  	</div>
	  </div>	  	
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js " integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin="anonymous "></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>