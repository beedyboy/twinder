<?php 
include('../includes/system.php');

$stdAddNum=$_GET['stdAddNum'];
$resultId=$_GET['resultId']; 
//$classId=8;

$A=3;
$B=4;
$C=5;
$D=6;
	 
 $bankId  = System::getName('beedy_exam_result', 'resultId', $resultId,1); 
 $Score  = System::getName('beedy_exam_result', 'resultId', $resultId,5); 
 $Percentage  = System::getName('beedy_exam_result', 'resultId', $resultId,6); 
 $Date  = System::getName('beedy_exam_result', 'resultId', $resultId,7); 
 $Given  = System::getName('beedy_exam_result', 'resultId', $resultId,8); 
 $question  = System::getName('beedy_exam_result', 'resultId', $resultId,9); 
 $answer  = System::getName('beedy_exam_result', 'resultId', $resultId,10); 
 
 $questionGiven = explode(',',$Given);
 $stdViewed = explode(',',$question);
 $answers = explode(',',$answer);
 
 $questionGivenSize= count($questionGiven);

  //var_dump($answers);
 $Mark = System::getName('beedygroupsub', 'bankId',$bankId,8);
 $Total_Question = System::getName('beedygroupsub', 'bankId',$bankId,7);
 $obt = $Total_Question * $Mark; 
  
$subId = System::getName('beedygroupsub', 'bankId',$bankId,1);
 $js= System::getName('beedysubjectlist', 'subId', $subId, 1);
$table = 'table_name';
$outstr = NULL; 
$full_name =  System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 1)."\t".
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 2)."\t". 
 System::getColById('beedystudentprofile', 'stdAddNum', $stdAddNum, 3); 
$head = $full_name."\t"."-".$js."\t"."-".$Date;
  $filename = $head.".doc"; //Change File type CSV/TXT etc
          
header("Content-type: application/vnd.ms-word");
                header('Content-Disposition: attachment; filename=' . $filename);
 
 //$output = fopen('php://output', 'w');
 //fputcsv($output, $head);
//fputcsv($output, array('Subject', 'Score', 'Obtainable', 'Percentage(%)'));
   

?>
<table class="table table-striped table-bordered">
<tr>
<th>Question</th> 
<th>Viewed?</th>
<th>Selected Option</th>
<th>Right Option</th>
<th>Mark</th> 
</tr>		
	
<?php
for($i=0; $i< $questionGivenSize; $i++){
	?>
	
<tr>
<td><?php echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],1); ?> </td>

<th><?php if (in_array($questionGiven[$i], $stdViewed)): echo "YES"; else: echo "NO"; endif; ?> </th>
<th><?php if(array_key_exists($i,$answers)): $selected = $answers[$i];  else: $selected=NULL; endif; 

if($selected !=Null): echo "(".$selected.").\t"; endif;
switch ($selected) {
case "A":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$A);
	break;
case "B":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$B);
	break;
case "C":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$C);
	break;
case "D":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$D);
	break; 
default:
	echo "-";
	
}  

?></th>
<th><?php $rightOpt = System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],7); 
echo "(".$rightOpt.").\t";
switch ($rightOpt) {
case "A":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$A);
	break;
case "B":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$B);
	break;
case "C":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$C);
	break;
case "D":
	echo System::getName('beedy_question_bank','Question_Id', $questionGiven[$i],$D);
	break;
default:
	echo null;
	
} ?> </th>
<th><?php if ($selected === $rightOpt): echo "&#10004"; else: echo "&#10060"; endif; ?></th> 	
	
	
</tr>
	<?php }

?>
	
	
</table>
 

 <script type="text/JavaScript" src="../style/jquery.min.js"></script>
<script type="text/JavaScript" src="../style/jquery-ui.js"></script>
<script type="text/JavaScript" src="../style/jquery-form.js"></script>
<script type="text/JavaScript" src="../style/jquery-1.5.min.js"></script>
<script type="text/JavaScript" src="../style/jquery.jgrowl.js"></script>
<script type="text/JavaScript" src="../style/bootstrap.min.js"></script>
<script type="text/JavaScript" src="../style/respond.min.js"></script>
 