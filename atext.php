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
if($peername != "0"){
$sql = "INSERT INTO message (sendername, groupID, recieveName, title, mType, Message)
VALUES ('$myname', '1', '$peername', '$title','1', '$content')";
if ($conn->query($sql) === TRUE){
header("location:choice.html");
}else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{
	$sql1 = "SELECT username FROM user";
	$result = $conn->query($sql1);
	if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$name = $row["username"];
		$sql2 = "INSERT INTO message (sendername,groupID,recieveName,title,mType,Message)
		VALUES ('admin','1','$name','$title','0','$content')";
		if ($conn->query($sql2) === TRUE){
			
			}else{
				echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	}
}
header("location:choice.html");
$conn->close();
?>