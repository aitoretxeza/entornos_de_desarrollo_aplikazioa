<?php session_start(); ?>
<html>
	<head>
		<title>DATUAK EGUNERATU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=index.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $kodea = $_POST["kodea"]; ?>
			<?php $ejkodea = $_POST["ejkodea"]; ?>
			<?php $mota = $_POST["mota"]; ?>
			<?php $modeloa = $_POST["modeloa"]; ?>
			<?php $kokapena = $_POST["kokapena"]; ?>

			<!-- makina baten datuak eguneratzeko -->
			
			<?php $sql = "UPDATE makinak SET ejkodea = '$ejkodea', mota = '$mota', modeloa = '$modeloa', kokapena = '$kokapena' WHERE kodea = '$kodea'"; ?>
			<?php $result = mysql_query($sql); ?>
			<div class='center'>Hurrengo datuak, <b>INBENTARIOA</b> datu baseko <b>MAKINAK</b> taulara eguneratu dira.</br> </br>
				<table>
					<tr>
						<th>KODEA</th><th>EJ - KODEA</th><th>MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
					</tr>
					<tr>
						<td><?php echo $kodea; ?></td><td><?php echo $ejkodea; ?></td><td><?php echo $mota; ?></td><td><?php echo $modeloa; ?></td><td><?php echo $kokapena; ?></td>
					</tr>
				</table>
			</div>		
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>