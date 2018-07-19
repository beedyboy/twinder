<?php 
include('../../includes/system2.php');


 $bankId=$_POST['bankId'];
  ?>
  
<?php $subId = System::getName('beedygroupsub', 'bankId',$bankId,1); ?>
 <?php $exambankId = System::getName('beedygroupsub', 'bankId',$bankId, 3); ?>
<?php $Exam_Instruction = System::getName('beedygroupsub', 'bankId',$bankId,5); ?>
<?php $duration = System::getName('beedygroupsub', 'bankId',$bankId,6); ?>
<?php $random = System::getName('beedygroupsub', 'bankId',$bankId,10); ?>
<?php $examTypeId = System::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = System::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
 <?php $TotalQuestion = System::getName('beedygroupsub', 'bankId',$bankId,7); ?>
 <?php $mark = System::getName('beedygroupsub', 'bankId',$bankId,8); ?>
 <?php $show_result = System::getName('beedygroupsub', 'bankId',$bankId, 11); ?>

 <?php   
$CurrentSession =  System::getField('beedyschooldata', 7);
$CurrentTerm =  System::getField('beedyschooldata', 8);


 $stdAddNum=$_SESSION['cbt']['stdAddNum'];
  

  $questionGiven = implode(',', $_POST['questionGiven']);

 
  $questionAnswer = array();
  $stdAnswer = array();
 
  $fulname = 
$_SESSION['cbt']['surname']. "\t". $_SESSION['cbt']['firstname'] . "\t". $_SESSION['cbt']['middlename'];
$today = date("Y-m-d");
 
  $score = 0;
 $perc='0%';
if(isset($_POST['options']))
{
  $count = count ($_POST['options']);
  if($count<=0)
  {
	  $score = 0;
  }
  else
  {
foreach ($_POST['options'] as $key=>$val)
{
	$answer = Examination::markExam($key);
	"<br />";
	 
	 //push questionAnswer
	 $questionAnswer[] = $key;
	
	 //push answer
	 $stdAnswer[] = $val;
	
	if($answer==$val){
		
	$score=$score+$mark;
			
		}
		else
		{
			$score=$score;
			}
		
	 echo "<br />";
}

  }
 
 
}
$questionAnswer = implode(',', $questionAnswer);
$stdAnswer = implode(',', $stdAnswer);

 
  echo "<br>";
	$expected = $TotalQuestion * $mark;
	
	$result = ($score / $expected) * 100;
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
	  $ex = Examination::saveResult($bankId, $stdAddNum, $CurrentSession, $CurrentTerm, $score, $perc, $today, $questionGiven, $questionAnswer, $stdAnswer);
    
  
  "<br>";
 unset($_POST); 
 session_unset();
		  session_destroy();
  		
  echo "<table id='whole1' width='100%' >
         
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