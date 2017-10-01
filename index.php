<?php
require_once '/connections/openid.php';
require '/connections/connect.inc.php';
require '/connections/core.inc.php';
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	$msg = strip_tags($msg);
	$msg = addslashes($msg);
	
}
if(loggedin())
{

$firstname = getfield('firstname');
$surname = getfield('surname');
$_SESSION['username'] = $firstname;
//echo "User ID".$_SESSION['user_id'];
//echo "You are logged in, ".$firstname." ".$surname."<a href = 'logout.php'> Logout </a><br>";
//include 'timer\timer.html';
//include 'calc\index.html';
include 'userpage.html';
//echo " <a href = 'quiz\index.php'> Give a Sample Quiz </a> "     ;
}
else{
include 'login.php';
}
?>


