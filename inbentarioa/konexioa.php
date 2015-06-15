<?php

	// datu basearekin konexioa //

	define('ZERBITZARIA','localhost');
	define('ERABILTZAILEA','root');
	define('DATU_BASE_IZENA','inbentarioa');
	
	$link = mysql_connect(ZERBITZARIA,ERABILTZAILEA)
		or die("<div class='error'>ERROREA! Ez da lortu datu basearekin konektatzea</div>");

	mysql_select_db(DATU_BASE_IZENA,$link)
		or die("<div class='error'>ERROREA! Datu basea ez da existitzen</div>");
?>
