<?php
session_start();
$link=new mysqli("localhost","root","123","iot");
$peername=$_POST['username'];
$title=$_POST['title'];
$filename=$_FILES['mypic']['name'];
$type=$_FILES['mypic']['type'];
$tmp_name=$_FILES['mypic']['tmp_name'];
$error=$_FILES['mypic']['error'];
$size=$_FILES['mypic']['size'];
$destination="img/".$filename;
$sender=$_SESSION['user'];

if($error==UPLOAD_ERR_OK){
    if(is_uploaded_file($tmp_name)){
        if(move_uploaded_file($tmp_name, $destination)){
            $mes="upload succsed";
            $sql="insert into pic (sendername, recieveName, title, filename, type, des, size) values ('{$sender}','{$peername}','{$title}','{$filename}','{$type}','{$destination}','{$size}')";
            mysqli_query($link, $sql);
        }else{
            echo "failed to move"; 
				//$mes="failed to upload";
        }
    }
}else{
    switch ($error){
        case 1:
            echo "too large";
            break;
        case 2:
            echo "too large";
            break;
        case 3:
            echo "upload part of the file";
            break;
        case 4:
            echo "no file";
            break;
        case 6:
            echo "can't find the path";
            break;
        case 7:
            echo "can't write";
            break;
        case 8:
            echo "PHP problem";
            break;

    }
}

mysqli_close($link);

echo"<script>history.go(-1);</script>";
?>