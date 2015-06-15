<?php session_start(); ?>
<html>
	<head>
		<title>ERABILTZAILEAK</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>
			<div class="menua">
				<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
				<h1>INBENTARIOA</h1>
				<h2>ERABILTZAILEAK</h2>
				<fieldset class="mezua">
					<p><b>BILATZAILEA</b></p>
					<form action="erabiltzaileak_bilaketa.php" method="post" class="kontsulta">
						<label>Izen-Deiturak</label><br /><input type="text" name="hitza"><br /><br />
						<input type="submit" name="bilatzailea" value="BILATU">
					</form>
				</fieldset>
				<form action="" method="POST" class="botoia">
					<a href="erabiltzaileak_berrezarri.php"><button type="button">ERABILTZAILEAK BERREZARRI</button></a>
					<div class="atzera">
						<a href="index.php"><button type="button">ATZERA</button></a>
					</div>
				</form>
			</div>
			<?php include_once "konexioa.php"; ?>
			<?php $result = mysql_query("SELECT * FROM erabiltzaileak ORDER BY maila, erabiltzailea", $link); ?>

			<!-- datu baseko datuak pantailaratzeko -->

			<?php if ($row = mysql_fetch_array($result)); { ?>
				<div class='edukia1'>
					<table>
						<tr>
							<th>IZEN - DEITURAK</th><th>ERABILTZAILEA</th><th>PASAHITZA</th><th>MAILA</th>
						</tr>

						<!-- erabiltzaile berriak sortzeko formularioa -->

						<form action="erabiltzaileak_manipulatu.php" method="post" class="datuak">
							<tr>
								<th><input name="izena" type="text"></th>
								<th><input name="erabiltzailea" type="text" required></th>
								<th><input name="pasahitza" type="text" value="00000000" required></th>
								<th>
									<select name="maila" required>
										<option selected value="">- AUKERATU -</option>
										<option value="Administratzailea">Administratzailea</option>
										<option value="Irakaslea">Irakaslea</option>
										<option value="Ikaslea">Ikaslea</option>
									</select>
								</th>
								<th class="botoia"><input type='image' src="irudiak/erabiltzailea_sortu.png" width="50" height="50" name="sortu" value='SORTU'/></th>
							</tr>
						</form>

						<!-- datuak pantailaratzeko eta datuak manipulatzeko botoia -->

						<?php do { ?>
							<form action="erabiltzaileak_manipulatu.php" method="post" class="datuak">
								<tr>
									<td><?php echo $row["4"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><input type="image" src="irudiak/erabiltzailea_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
								</tr>
							</form>
						<?php } while ($row = mysql_fetch_array($result)); ?>
					</table>
				</div>
			<?php }; ?>			
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>