<?php
session_start();
$con = mysqli_connect("localhost","root", "123", "iot");
if (mysqli_connect_errno()) {
    echo "failed to connect: " . mysqli_connect_error();
} 
$sql = "select * from user WHERE username = '{$_POST["username"]}'and password = '{$_POST["password"]}'";
$result = mysqli_query($con,$sql);

if($result !="0"){
 echo "succed";
 $_SESSION['user'] = $_POST["username"];
 $test = $_SESSION['user'];
 //echo $test;
 header("location:choice.html");
}else{
	echo "failed";
}
if(empty($_SESSION['user'])){
	header("location:login.html");
}
?>