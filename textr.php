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
$sql = "select sendername,title,Message from message where recieveName='$name'";
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
	<li class="hbar1"><a href="recieve.html">Choice type</a></li>
  	<li class="hbar1"><a href = "logout.php">Sign out</a></li>
  </ul>
</nav>
<article>
<p>Informations<p>
<?php foreach($row as$r): ?>
   <ul>
		<li><?php echo "{$r['sendername']} send a message to you";?></li>
		<li><?php echo "Title is {$r['title']}";?></li>
		<li><?php echo "Content is {$r['Message']}";?></li>
   </ul>
 <?php endforeach; ?>
</article>
  <footer>Copyright &copy;</footer>
</div>
</body>
</html>
