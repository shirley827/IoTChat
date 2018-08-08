<?php
session_start();
$username = $_SESSION["user"];
$cho = $_POST["choice"];
echo $cho;
if(empty($_SESSION['user'])){
	header("location:login.html");
}
if($cho != "sent"){
if($username != "admin"){
header("location:recieve.html");
}else{
header("location:adrecieve.html");
}
}else{
	if($username != "admin"){
header("location:sent.html");
}else{
	header("location:adsent.html");
	}
}
?>