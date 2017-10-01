<?php
require 'connections/core.inc.php';
require 'connections/connect.inc.php';
if(isset($_SESSION['quiz']))
{
$username = $_SESSION['username'];
$query = "SELECT `username` FROM `crazyscore` WHERE `username` = '$username'";
$query_run = mysql_query($query);
$query_num_rows = mysql_num_rows($query_run);
     if($query_num_rows == 0)
     {
     $time = date("Y-m-d H:i:s");
     $ans = implode(" ",$_SESSION['answer_array']);
     $ques = implode(" ",$_SESSION['qid_array']);
     $percent = $_SESSION['score'];
              $query = "INSERT INTO  `a_database`.`crazyscore` (
              `username` ,
              `date` ,
              `ans_array` ,
              `ques_array` ,
              `score`
              )
              VALUES (
              '".$username."',  '".$time."' ,  '".$ans."',  '".$ques."',  '".$percent."'
              )";
             //echo $query;
             $query_run = mysql_query($query);
     //echo "came here";
     }
}
session_destroy();
header('Location:'.'index.php');

?>

