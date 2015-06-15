<?php session_start(); ?>
<html>
	<head>
		<title>KONTSULTA</title>
		<link rel="stylesheet" type="text/css" href="estiloa.css">
		<link rel="icon" type="image/png" href="irudiak/logoa.png" />
	</head>
	<body>
		<?php if (isset ($_SESSION["erabiltzailea"])) { ?>
			<?php include_once "konexioa.php"; ?>
			<?php $ejkodea = $_POST["ejkodea"]; ?>
			<?php $mota = $_POST["mota"]; ?>
			<?php $kokapena = $_POST["kokapena"]; ?>
			<?php if($ejkodea=="bai") { ?>
				<?php if(!empty($mota)) { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "bai", makina mota: "bai", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">bai</div></br>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div></br>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NOT NULL AND mota = '$mota' AND kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "bai", makina mota: "bai", kokapena: "ez" -->
						
						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">bai</div></br>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NOT NULL AND mota = '$mota' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php }; ?>
				<?php } else { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "bai", makina mota: "ez", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">bai</div></br>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NOT NULL AND kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "bai", makina mota: "ez", kokapena: "ez" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">bai</div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NOT NULL ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php }; ?>
				<?php }; ?>
			<?php }; ?>

			<?php if($ejkodea=="ez") { ?>
				<?php if(!empty($mota)) { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "ez", makina mota: "bai", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">ez</div></br>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div></br>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NULL AND mota = '$mota' AND kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "ez", makina mota: "bai", kokapena: "ez" -->

												<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">ez</div></br>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NULL AND mota = '$mota' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php }; ?>
				<?php } else { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "ez", makina mota: "ez", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">ez</div></br>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NULL AND kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "ez", makina mota: "ez", kokapena: "ez" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Eusko Jaurlaritzaren kodea: </label><div class="mayus_i">ez</div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE ejkodea IS NULL ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php }; ?>
				<?php }; ?>
			<?php }; ?>
			
			
			<?php if(empty($ejkodea)) { ?>
				<?php if(!empty($mota)) { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "bai/ez", makina mota: "bai", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div></br>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE mota = '$mota' AND kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "bai/ez", makina mota: "bai", kokapena: "ez" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Makina mota: </label><div class="mayus_i"><?php echo $mota; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE mota = '$mota' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php }; ?>
				<?php } else { ?>
					<?php if(!empty($kokapena)) { ?>

						<!-- Eusko Jaurlaritza kodea: "bai/ez", makina mota: "ez", kokapena: "bai" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
							<label>Kokapena: </label><div class="mayus_i"><?php echo $kokapena; ?></div>
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<?php $sql = "SELECT * FROM makinak WHERE kokapena = '$kokapena' ORDER BY kokapena, mota, kodea"; ?>
						<?php $result = mysql_query($sql); ?>
						<?php if ($row = mysql_fetch_array($result));{ ?>
							<div class="edukia1">
								<table>
									<tr>
										<th>KODEA</th><th>EJ - KODEA</th><th>MAKINA MOTA</th><th>MODELOA</th><th>KOKAPENA</th>
									</tr>
									<form action="datuak_manipulatu.php" method="post" class="datuak">
										<?php do{ ?>
											<tr>
												<td><?php echo $row["0"]; ?></td><td><?php echo $row["1"]; ?></td><td><?php echo $row["2"]; ?></td><td><?php echo $row["3"]; ?></td><td><?php echo $row["4"]; ?></td><td><input type="image" src="irudiak/datua_manipulatu.png" width="50" height="50" name="manipulatu" value="<?php echo $row[0]; ?>"></td>
											</tr>
										<?php } while ($row = mysql_fetch_array($result)); ?>
									</form>
								</table>
							</div>
						<?php }; ?>
					<?php } else { ?>

						<!-- Eusko Jaurlaritza kodea: "bai/ez", makina mota: "ez", kokapena: "ez" -->

						<div class="menua">
							<h1><a href="index.php"><img src="irudiak/logoa.png" alt="Tolosaldeako logoa" /></a></h1>
							<h1>INBENTARIOA</h1>
							<h2>KONTSULTAREN</br>EMAITZA</h2>
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
							<form action="" method="POST" class="botoia">
								<div class="atzera">
									<a href="index.php"><button type="button">ATZERA</button></a>
								</div>
							</form>
						</div>
						<div class="edukia1">
							<p>EZ DUZU KONTSULTARIK EGIN</p>
						</div>
					<?php }; ?>
				<?php }; ?>
			<?php }; ?>
		<?php } else { ?>
			<?php header("location:sarrera_okerra2.html"); ?>
		<?php }; ?>
	</body>
</html>