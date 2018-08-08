<?php
session_start();

$con=mysqli_connect("localhost","root","123","iot");
// ¼ì²âÁ¬½Ó
if (mysqli_connect_errno())
{
    echo "failed to connect: " . mysqli_connect_error();
}
$mid = $_POST["mid"];
$mid1 =(int)($mid);
$content = $_POST["content"];
$name = $_SESSION['user'];
mysqli_query($con,"UPDATE message SET Message='$content' WHERE mID=$mid1");
mysqli_close($con);
header("location:atextr.php");
?>