
<?php

if(isset($_POST['login_button']))
{

$email=$_POST["email"];


$password=$_POST["password"];

$database=mysqli_connect('localhost','root','','classfinder')
or die("didnt work");


echo "<br>";
$res=mysqli_query($database,"select password from student where email='$email'");
//$res1=mysqli_query($database,"select * from userdetails where phone='$ph'");
$result=mysqli_fetch_array($res,MYSQLI_NUM);
////$result1=mysqli_fetch_array($res1,MYSQLI_NUM);
//echo "Create Database user".$ph;
echo "<br>";
echo $result[0];
if($result[0]=="")
{
	echo "<h2>Email id Does not exist. Please Sign Up. </h2> <br>" ;
	echo "<button onclick=\"location.href = 'registration.html';\" id=\"myButton\" class=\"float-left submit-button\" >Click Here To Sign Up!</button>";
	

}
else
{
if($password==$result[0]) 
{


	
			echo "Log In Successful";
			header("Location:home.html");
		
	}
	else
	{

		echo "Incorrect password! Please try again later.";
		header("Location:index.html");
	}
}
//entering all te details into database


mysqli_close($database);

//header("Location:target.html");



}


?>


