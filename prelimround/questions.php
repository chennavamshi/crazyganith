<?php
require '../connections/connect.inc.php';
include '../connections/core.inc.php';
$_SESSION['quiz'] = "given";
$arrCount = "";
if(isset($_GET['question'])){
	$question = preg_replace('/[^0-9]/', "", $_GET['question']);
	$output = "";
	$answers = "";
	$q = "";
	$sql = mysql_query("SELECT q_id FROM crazy_qdatabase");
	$numQuestions = mysql_num_rows($sql);
	if(!isset($_SESSION['answer_array']) || $_SESSION['answer_array'] < 1){
		$currQuestion = "1";
	}else{
		$arrCount = count($_SESSION['answer_array']);
	}
	if($arrCount > $numQuestions){
		unset($_SESSION['answer_array']);
		header("location: index.php");
		exit();
	}
	if($arrCount >= $numQuestions){
		echo 'finished|Here is your result!';
		exit();
	}

	$query_run = mysql_query("SELECT * FROM crazy_qdatabase WHERE q_id='".$_SESSION['shuffques'][$question-1]."' ");
            while($row = mysql_fetch_array($query_run)){
			$id = $row['q_id'];
			$thisQuestion = $row['ques'];
			$question_id = $question;
			$id = $question_id;
			$q = '<div id = "quiz"><center><table><tr><td>'.$question_id.')'.$thisQuestion.'<br/><br/></tr></td>';
                        $question = mysql_result($query_run,0,'ques');
                        $option1 = mysql_result($query_run,0,'o1');
                        $option2 = mysql_result($query_run,0,'o2');
                        $option3 = mysql_result($query_run,0,'o3');
                        $option4 = mysql_result($query_run,0,'o4');
                        $answer = mysql_result($query_run,0,'answer');
				if($answer == $option1)
                                $correct = 12;
                                else
                                $correct = 11;
				$answers = '<tr><td><input type="radio" class="rads" id="radio1" name="rads" value="'.$correct.'" /><label for="radio1" class="css-label">'.$option1.'</label>
				<input type="hidden" id="qid" value="'.$id.'" name="qid"></td></tr>
				';

				if($answer == $option2)
                                $correct = 22;
                                else
                                $correct = 21;
				$answers .= '<tr><td><input type="radio" class="rads" id="radio2" name="rads" value="'.$correct.'" /><label for="radio2" class="css-label">'.$option2.'</label>
				<input type="hidden" id="qid" value="'.$id.'" name="qid"></td></tr>
				';

				if($answer == $option3)
                                $correct = 32;
                                else
                                $correct = 31;
				$answers .= '<tr><td><input type="radio" class="rads" id="radio3" name="rads" value="'.$correct.'" /><label for="radio3" class="css-label">'.$option3.'</label>
				<input type="hidden" id="qid" value="'.$id.'" name="qid"></td></tr>
				';

				if($answer == $option4)
                                $correct = 42;
                                else
                                $correct = 41;
					$answers .= '<tr><td><input type="radio" class="rads" id="radio4" name="rads" value="'.$correct.'" /><label for="radio4" class="css-label">'.$option4.'</label>
				<input type="hidden" id="qid" value="'.$id.'" name="qid"><br/><br/></td></tr>
				';

			$output = ''.$q.' '.$answers.' <br/><br/><tr><td><span id="btnSpan"><button class = "myButton" onclick="post_answer()">Submit</button></span>&nbsp&nbsp&nbsp&nbsp&nbsp<span id="btnSpan"><button class = "myButton" onclick="post_answer()">Skip</button></span></tr></td></table></center></div>';
			echo $output;
		   }
		}


?>