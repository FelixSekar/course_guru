<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<script src="jquery.js"></script>
		<link rel="stylesheet" href="bootstrap.css" />
	    <link href="styles/css/normalize.css" rel="stylesheet" type="text/css">

		<script src="bootstrap.js"></script>
	</head>
	
	<body>
		<br />
		<div class="container" style="width:700px;">
			<br />
			<br />
			<br />
			<br />
			<br />
			<div align="right">
				<button type="button" name="login" id="login" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login</button>
			</div>
		</div>
		<br />
		
	</body>
</html>

<div id="loginModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Login</h4>
			</div>
			<div class="modal-body">
				<form>
				<label> Email </label>
				<input type="email" name="email" id="email" class="form-control" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password" id="password" class="form-control" />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
				</form>
			</div>
		</div>
	</div>
</div>


<script>
$(document).ready(function(){
	$('#login_button').click(function(){
		var email= $('#email').val();
		var password= $('#password').val();
		if(username != '' && password != '')
		{
			$.ajax({
				url:"action.php",
				method="POST",
				data:{email:email, password:password},
				success:function(data){
					
				}
			});	
		}
		
		else
		{
			alert("Both Fields are required");
		}
	});
	
});
