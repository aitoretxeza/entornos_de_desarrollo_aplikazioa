<?php session_start(); ?>
<html>
	<head>
		<title>INBENTARIOA</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php if (isset($_SESSION["erabiltzailea"])) { ?>			
			<div class="menua">			
				<h1><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></h1>
				<h1>INBENTARIOA</h1>
				<a href="erabiltzaileak_manipulatu.php"><h3><?php echo $_SESSION['izena']; ?></h3></a>
				<fieldset class="mezua">
					<form action='datuak_kontsultatu.php' method='post' class="kontsulta">
						<label>EJ - KODEA</label>
						<select name="ejkodea">
							<option selected value=""></option>
							<option value="bai">Bai</option>
							<option value="ez">Ez</option>
						</select>
						</br></br>
						<label>MAKINA MOTA</label>
						<select name="mota">
							<option selected value=""></option>
							<?php include_once "konexioa.php"; ?>
							<?php $result = mysql_query("SELECT * FROM makinak GROUP BY mota", $link); ?>
							<?php if ($row = mysql_fetch_array($result)); { ?>
								<?php do { ?>
									<option value='<?php echo $row['2'] ?>'><?php echo $row["2"] ?></option>
								<?php } while ($row = mysql_fetch_array($result)); ?>
							<?php }; ?>
						</select>
						</br></br>
						<label>KOKAPENA</label>
						<select name="kokapena">
							<option selected value="">INSTITUTUA</option>
							<?php include_once "konexioa.php"; ?>
							<?php $result = mysql_query("SELECT * FROM makinak GROUP BY kokapena", $link); ?>
							<?php if ($row = mysql_fetch_array($result)); { ?>
								<?php do { ?>
									<option value='<?php echo $row['4'] ?>'><?php echo $row["4"] ?></option>
								<?php } while ($row = mysql_fetch_array($result)); ?>
							<?php }; ?>
						</select>
						</br></br>
						<input type='submit' value='KONTSULTATU'/>
					</form>
				</fieldset>
				<?php if ($_SESSION['maila'] == 'Administratzailea') { ?>
					<form action="" method="POST" class="botoia">
						<a href="erabiltzaileak.php"><button type="button">ERABILTZAILEAK</button></a>
					</form>
				<?php }; ?>
				<form action="" method="POST" class="botoia">							
					<div class="atzera">
						<a href="logout.php"><button type="button">IRTEN</button></a>
					</div>
				</form>
			</div>
			<?php include_once "konexioa.php"; ?>
			<?php $result = mysql_query("SELECT * FROM makinak ORDER BY kokapena, mota, kodea", $link); ?>
				
			<!-- datu baseko datuak pantailaratzeko -->
	
			<?php if ($row = mysql_fetch_array($result)); { ?>
				<div class='edukia1'>
					<table>
						<tr>
							<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
						</tr>
						<?php if (($_SESSION['maila'] == 'Administratzailea') || ($_SESSION['maila'] == 'Irakaslea')) { ?>
							<form action="datuak_manipulatu.php" method="post" class="datuak">
								<tr>
									<th><input name="kodea" type="text" maxlength="12" required></th>
									<th><input name="ejkodea" maxlength="8" type="text"></th>
									<th><input name="mota" type="text" required></th>
									<th><input name="modeloa" type="text"></th>
									<th><input name="kokapena" type="text" required></th>									
									<th class="botoia"><input type='image' src="irudiak/datua_sartu.png" width="50" height="50" name="sartu" value='SARTU'/></th>
								</tr>
							</form>								
						<?php }; ?>
						<form action="datuak_manipulatu.php" method="post" class="datuak">
							<?php do { ?>
								<tr>
									<td><?php echo $row["0"]; ?></td>
									<td><?php echo $row["1"]; ?></td>
									<td><?php echo $row["2"]; ?></td>
									<td><?php echo $row["3"]; ?></td>
									<td><?php echo $row["4"]; ?></td>
									<?php if (($_SESSION['maila'] == 'Administratzailea') || ($_SESSION['maila'] == 'Irakaslea')) { ?>
										<td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>										
									<?php }; ?>
								</tr>
							<?php } while ($row = mysql_fetch_array($result)); ?>
						</form>
					</table>
				</div>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php } ?>
	</body>
</html>