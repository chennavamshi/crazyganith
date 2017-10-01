<?php
session_start();
$minutes = 60;
$seconds = 0; // Enter seconds
$time_limit = ($minutes * 60) + $seconds + 1; // Convert total time into seconds
if(!isset($_SESSION["start_time"])){$_SESSION["start_time"] = mktime(date("G"),date("i"),date("s"),date("m"),date('d'),date('Y')) + $time_limit;} // Add $time_limit (total time) to start time. And store into session variable.
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$next = $question + 1;
	$prev = $question - 1;
	if(!isset($_SESSION['qid_array']) && $question != 1){
		$msg = "Your Score is sucessfully submitted! <br>";
                 //if($_SESSION['score']!="")
                 //{
                    $msg = "<b>".$msg." and Your score is ".$_SESSION['score']."  Come back at 9:20 to view your complete result</b>";
                 //}
		header("location: ../index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['qid_array']) && in_array($_SESSION['shuffques'][$question], $_SESSION['qid_array'])){
		$msg = "<b>Sorry, Cheating is not allowed.Please logout to submit your score.Come back at 9:20 to view your complete result. </b>";
                //unset($_SESSION['answer_array']);
		//unset($_SESSION['qid_array']);
		unset($_SESSION['lastQuestion']);
		//session_destroy();
		header("location: ../index.php?msg=$msg");
		exit();
	}
	if(isset($_SESSION['lastQuestion']) && $_SESSION['lastQuestion'] != $prev){
		$msg = "<b>Sorry, Cheating is not allowed.Please logout to submit your score.Come back at 9:20 to view your complete result. </b>";
                //unset($_SESSION['answer_array']);
		//unset($_SESSION['qid_array']);
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
<script src="countdown.js" type="text/javascript"></script>

<script>
function getQuestion(){
	var hr = new XMLHttpRequest();
		hr.onreadystatechange = function(){
		if (hr.readyState==4 && hr.status==200){
			var response = hr.responseText.split("|");
			if(response[0] == "finished"){
				document.getElementById('status').innerHTML = response[1];
			}
			var nums = hr.responseText.split("||||");
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
	return 50;
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
<style>
#txt {
border:2px solid grey;
font-family:verdana;
font-size:16pt;
font-weight:bold;
background: black;
width:70px;
text-align:center;
color:white;
}
</style>
<link rel="stylesheet" href="css/quizstyle.css">
</head>

<body onLoad="getQuestion()">
<input id="txt" readonly>
<script>
var ct = setInterval("calculate_time()",100); // Start clock.
function calculate_time()
{

 var end_time = "<?php echo $_SESSION["start_time"]; ?>"; // Get end time from session variable (total time in seconds).
 var dt = new Date(); // Create date object.
 var time_stamp = dt.getTime()/1000; // Get current minutes (converted to seconds).
 var total_time = end_time - Math.round(time_stamp); // Subtract current seconds from total seconds to get seconds remaining.
 var mins = Math.floor(total_time / 60); // Extract minutes from seconds remaining.
 var secs = total_time - (mins * 60); // Extract remainder seconds if any.
 if(secs < 10){secs = "0" + secs;} // Check if seconds are less than 10 and add a 0 in front.
 document.getElementById("txt").value = mins + ":" + secs; // Display remaining minutes and seconds.
 // Check for end of time, stop clock and display message.
 if(mins <= 0)
 {
  if(secs <= 0 || mins < 0)
  {
   clearInterval(ct);
   document.getElementById("txt").value = "0:00";
   alert("The time is up.Come back at 8:15 to view your result!");
   window.location="../logout.php";
   }
  }
 }
</script>
<div id="status">
<div id="counter_status"></div>
<div id="question" class="res">

</div>
</div>
<script>
</body>
</html>