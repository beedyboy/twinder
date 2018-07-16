<?php 
include('../../includes/system2.php');
$answerString = $_GET['answers'];

$questionsString = $_GET['questions'];

$bankId=$_GET['bankId'];
?>

<?php $subId = Database::getName('beedygroupsub', 'bankId',$bankId,1); ?>
<?php $exambankId = Database::getName('beedygroupsub', 'bankId',$bankId, 3); ?> 
<?php $examTypeId = Database::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = Database::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
<?php $TotalQuestion = Database::getName('beedygroupsub', 'bankId',$bankId,7); ?>
<?php $mark = Database::getName('beedygroupsub', 'bankId',$bankId,8); ?>
<?php $show_result = Database::getName('beedygroupsub', 'bankId',$bankId, 11); ?>
<?php 

$questionGiven = array(); 
$questionGiven = $_SESSION['final'];
$question = array();

$answer = explode(',', $answerString);

$question = explode(',', $questionsString); 


$CurrentSession =  Database::getField('beedyschooldata', 7);
$CurrentTerm =  Database::getField('beedyschooldata', 8);


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
 
foreach ($question as $key=>$val)
{
$rightAnswer = $GetExam->markExam($val); 
echo "<br />";

if (array_key_exists($key, $answer)):
if($rightAnswer===$answer[$key]){

$score=$score+$mark;

}
else
{
$score=$score;
}
endif;
} 
$expected=($TotalQuestion * $mark);

$result = ($score / $TotalQuestion) * 100;
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

$GetExam->saveResult($bankId, $stdAddNum, $CurrentSession, $CurrentTerm, $score, $perc, $today,$questionGiven,$questions,$answers);


  "<br>";
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