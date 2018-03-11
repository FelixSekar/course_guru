<?php
	require('db_conn.php');
	$q=$_POST['query'];;
	//$q="ma";
	$array=array();

	$query="SELECT DISTINCT(name) FROM course WHERE name LIKE '$q%';";
	
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0){
		while($course=mysqli_fetch_array($result)){
			$array[]=$course['name'];
		}
		echo json_encode($array);
	}
	else{
		echo json_encode($array);
	}	
?>