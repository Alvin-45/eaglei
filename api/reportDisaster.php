<?php
set_time_limit(0);

include("connection.php");

$disasterImg = $_POST['image'];
$uid = $_POST['uid'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$date = date('Y-m-d');

$path="uploads/test/image.jpg";
file_put_contents($path,base64_decode($disasterImg));


$sql ="INSERT INTO report_tbl (uid,latitude,longitude,date) VALUES ('$uid','$latitude','$longitude','$date')";

if(mysqli_query($con,$sql))
{
	$id = mysqli_insert_id($con);
	$fileName = "image".$id.".jpg";
	file_put_contents("../report_tbl/uploads/".$fileName, base64_decode($disasterImg));

	$sql = "UPDATE report_tbl SET image = '$fileName' WHERE id = '$id'";
	mysqli_query($con,$sql);

	
	//$python=`C:\\python_venv\\venv38_tf_212\\Scripts\\python.exe ML_TEST/test.py`;
	//$python=`python ML_TEST/test.py`;
	$python="C:\\ProgramData\\Anaconda3\\python.exe";
	$file="C:\\xampp\\htdocs\\disaster\\api\\test.py";
	$output=exec($python . " " . $file);

	echo "success";
	
}	
else{
	
	echo"failed";
}
?>