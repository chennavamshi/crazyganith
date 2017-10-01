<?php
$mysql_host = 'localhost';
/*$mysql_user = 'synapse';
$mysql_pass = '%synapse$';

$mysql_db = 'synapse';
*/
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'a_database';
if(@(!mysql_connect($mysql_host, $mysql_user, $mysql_pass)|| !mysql_select_db($mysql_db))){
die('Error Message - 501');
}

?>