<!-- CREATE USER herouser WITH PASSWORD 'heroherohero'; -->
<!-- CREATE DATABASE hero_dev OWNER herouser; -->

<?php

	function getDb(){

		$db = pg_connect("host=localhost port=5432 dbname=hero_dev user=herouser password=heroherohero");

		return $db;
	}
 
 // var_dump(getdb());

?>
