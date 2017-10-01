<?php
//ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];
//$http_referer = $_SERVER['HTTP_REFERER'];
function loggedin() {
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
return true;
}
else
return false;
}
function getfield($field) {
  if($_SESSION['mode'] == 0)
  {
  $query = "SELECT `$field` FROM `user` WHERE id = '".$_SESSION['user_id']."'";
  if($mysql_run = mysql_query($query)){
  return mysql_result($mysql_run,0,$field);
  }
  }
  else if($_SESSION['mode'] == 1)
  {
  $query = "SELECT `$field` FROM `google_user` WHERE `username` = '".$_SESSION['user_id']."'";
  //echo $query;
  if($mysql_run = mysql_query($query)){
  return mysql_result($mysql_run,0,$field);
  }
  }

}

?>