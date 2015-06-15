<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEA EGUNERATU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=erabiltzaileak.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $kodea = $_POST["kodea"]; ?>
			<?php $erabiltzailea = $_POST["erabiltzailea"]; ?>
			<?php $pasahitza = $_POST["pasahitza"]; ?>
			<?php $maila = $_POST["maila"]; ?>
			<?php $izena = $_POST["izena"]; ?>
				
			<!-- erabiltzaile baten datuak eguneratzeko -->

			<?php $sql = "UPDATE erabiltzaileak SET erabiltzailea = '$erabiltzailea', pasahitza = '$pasahitza', maila = '$maila', izena = '$izena' WHERE kodea = '$kodea'"; ?>
			<?php $result = mysql_query($sql); ?>
			<div class='center'>Erabiltzailea <b> INBENTARIOA </b> datu baseko <b> ERABILTZAILEAK </b> taulan eguneratu da.</br> </br>
				<table>
					<tr>
						<th>ERABILTZAILEA</th><th>PASAHITZA</th><th>MAILA</th><th>IZENA - DEITURAK</th>
					</tr>
					<tr>
						<td><?php echo $erabiltzailea; ?></td><td><?php echo $pasahitza; ?></td><td><?php echo $maila; ?></td><td><?php echo $izena; ?></td>
					</tr>
				</table>
			</div>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>