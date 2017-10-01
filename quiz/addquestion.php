<?php
require '../connections/connect.inc.php';
 $query = "SELECT COUNT(*) FROM `question_database` ";
    if( $query_run = mysql_query($query)){
     // echo $query;
      $query_num_rows = mysql_num_rows($query_run);
      if ($query_num_rows == 0){
      echo 'Data Base Connection Error!';
      }
      else if($query_num_rows == 1){
      $no_of_ques = mysql_result($query_run,0);
      //echo $no_of_ques;
      }
    }

?>
<style type="text/css">
a:link {text-decoration:none;}
a:visited {text-decoration:none;}
a:hover {text-decoration:none;}
a:active {text-decoration:none;}
.button {
   border-top: 1px solid #96d1f8;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#65a9d7));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   padding: 5px 10px;
   -webkit-border-radius: 8px;
   -moz-border-radius: 8px;
   border-radius: 8px;
   -webkit-box-shadow: rgba(0,0,0,1) 0 1px 0;
   -moz-box-shadow: rgba(0,0,0,1) 0 1px 0;
   box-shadow: rgba(0,0,0,1) 0 1px 0;
   text-shadow: rgba(0,0,0,.4) 0 1px 0;
   color: white;
   font-size: 14px;
   font-family: Georgia, Serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border-top-color: #487cd4;
   background: #487cd4;
   color: #ccc;
   }
.button:active {
   border-top-color: #1b435e;
   background: #1b435e;
   }
table.gridtable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>
<table class="gridtable">
<tr>
	<th>Q_No</th><th>Question</th><th>Option 1</th><th>Option 2</th><th>Option 3</th><th>Option 4</th><th>Answer</th>
</tr>
<?php
      for($i=1;$i<=$no_of_ques;$i++)
      {
      $query = "SELECT * FROM `question_database` WHERE `q_id` = ".$i;
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
      $option1 = mysql_result($query_run,0,'o1');
      $option2 = mysql_result($query_run,0,'o2');
      $option3 = mysql_result($query_run,0,'o3');
      $option4 = mysql_result($query_run,0,'o4');
      $answer = mysql_result($query_run,0,'answer');
      echo "<tr> <td>".$i."</td><td>".$question."</td><td>".$option1."</td> <td>".$option2."</td><td>".$option3."</td><td>".$option4."</td><td>".$answer."</td></tr>";

      }
      }
      }
?>
</table>
      <button class ="button"> <a href = "addq.php">Add More Questions</a> </button>