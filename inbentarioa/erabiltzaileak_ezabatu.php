<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEA EZABATU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=erabiltzaileak.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php if (isset($_POST["bai"])) { ?>
				<?php include_once "konexioa.php"; ?>
				<?php $kodea = $_POST["kodea"]; ?>

				<!-- datuak ezabatzeko -->
				
				<?php $sql = "DELETE FROM erabiltzaileak WHERE (kodea = '$kodea')"; ?>
				<?php $result = mysql_query($sql); ?>
				<div class='center'>Erabiltzailea <b> INBENTARIOA </b> datu baseko <b> ERABILTZAILEAK </b> taulatik ezabatu da.
			<?php } else { ?>
				<?php header("location:erabiltzaileak.php"); ?>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>