<?php
require 'connections/connect.inc.php';
session_start();
$username = $_SESSION['username'];
$query = "SELECT * FROM `crazyscore` WHERE `username` = '$username'";
$query_run = mysql_query($query);
$query_num_rows = mysql_num_rows($query_run);
     if($query_num_rows > 0)
     {
         $ans  = mysql_result($query_run,0,'ans_array');
         $ques = mysql_result($query_run,0,'ques_array');


?>
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-theme.css" rel="stylesheet">
<link href="css/bootstrap-theme.min.css" rel="stylesheet">
<script src="scripts/jquery-1.10.2.min.js"></script>
<script src="scripts/bootstrap.js"></script>
<script src="scripts/holder.js"></script>
<style type="text/css">
.asdf{
  width : 100%;

}
</style>
</head>
<body>
<center>
<div class = "asdf">
<div class="table-responsive">
<table class="table table-bordered">
<tr>
	<thead><tr><th>Q_No</th><th>Question</th><th>Correct Answer</th><th>Your Answer</th><th>Result</th></tr></thead>
</tr>
<?php
    $j = 0;
    $k = 0;
    $t =  strlen($ans)/3+1;
   //echo $t;
      for($i=1;$i<=$t;$i++)
      {
        $qq = $ques[$j];
        if($j!=strlen($ques)-1)
        if($ques[$j+1] != " "  and $ques[$j+1]!="")
        {
        $qq = 10*$ques[$j]+$ques[$j+1];
        $j++;
        }
      $query = "SELECT * FROM `crazy_qdatabase` WHERE `q_id` = ".$qq;
      //echo $query;
    if( $query_run = mysql_query($query)){
     //echo $query;
      $query_num_rows = mysql_num_rows($query_run);
      //echo $query_num_rows;
      if ($query_num_rows == 0){
           echo $query;
      echo 'Error Connecting to Database.';
      }
      else if($query_num_rows == 1){
      $question = mysql_result($query_run,0,'ques');
      $answer = mysql_result($query_run,0,'answer');
      $option1 = mysql_result($query_run,0,'o1');
      $option2 = mysql_result($query_run,0,'o2');
      $option3 = mysql_result($query_run,0,'o3');
      $option4 = mysql_result($query_run,0,'o4');
      $my_answer = array($option1,$option2,$option3,$option4);
      $xa = intval($ans[$k]);
      //echo $xa;
      if($xa!=5)
      {
      $myans = $my_answer[$xa -1];
      if($myans == $answer)
      {
      $color = "success";
      $button = "Correct";
      }
      else
      {
      $color = "danger";
      $button = "Wrong";
      }
      }
      else
      {
      $myans = "Not Answered";
      $color = "info";
      $button = "Skipped";
      }
      echo "<tr class = 'active'> <td>".$i."</td><td>".$question."</td><td>".$answer."</td><td>".$myans."</td><td><a href='#' class='btn btn-$color btn-lg active' role='button'>".$button."</a></td></tr>";
      $j = $j + 2;
      $k = $k + 3;
      }
      }
      }
?>
</table>
</div>
</div>
</center>
      <?php
     }
      ?>