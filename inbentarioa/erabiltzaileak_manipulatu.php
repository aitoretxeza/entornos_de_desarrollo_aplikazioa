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
			<?php if (isset($_POST["sortu"])) { ?>
				<?php $_SESSION['erabiltzailea_sortu'] = $_POST["erabiltzailea"]; ?>
				<?php $_SESSION['pasahitza_sortu'] = $_POST["pasahitza"]; ?>
				<?php $_SESSION['maila_sortu'] = $_POST["maila"]; ?>
				<?php $_SESSION['izena_sortu'] = $_POST["izena"]; ?>
				<?php header("location:erabiltzaileak_sortu.php"); ?>
			<?php } else if (isset($_POST["manipulatu"])){ ?>
				<?php $kodea = $_POST["manipulatu"]; ?>
				<?php $result = mysql_query("SELECT * FROM erabiltzaileak WHERE kodea = '$kodea'", $link); ?>
				<?php $row = mysql_fetch_array($result); ?>
					<div class='edukia2'>
						<h1><a href='index.php'><img src='irudiak/logoa.png' alt='Tolosaldeako logoa' /></a></h1>
						<h1>ERABILTZAILEAK</h1>
						<h2>MANIPULATU</h2></br>
						<form action='erabiltzaileak_eguneratu.php' method='post' class='datuak'>
							<fieldset class="mezua">
								<div>
									<input name='kodea' type='hidden' value='<?php echo $row["kodea"]; ?>'>
									<label>IZEN - DEITURA</label><input name='izena' type='text' value='<?php echo $row["izena"]; ?>'></br></br>
									<label>ERABILTZAILEA</label><input name='erabiltzailea' type='text' value='<?php echo $row["erabiltzailea"]; ?>' required></br></br>
									<label>PASAHITZA</label><input name='pasahitza' type='text' value='<?php echo $row["pasahitza"]; ?>' required></br></br>
									<label>MAILA</label>
										<select name='maila' required>
											<option selected value='<?php echo $row["maila"]; ?>'><?php echo $row["maila"]; ?></option>
											<option value='Administratzailea'>Administratzailea</option>
											<option value='Irakaslea'>Irakaslea</option>
											<option value='Ikaslea'>Ikaslea</option>
										</select>
								</div></br>
								<div class='center'>
									<input type='submit' value='EGUNERATU'/>
									<a href="erabiltzaileak.php"><button type="button">ATZERA</button></a>
								</div>
							</fieldset>
						</form>
						<form action='erabiltzaileak_ezabatu.php' method='post' class='datuak'>
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
			<?php } else { ?>
				<?php $kodea = $_SESSION['kodea']; ?>
				<?php $erabiltzailea = $_SESSION['erabiltzailea']; ?>
				<?php $maila = $_SESSION['maila']; ?>
				<?php $pasahitza = $_SESSION['pasahitza']; ?>
				<?php $izena = $_SESSION['izena']; ?>
				<?php include_once "konexioa.php"; ?>
				<?php $result = mysql_query("SELECT * FROM erabiltzaileak WHERE kodea = '$kodea'", $link); ?>
				<?php $row = mysql_fetch_array($result); ?>
				<div class='edukia2'>
					<h1><a href='index.php'><img src='irudiak/logoa.png' alt='Tolosaldeako logoa' /></a></h1>
					<h1>ERABILTZAILEA</h1></br>
					<form action='erabiltzaileak_perfila.php' method='post' class='datuak'>
						<div>
							<input name='kodea' type='hidden' value='<?php echo $row["kodea"]; ?>'>
							<label>ERABILTZAILEA</label><input name='izena' type='text' value='<?php echo $row["erabiltzailea"]; ?>' readonly></br></br>
							<label>IZEN - DEITURAK</label><input name='izena' type='text' value='<?php echo $row["izena"]; ?>'></br></br>
							<label>PASAHITZA</label><input name='pasahitza' type='text' value='<?php echo $row["pasahitza"]; ?>' required></br></br>
							<label>PASAHITZA BERRIDATZI</label><input name='pasahitza2' type='text' value='<?php echo $row["pasahitza"]; ?>' required>
						</div></br>
						<div class='center'>
							<input type='submit' value='GORDE'/>
							<a href="index.php"><button type="button">ATZERA</button></a>
						</div>
					</form>			
				</div>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>