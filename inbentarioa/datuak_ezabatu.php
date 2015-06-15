<?php session_start(); ?>
<html>
	<head>
		<title>DATUAK EZABATU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=index.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php if (isset($_POST["bai"])) { ?>
				<?php include_once "konexioa.php"; ?>
				<?php $kodea = $_POST["kodea"]; ?>

				<!-- datuak ezabatzeko -->

				<?php $sql = "DELETE FROM makinak WHERE (kodea = '$kodea')"; ?>
				<?php $result = mysql_query($sql); ?>
				<div class='center'>Datuak <b>INBENTARIOA</b> datu baseko <b>MAKINAK</b> taulatik ezabatu dira.
			<?php } else { ?>
				<?php header("location:index.php"); ?>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>