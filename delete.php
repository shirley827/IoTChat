<?php
session_start();

$con=mysqli_connect("localhost","root","123","iot");
// �������
if (mysqli_connect_errno())
{
    echo "����ʧ��: " . mysqli_connect_error();
}
$mid = $_POST["deleteid"];
$mid1 =(int)($mid);
$name = $_SESSION['user'];
mysqli_query($con,"DELETE FROM message WHERE mID=$mid1");
mysqli_close($con);
header("location:choice.html");
?>