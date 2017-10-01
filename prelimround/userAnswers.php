<?php
require '../connections/connect.inc.php';
include '../connections/core.inc.php';
if(isset($_POST['radio']) && $_POST['radio'] != ""){
	$answer = preg_replace('/[^0-9]/', "", $_POST['radio']);
	if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
		$_SESSION['answer_array'] = array($answer);
	}else{
		array_push($_SESSION['answer_array'], $answer);
	}

}
if(isset($_POST['qid']) && $_POST['qid'] != ""){
	$qid = preg_replace('/[^0-9]/', "", $_POST['qid']);
	if(!isset($_SESSION['qid_array']) || count($_SESSION['qid_array']) < 1){
		$_SESSION['qid_array'] = array($_SESSION['shuffques'][$qid-1]);
	}else{
		array_push($_SESSION['qid_array'],$_SESSION['shuffques'][$qid-1]);
	}
	$_SESSION['lastQuestion'] = $qid;
}
?>
<?php

$response = "";
	if(!isset($_SESSION['answer_array']) || count($_SESSION['answer_array']) < 1){
		$response = "You have not answered any questions yet";
		echo $response;
	exit();
}else{
		$countCheck = mysql_query("SELECT q_id FROM crazy_qdatabase")or die(mysql_error());
		$count = mysql_num_rows($countCheck);
		$count = 30;
		$numCorrect = 0;
		foreach($_SESSION['answer_array'] as $current){
			if($current%10 == 2){
				$numCorrect = $numCorrect + 3 ;
			}
			else
                        if($current%10 == 1){
				$numCorrect = $numCorrect - 2 ;
			}
		}
		$percent = $numCorrect;
		$_SESSION['score'] = $percent;
		//$percent = intval($percent);
/*	if(isset($_POST['complete']) && $_POST['complete'] == "true"){
		if(!isset($_POST['username']) || $_POST['username'] == ""){
			echo "Sorry, We had an error";
			exit();
		}
		$username = $_POST['username'];
		$username = mysql_real_escape_string($username);
		$username = strip_tags($username);
	if(!in_array("1", $_SESSION['answer_array'])){
		echo "Did you even read the questions? You scored $percent%, You must be retarded.";
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		session_destroy();
		exit();
	}
	$sql = mysql_query("INSERT INTO quiz_takers (username, percentage, date_time)
	VALUES ('$username', '$percent', now())")or die(mysql_error());*/
	       if($count == $qid)
	       {
                 $username = $_SESSION['username'];
                 $time = date("Y-m-d H:i:s");
                 $ans = implode(" ",$_SESSION['answer_array']);
                 $ques = implode(" ",$_SESSION['qid_array']);
                  $_SESSION['score'] = $percent;
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

             $query_run = mysql_query($query);

		//echo "Thanks for taking the quiz! You scored $percent%";
	//	echo $percent;
		unset($_SESSION['answer_array']);
		unset($_SESSION['qid_array']);
		unset($_SESSION['lastQuestion']);
		//session_destroy();
		exit();
	}
}
?>