<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEA</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=logout.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $kodea = $_POST["kodea"]; ?>
			<?php $izena = $_POST["izena"]; ?>
			<?php $pasahitza = $_POST["pasahitza"]; ?>
			<?php $pasahitza2 = $_POST["pasahitza2"]; ?>
			<?php if($pasahitza != $pasahitza2) { ?>
				<div class='center'>Pasahitzak ez dira berdinak!!</div>
			<?php } else { ?>
				<?php $sql = "UPDATE erabiltzaileak SET izena = '$izena', pasahitza = '$pasahitza' WHERE kodea = '$kodea'"; ?>
				<?php $result = mysql_query($sql); ?>
				<div class='center'>Zure erabiltzailearen perfila eguneratu da.</br>Saioa berriro hasi behar duzu aldaketak gorde daitezen.</div>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>