<?php
$link=new mysqli("localhost","root","123","iot");
$destination=$_GET['mid'];
$sql="delete from voice where mID='{$destination}'";

mysqli_query($link, $sql);
echo"<script>history.go(-1);</script>";
?>