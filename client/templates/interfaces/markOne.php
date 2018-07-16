<?php 
include('../../includes/system2.php');


 $bankId=$_POST['bankId'];
  ?>
  
<?php $subId = Database::getName('beedygroupsub', 'bankId',$bankId,1); ?>
 <?php $exambankId = Database::getName('beedygroupsub', 'bankId',$bankId, 3); ?>
<?php $Exam_Instruction = Database::getName('beedygroupsub', 'bankId',$bankId,5); ?>
<?php $duration = Database::getName('beedygroupsub', 'bankId',$bankId,6); ?>
<?php $random = Database::getName('beedygroupsub', 'bankId',$bankId,10); ?>
<?php $examTypeId = Database::getName('beedygroupsub', 'bankId',$bankId, 2); ?>
<?php $examType = Database::getName('beedyexamtype', 'examTypeId', $examTypeId,1); ?>
 <?php $TotalQuestion = Database::getName('beedygroupsub', 'bankId',$bankId,7); ?>
 <?php $mark = Database::getName('beedygroupsub', 'bankId',$bankId,8); ?>
 <?php $show_result = Database::getName('beedygroupsub', 'bankId',$bankId, 11); ?>

 <?php   
$CurrentSession =  Database::getField('beedyschooldata', 7);
$CurrentTerm =  Database::getField('beedyschooldata', 8);


 $stdAddNum=$_SESSION['cbt']['stdAddNum'];
  
 
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
	$answer = $GetExam->markExam($key);
	"<br />";
	 
	
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
  echo "<br>";
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
	 
  $GetExam->saveResult($bankId, $stdAddNum, $CurrentSession, $CurrentTerm, $score, $perc, $today);
  
  
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