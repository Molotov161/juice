<?php
$bdd = new PDO("mysql:host=127.0.0.1;dbname=chat_discution;charset=utf8", "root", "");
if (isset($_POST['pseudo']) AND isset($_POST['message']) AND !empty($_POST['message']) AND !empty($_POST['message'])) 
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$message = htmlspecialchars($_POST['message']);
	$dougueul = $bdd->prepare('INSERT INTO chat(pseudo, message) VALUES(?, ?)');
	$dougueul->execute(array($pseudo, $message));
}
?>
<!DOCTYPE html>
<html>
<head>
	<title> </title>
	<meta charset="utf-8">
</head>
<body>

	<center> 
		<h1>DISCUTION EN COURS</h1>
		<form method="POST" action="">
		<input type="text" name="pseudo" placeholder="PSEUDO"/><br><br>
		<textarea type="text" name="message" placeholder="MESSAGE" /></textarea><br><br>
		<input type="submit" value="Envoyer" />
	</form></center>
	<?php
		
	$recup = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0, 5');
		while($emette = $recup->fetch())
	{
	?>
	<br><b><?php echo $emette['pseudo']; ?> : </b><?php echo $emette['message']; ?><br />
	<?php 
	 }
	 ?>

</body>
</html>