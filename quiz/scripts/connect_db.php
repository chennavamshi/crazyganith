<?php

$db_host = "localhost";
$db_username = "root";
$db_pass = "";
$db_name = "a_database";
/*$db_username = "synapse";
$db_pass = "%synapse$";
$db_name = "synapse";*/
mysql_connect("$db_host","$db_username","$db_pass") or die (mysql_error());
mysql_select_db("$db_name") or die ("no database");

?>