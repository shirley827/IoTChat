<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystlforlogin.css">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
</head>

<body>

<div class="container">
<div id="backg"></div>
<header>
   <h1>IoT talker</h1>
</header>
<nav>
  <ul>
    <li class="hbar1"><a href="index.html">Home</a></li>
	<li class="hbar1"><a href="choice.html">Choice action</a></li>
	<li class="hbar1"><a href="adrecieve.html">Choice type</a></li>
  	<li class="hbar1"><a href = "logout.php">Sign out</a></li>
  </ul>
</nav>
<article>
<table>                           
        <tr>
            <th>Title</th>
            <th>Sender info</th>
            <th>Voice</th>
			<th>Delete</th>
        </tr>
		<?php
				$username=$_SESSION['user'];
                $link=new mysqli("localhost","root","123","iot"); 
                $sql="select title,sendername,des,mID from voice";
                $result=mysqli_query($link, $sql);
				$i=1;		
               while($row=mysqli_fetch_row($result)){
                $_SESSION['myvoicename{$i}']=$row[0];
                $title=$row[0];
				$sender=$row[1];
                $destination=$row[2];
				$mid=$row[3];
                //中括号中的数字取决于储存上传文件数据的数据库中列的顺序；
                echo "<tr>
                          <td><input name='title".$i."' type='type' placeholder='".$title."' style='width:300px'></input></td>".
                          "<td><input name='sendername' type='type' placeholder='".$sender."' style='width:300px'></input></td>".
                         "<td><td><audio src='".$destination."' controls='controls'>Your browser does not support the audio element.</audio></td>".
						 "<td><a href='deletevoice.php?mid=".$mid."'>delete</a>
                     </tr>";
                $i++;
            }
			
			?>
   </table>
</article>
  <footer>Copyright &copy;</footer>
</div>
</body>
</html>