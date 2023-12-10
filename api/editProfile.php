<?php

include("connection.php");

if(isset($_POST['image']))
{
    $image = $_POST['image'];
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $place = $_POST['place'];
    $email = $_POST['email'];
     
    $filename = "image"."$uid.jpg";
    $path = "../user_tbl/uploads/$filename";


        $sql = "UPDATE user_tbl SET name='$name', number='$number',place='$place',email='$email', userimage='$filename' WHERE id='$uid'";
        
        if(mysqli_query($con,$sql)){
             file_put_contents($path,base64_decode($image));
             echo "Successfully Uploaded";
        }

}else{

   $uid = $_POST['uid'];
   $name = $_POST['name'];
   $number = $_POST['number'];
   $place = $_POST['place'];
   $email = $_POST['email'];

   $sql = "UPDATE user_tbl SET name='$name', number='$number',place='$place',
   email='$email' WHERE id='$uid'";

   //echo $sql;
           
   if(mysqli_query($con,$sql)){
       echo "Successfully Updated";
   }else{
      echo"Failed to Update Profile";
   }
}



?>