<?php
// Configuration file for XXXX system
$host = "localhost";
$database = "story_mosaic";
$db_user = "storymosaic";
$db_pass = "storymosaic";

mysql_connect("$host", "$db_user", "$db_pass") or die("Error al conectarse con el servidor MySQL");
mysql_select_db("$database") or die("Error al seleccionar la base de datos");
?>