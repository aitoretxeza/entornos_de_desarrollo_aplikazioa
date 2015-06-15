<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEA SORTU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=erabiltzaileak.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $erabiltzailea = $_SESSION['erabiltzailea_sortu']; ?>
			<?php $pasahitza = $_SESSION["pasahitza_sortu"]; ?>
			<?php $maila = $_SESSION["maila_sortu"]; ?>
			<?php $izena = $_SESSION["izena_sortu"]; ?>
							
			<!-- erabitzaile berria datu basean sartzeko -->
			
			<?php $sql = "INSERT INTO erabiltzaileak (erabiltzailea, pasahitza, maila, izena) VALUES ('$erabiltzailea', '$pasahitza', '$maila', '$izena')"; ?>
			<?php $result = mysql_query($sql); ?>
			<div class='center'>Hurrengo erabiltzailea, <b> INBENTARIOA </b> datu baseko <b> ERABILTZAILEAK </b> taulan sortu da.</br> </br>
				<table>
					<tr>
						<th>ERABILTZAILEA</th><th>PASAHITZA</th><th>MAILA</th><th>IZEN - DEITURAK</th>
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