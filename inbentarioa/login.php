<html>
	<head>
		<title>. : LOGIN : .</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php session_start(); ?>
		<?php include_once "konexioa.php"; ?>
		<?php $erabiltzailea = $_POST["user"]; ?>
		<?php $maila = $_POST["maila"]; ?>
		<?php $pasahitza = $_POST["password"]; ?>
		<?php $sql = mysql_query("SELECT * FROM erabiltzaileak WHERE erabiltzailea='".$erabiltzailea."' AND maila='".$maila."' AND pasahitza='".$pasahitza."'"); ?>
		<?php if($row = mysql_fetch_array($sql)) { ?>
			<?php $_SESSION['kodea'] = $row['kodea']; ?>
			<?php $_SESSION['erabiltzailea'] = $row['erabiltzailea']; ?>
			<?php $_SESSION['maila'] = $row["maila"]; ?>
			<?php $_SESSION['pasahitza'] = $row['pasahitza']; ?>
			<?php $_SESSION['izena'] = $row["izena"]; ?>
			<?php header("Location: index.php"); ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra.html"); ?>
		<?php }; ?>
	</body>
</html>