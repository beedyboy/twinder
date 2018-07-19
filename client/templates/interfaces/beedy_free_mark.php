<?php 
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
include('../../includes/system2.php');
$answerString = $_GET['answers'];

$questionsString = $_GET['questions'];

$bankId=$_GET['bankId'];
?>

<?php $subId = System::getName('beedygroupsub', 'bankId',$bankId,1); ?>
<?php $exambankId = System::getName('beedygroupsub', 'bankId',$bankId, 3); ?> 
<?php $examTypeId = System::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = System::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
<?php $TotalQuestion = System::getName('beedygroupsub', 'bankId',$bankId,7); ?>
<?php $mark = System::getName('beedygroupsub', 'bankId',$bankId,8); ?>
<?php $show_result = System::getName('beedygroupsub', 'bankId',$bankId, 11); ?>
<?php
//echo "Thank you for successfully answering the questions\n";

 
$questionGiven = array(); 
$questionGiven = $_SESSION['final'];
$question = array();

$answer = explode(',', $answerString);

$question = explode(',', $questionsString); 


  $CurrentSession =  System::getField('beedyschooldata', 7);
 $CurrentTerm =  System::getField('beedyschooldata', 8);

 
$stdAddNum=$_SESSION['cbt']['stdAddNum'];


$fulname = 
$_SESSION['cbt']['surname']. "\t". $_SESSION['cbt']['firstname'] . "\t". $_SESSION['cbt']['middlename'];
$today = date("Y-m-d");

$score = 0;
$perc='0%';
unset($question[0]);
unset($answer[0]);
 
$questionGiven = implode(',', $questionGiven);
$questions = implode(',', $question);
$answers = implode(',', $answer);

//var_dump($questionGiven);
//var_dump($questions);
//var_dump($answers);
//var_dump(explode(',', $answers));

for($index =1; $index <= $TotalQuestion; $index++)
{
//$answer = Examination::markExam($index);
//		echo $index;
}
foreach ($question as $key=>$val)
{
$rightAnswer = Examination::markExam($val);
//echo "-".$answer[$key];
echo "<br />";

if (array_key_exists($key, $answer)):
if($rightAnswer===$answer[$key]){

$score = $score+$mark;

}
else
{
// $score=$score;
}
endif;
}
 
 
//echo "<br />Score\n";
//echo $score;
//echo "<br>";
$expected = $TotalQuestion * $mark; // 5 * 2 = 10

// $result = ($score / $TotalQuestion) * 100;  // 2/5 = 40%
$result = ($score / $expected) * 100;  // 2/5 = 40%
$perc= round($result,2).'%';

$show='';
$show1='';

if($show_result=='No')
{
$show='';
}

else
{
$show= "<span style=color:red;font-size:30px;text-align:center>Score: $score</span>";
echo "<br>";
$show1= "<span style=color:red;font-size:30px;text-align:center>Percentage: $perc</span>";

}

	$ex = Examination::saveResult($bankId, $stdAddNum, $CurrentSession, $CurrentTerm, $score, $perc, $today, $questionGiven, $questions, $answers);
	// Examination::saveResult($bankId, $stdAddNum, $CurrentSession, $CurrentTerm, $score, $perc, $today, $questionGiven, $questions, $answers);
 
 unset($_POST); 
if(!isset($_SESSION)){
	session_start();
}	
$_SESSION = array();
session_regenerate_id(); 
session_destroy();
  		
	  
echo "<table id='whole1' class='table table-condensed' >

<tr>

<td > 
<span style=color:white;font-size:30px;text-align:center>Congratulations $fulname
</span>
<br>
<span style=color:white;font-size:30px;text-align:center>You have successfully completed</span>

<span style=color:white;font-size:30px;text-align:center> the Examination</span>
<br> $show  <br>$show1  <br><p style=color:white;font-size:30px;text-align:center><a href=log/logout.php>Logout</a></p>
</td>

</tr>

</table>";
?> 