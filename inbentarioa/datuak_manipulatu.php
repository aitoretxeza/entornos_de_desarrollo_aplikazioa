<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEA MANIPULATU</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			
			<?php if (isset($_POST["sartu"])) { ?>
				<?php $_SESSION['kodea'] = $_POST["kodea"]; ?>
				<?php $_SESSION['ejkodea'] = $_POST["ejkodea"]; ?>
				<?php $_SESSION['mota'] = $_POST["mota"]; ?>
				<?php $_SESSION['modeloa'] = $_POST["modeloa"]; ?>
				<?php $_SESSION['kokapena'] = $_POST["kokapena"]; ?>
				<?php header("location:datuak_sartu.php"); ?>
			<?php } else { ?>
				<?php $kodea = $_POST["manipulatu"]; ?>
				<?php $result = mysql_query("SELECT * FROM makinak WHERE kodea = '$kodea'", $link); ?>
				<?php $row = mysql_fetch_array($result); ?>
					<div class='edukia2'>
						<h1><a href='index.php'><img src='irudiak/logoa.png' alt='Tolosaldeako logoa' /></a></h1>
						<h1>ERABILTZAILEAK</h1>
						<h2>MANIPULATU</h2></br>
						<form action='datuak_eguneratu.php' method='post' class='datuak'>
							<fieldset class="mezua">
								<div>
									<input name='kodea' type='hidden' value='<?php echo $row["kodea"]; ?>'>
									<label>KODEA</label><input name="kodea" type="text" value="<?php echo $row["0"]; ?>" readonly></br></br>
									<label>EJ-KODEA</label><input name='ejkodea' type='text' value='<?php echo $row["1"]; ?>'></br></br>
									<label>MOTA</label><input name='mota' type='text' value='<?php echo $row["2"]; ?>' required></br></br>
									<label>MODELOA</label><input name='modeloa' type='text' value='<?php echo $row["3"]; ?>'></br></br>
									<label>KOKAPENA</label><input name='kokapena' type='text' value='<?php echo $row["4"]; ?>' required>
								</div></br>
								<div class='center'>
									<input type='submit' value='EGUNERATU'/>
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</fieldset>
						</form>
						<form action='datuak_ezabatu.php' method='post' class='datuak'>
							<fieldset class="mezua">
								<div class='center2'>									
									<label>Erabiltzailea hau ezabatu nahi duzu?</label><br />
									<input name='kodea' type='hidden' value='<?php echo $row["kodea"]; ?>'>
									<input type='image' src="irudiak/tick.png" width="25" height="25" name="bai" value='BAI'/>
									<input type='image' src="irudiak/x.png" width="25" height="25" name="ez" value='EZ'/>
								</div>
							</fieldset>
						</form>			
					</div>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>