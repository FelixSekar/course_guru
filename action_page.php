<?php

require('db_conn.php');

if(isset($_POST['submit_btn']))
{
	$name=$_POST["name"];
	$address=$_POST["address"];
	$contact_no=$_POST["contact_no"];
	$email=$_POST["email"];
	$website_link=$_POST["website_link"];
	$established_on=$_POST["established_on"];
	$description=$_POST["description"];
	$check=getimagesize($_FILES["image"]["tmp_name"]);
	if($check !==false){
		$image=$_FILES['image']['tmp_name'];
		$imgContent=addslashes(file_get_contents($image));
		
		$insert=mysqli_query($conn,"INSERT into class(name,address,contact_no,email,website_link,established_on,description,image) VALUES('$name','$address','$contact_no','$email','$website_link','$established_on','$description','$imgContent')");
		
		
		if($insert){
			
			echo "File uploaded successfully.";
		}else{
			echo "File upload failed, please try again. ";
		}
	}else{
		echo"Please select an image file to upload.";
	}
}

	
	
?>	