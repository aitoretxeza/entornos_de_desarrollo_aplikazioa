<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEAK</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<?php $hitza = $_POST['hitza']; ?>
			<div class="menua">
				<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
				<h1>INBENTARIOA</h1>
				<h2>BILAKETAREN EMAITZA</h2>
				<?php if (!empty($hitza)) { ?>
					<h2 class="mayus">"<?php echo $hitza; ?>"</h2>
				<?php }; ?>
				<fieldset class="mezua">
					<p><b>BILATZAILEA</b></p>
					<form action="erabiltzaileak_bilaketa.php" method="post" class="kontsulta">
						<label>Izen-Deiturak</label><br /><input type="text" name="hitza">
						<input type="submit" name="bilatzailea" value="BILATU">
					</form>
				</fieldset>
				<form action="" method="POST" class="botoia">
					<div class="atzera">
						<a href="index.php"><button type="button">ATZERA</button></a>
					</div>
				</form>
			</div>
			<?php if ($_POST['bilatzailea']) { ?>
				<?php $hitza = $_POST['hitza']; ?>
				<?php include_once "konexioa.php"; ?>
				<?php $result = mysql_query("SELECT * FROM erabiltzaileak WHERE izena like '%$hitza%' ORDER BY maila, erabiltzailea", $link); ?>

				<!-- datu baseko datuak pantailaratzeko -->

				<?php if ($row = mysql_fetch_array($result)); { ?>
					<div class='edukia1'>
						<?php if(empty($hitza)) { ?>
							<p>Bilatzaileko laukitxoa hutsik utzi duzu.</p>
						<?php } else { ?>
							<table>
								<tr>
									<th>IZEN - DEITURAK</th><th>ERABILTZAILEA</th><th>PASAHITZA</th><th>MAILA</th>
								</tr>

								<!-- datuak pantailaratzeko eta datuak manipulatzeko botoia -->

								<?php do { ?>
									<form action="erabiltzaileak_manipulatu.php" method="post" class="datuak2">
										<tr>
											</td><td><?php echo $row["4"]; ?><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td class="center"><input type="image" src="irudiak/erabiltzailea_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
										</tr>
									</form>
								<?php } while ($row = mysql_fetch_array($result)); ?>
							</table>
						<?php }; ?>
					</div>
				<?php }; ?>
			<?php }; ?>		
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>