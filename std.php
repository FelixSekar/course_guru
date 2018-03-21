<?php
require('db_conn.php');

if(isset($_POST['submit_btn']))
{
	$fname=$_POST["fname"];
	$lname=$_POST["lname"];
	$age=$_POST["age"];
	$gender=$_POST["gender"];
	$email_id=$_POST["email_id"];
	$state=$_POST["state"];
	$city=$_POST["city"];
	
	$insert = mysqli_query($conn,"INSERT into student(fname,lname,age,gender,email_id,state,city) VALUES('$fname','$lname','$age','$gender','$email_id','$state','$city')");

	if($insert)
	{
		echo "File uploaded successfully.";
		}else
		{
			echo "File upload failed, please try again. ";
		}

}

?>