<?php
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
	$msg = strip_tags($msg);
	$msg = addslashes($msg);
}

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
<h3>Click below when you are ready to start the sample quiz</h3>
</center>
<b> Instructions</b><br>
<ul>
  <li>There is no time-limit for questions.</li>
  <li >All Questions are mutiple choice and have a single correct answer.</li>
  <li>There are in total of 4 questions.</li>
  <li>Happy Quizzing!.</li>
</ul>
<br><br>
<button onClick="startQuiz('quiz.php?question=1')">Click Here To Begin</button>
</div>


</body>
</html>