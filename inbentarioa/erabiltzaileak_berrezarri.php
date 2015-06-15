<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEAK</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
		<meta http-equiv="Refresh" content="3;url=erabiltzaileak.php">
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $sql = "UPDATE erabiltzaileak SET pasahitza = '00000000' WHERE maila = 'Irakaslea' OR maila = 'Ikaslea'"; ?>
			<?php $result = mysql_query($sql); ?>
			<?php $sql = "UPDATE erabiltzaileak SET izena = erabiltzailea WHERE maila = 'Ikaslea'"; ?>
			<?php $result = mysql_query($sql); ?>
			<div class='center'>Irakasle eta ikasle guztiak berrezarri dira.</div>			
			<?php } else { ?>
				<?php header("location:sarrera_okerra2.html"); ?>
			<?php }; ?>
	</body>
</html>
