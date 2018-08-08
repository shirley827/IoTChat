<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "iot";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Á¬½ÓÊ§°Ü: " . $conn->connect_error);
} 

$peername = $_POST["username"];
$title = $_POST["title"];
$content = $_POST["content"];

if(empty($_SESSION['user'])){
	header("location:index.html");
}
$myname = $_SESSION['user'];

$sql = "INSERT INTO message (sendername, groupID, recieveName, title, mType, Message)
VALUES ('$myname', '1', '$peername', '$title','1', '$content')";
if ($conn->query($sql) === TRUE){
header("location:choice.html");
}else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>