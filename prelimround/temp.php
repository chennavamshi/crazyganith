<?php
require_once("scripts/connect_db.php");
$time =  date("Y-m-d H:i:s");
 $query = "INSERT INTO  `a_database`.`user_score` (
`username` ,
`date` ,
`ans_array` ,
`ques_array` ,
`score`
)
VALUES (
'123123',  '".$time."' ,  '456',  '798',  '456'
)";
             $query_run = mysql_query($query);
             echo $query_run;
?>