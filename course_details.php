<?php
require("db_conn.php");
$c_id=$_GET["course_id"];
echo "hurrey $c_id";
?>
<html>
<head>
	<style type="text/css">
		div:hover{
			cursor: pointer;
			border-color: red;
			box-shadow: 0 0 18px rgba(0,255,0, 0.6);

		}
	</style>
</head>
<body>
<div style="border-radius: 50%;height: 200px;width: 200px;border: 1px solid black;overflow: hidden"><img src="pen.jpg"></div>
</body>
</html>