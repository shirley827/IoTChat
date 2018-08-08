<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "iot";
try{
$pdo = new PDO("mysql:host=localhost;dbname=iot","root","123");
}catch (PDOException $e){
	echo 'Connection failed: ' . $e->getMessage();
}

$name = $_SESSION['user'];
$sql = "select mID,sendername,recieveName,title,Message from message";
$result = $pdo->query($sql);
//$row = mysqli_fetch_array($result);
$row = $result->fetchAll();
/*
while($row = mysqli_fetch_array($result))
{
	echo $row['sendername'];
	echo "<br/>";
	echo $row['Message'];
	echo "<br/>";
}
*/
//mysqli_close($conn);
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
<form action="edit.php" method="post">
Input message ID and content you want to edit: <br><input type="text" placeholder="ID" name="mid"><br><input type="text" placeholder="Content" name="content">
<br><button class="but" value="Edit" type="submit">Submit</button><br>
</form>
<form action="delete.php" method="post">
Input message ID you want to delete:<br> <input type="text" name="deleteid"><br><button class="but" value="Delete" type="submit">Submit</button><br>
</form>
<?php foreach($row as$r): ?>
   <ul>
		<li><?php echo "Message ID is {$r['mID']}";?></li>
		<li><?php echo "{$r['sendername']} send a message to {$r['recieveName']}";?></li>
		<li><?php echo "Title is {$r['title']}";?></li>
		<li><?php echo "Content is {$r['Message']}";?></li>
   </ul>
 <?php endforeach; ?>
</article>
  <footer>Copyright &copy;</footer>
</div>
</body>
</html>
