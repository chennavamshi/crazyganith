<?php
require '../connections/connect.inc.php';
include '../connections/core.inc.php';
include 'addq.html';
  if( isset($_POST['ques']) && isset($_POST['o1']) && isset($_POST['o2']) && isset($_POST['o3']) && isset($_POST['o4'])&& isset($_POST['ans'])){
   $ques = $_POST['ques'];
   $o1 = $_POST['o1'];
   $o2 = $_POST['o2'];
   $o3 = $_POST['o3'];
   $o4 = $_POST['o4'];
   $ans = $_POST['ans'];
   if(!empty($ques) && !empty($o1) && !empty($o2) && !empty($o3) && !empty($o4)){
       if($ans == "o1")
        $answ = $o1;
        else
        if($ans == "o2")
        $answ = $o2;
        else
        if($ans == "o3")
        $answ = $o3;
        else
        $answ = $o4;
        $query = "SELECT COUNT(*) FROM `crazy_qdatabase` ";
    if( $query_run = mysql_query($query)){
     // echo $query;
      $query_num_rows = mysql_num_rows($query_run);
      if ($query_num_rows == 0){
      echo 'Data Base Connection Error!';
      }
      else if($query_num_rows == 1){
      $no_of_ques = mysql_result($query_run,0) +1;
      //echo $no_of_ques;
      }
    }
       $query = "INSERT INTO `crazy_qdatabase` VALUES (".$no_of_ques.", '".$ques."', '".$o1."' ,'".$o2."', '".$o3."', '".$o4."', '".$answ."')";
       if(mysql_query($query)){
       header('Location: addquestion.php');
       }
     }
     }
?>