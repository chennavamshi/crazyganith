<?php
require '../connections/connect.inc.php';
include '../connections/core.inc.php';
if(!loggedin())
die();
$username = $_SESSION['username'];
$query = "SELECT `username` FROM `crazyscore` WHERE `username` = '$username'";
$query_run = mysql_query($query);
$query_num_rows = mysql_num_rows($query_run);
     if($query_num_rows > 0)
     {
     $msg= "You have already given the test.You are not allowed to give the test.";
     header("location: ../index.php?msg=$msg");
     exit();
     }
if(isset($_SESSION['quiz'])){
$msg = "You have given the test.You are not allowed to give the test again.<br>";
		header("location: ../index.php?msg=$msg");
		exit();
}

$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	$msg = strip_tags($msg);
	$msg = addslashes($msg);
}
$a = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
shuffle($a);
$_SESSION['shuffques'] = $a;
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Quiz Tut</title>
<link href="stylequiz.css" rel="stylesheet">
<script>

function startQuiz(url){
	window.location = url;
}
</script>
</head>
<body>

<div id = "back"
<?php echo $msg; ?>
<center>
<h3>Click below when you are ready to start the contest.</h3>
</center>
<font size="4">
<b> Instructions</b><br>
<ul>
  <li>The contest is for 60 minutes duration.</li>
  <li>There are 30 multiple questions.Each question has single correct answer.</li>
  <li>For every correct answer <b>+3</b> is awarded, <b>-2</b> for every wrong answer, <b>0</b> for skipping the question.</li>
  <li><font color=red>You cannot go back after submitting your answer.Any attempt to go back will result in immediate disqualification.</font></li>
  <li>Under any circumstances, the decision of the co-ordinator is final</li>
</ul>
<br>
<button onClick="startQuiz('quiz.php?question=1')">Click Here To Begin</button>
</div>
</font>
</body>
</html>