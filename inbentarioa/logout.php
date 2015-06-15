<?php

	// Sesioa amaitzeko //

    session_start();
    session_destroy();
    header("location: sarrera.html");

?>