
<?php 
include('../includes/system.php');

$stdAddNum=$_GET['stdAddNum']; 

 
$loadSession = System::loadDistinctCond1('genStdBatchId', 'beedy_exam_result', 'stdAddNum', $stdAddNum);  
  ?>
  <select class="form-control" id="genStdBatchId" name="genStdBatchId" onChange="getGeneralTerm(this.value)" required>
<?php 
if(!empty($loadSession)): 
?>
<option value="">Select Batch/Session</option>
<?php
foreach($loadSession as $Session): 
 
?>	
<option value="<?php echo $Session['genStdBatchId']; ?>" ><?php echo System::getColById('genstudentbatches', 'genStdBatchId', $Session['genStdBatchId'], 1);  ?></option>
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