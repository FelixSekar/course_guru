
<?php

if(isset($_POST['login_button']))
{
$email=$_POST["email"];
$password=$_POST["password"];
$cpassword=$_POST["cpassword"];
$database=mysqli_connect('localhost','root','','classfinder')
or die("didnt work");
//$database1=mysqli_connect('localhost','root','','')
//or die("didnt work");
//echo "select * from cust_details where email='$e'";
echo "<br>";
$res=mysqli_query($database,"select * from student where email='$email'");
//$res1=mysqli_query($database,"select * from userdetails where phone='$ph'");
$result=mysqli_fetch_array($res,MYSQLI_NUM);
////$result1=mysqli_fetch_array($res1,MYSQLI_NUM);
//echo "Create Database user".$ph;
echo "<br>";
if($result[0]!="")
{
	echo "<h2>Username Already Exists. Please Log In. </h2> <br>" ;
	echo "<button onclick=\"location.href = 'index.html';\" id=\"myButton\" class=\"float-left submit-button\" >Click Here To Log In!</button>";
	

}
else
{
if($password==$cpassword) 
{

if(mysqli_query ($database,"insert into student(email,password) values('$email','$password')"))
{
	
			echo "Registration Successful";
			echo "<button onclick=\"location.href = 'studindex.html';\" id=\"myButton\" class=\"float-left submit-button\" >Click Here To Log In!</button>";
			header ("Location:index.html");
		
	}
	else
	{

		echo "Unsuccessful! Please try again later.";
	}
}
//entering all te details into database


mysqli_close($database);

//header("Location:target.html");



}
}

?>


