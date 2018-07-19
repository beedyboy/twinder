
<?php 
include('../includes/system.php');

$genStdBatchId=$_GET['genStdBatchId']; 

 
$loadTerm = System::loadDistinctCond1('SchoolTermId', 'beedy_exam_result', 'genStdBatchId', $genStdBatchId);  
  ?>
  <select class="form-control" id="SchoolTermId" name="SchoolTermId" required>
<?php 
if(!empty($loadTerm)): 
?>
<option value="">Select Term/Semester</option>
<?php
foreach($loadTerm as $TERM): 
 
?>	
<option value="<?php echo $TERM['SchoolTermId']; ?>" ><?php echo System::getColById('beedyschoolterm', 'SchoolTermId', $TERM['SchoolTermId'], 1);  ?></option>
<?php 
endforeach;
?>

<?php
else:
?>
<option value="">Not available</option>
<?php
endif; 
?>
</select>