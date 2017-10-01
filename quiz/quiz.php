<?php
session_start();
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	if(!isset($_SESSION['qid_array']) && $question != 1){
		$msg = "Your Score is sucessfully submitted! <br>";
                 if($_SESSION['score']!="")
                 {
                    $msg = "".$msg."and Your score is ".$_SESSION['score']." percent.";
                 }
		header("location: ../index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($question, $_SESSION['qid_array'])){
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha!!.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		unset($_SESSION['lastQuestion']);
		//session_destroy();
		header("location: ../index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		$msg = "Sorry, Cheating is not allowed. You will now have to start over. Haha!!.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		unset($_SESSION['lastQuestion']);
		//session_destroy();
		header("location: ../index.php?msg=$msg");
		exit();
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Quiz Page</title>
<link href="stylequiz.css" rel="stylesheet">
<script>
function getQuestion(){
	var hr = new XMLHttpRequest();
		hr.onreadystatechange = function(){
		if (hr.readyState==4 && hr.status==200){
			var response = hr.responseText.split("|");
			if(response[0] == "finished"){
				document.getElementById('status').innerHTML = response[1];
			}
			var nums = hr.responseText.split(",");
			document.getElementById('question').innerHTML += nums[0];
			//document.getElementById('question').innerHTML += nums[1];
		}
	}
hr.open("GET", "questions.php?question=" + <?php echo $question; ?>, true);
  hr.send();
}
function x() {
		var rads = document.getElementsByName("rads");
		for ( var i = 0; i < rads.length; i++ ) {
		if ( rads[i].checked ){
		var val = rads[i].value;
		return val;
		}
	}
}
function post_answer(){
	var p = new XMLHttpRequest();
			var id = document.getElementById('qid').value;
			var url = "userAnswers.php";
			var vars = "qid="+id+"&radio="+x();
			p.open("POST", url, true);
			p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			p.onreadystatechange = function() {
		if(p.readyState == 4 && p.status == 200) {
			document.getElementById("status").innerHTML = p.responseText;
			//alert("Thanks, Your answer was submitted"+ p.responseText);
			var url = 'quiz.php?question=<?php echo $next; ?>';
			window.location = url;
	}
}
p.send(vars);
document.getElementById("status").innerHTML = "processing...";

}
</script>

<link rel="stylesheet" href="css/quizstyle.css">
</head>

<body onLoad="getQuestion()">
<div id="status">
<div id="counter_status"></div>
<div id="question" class="res">

</div>
</div>
</body>
</html>