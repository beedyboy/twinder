<?php 
include('../includes/system.php');

$arrayGet=$_GET['subId']; 
$list = explode('|', $arrayGet);
 
$subId=$list[0];  
$bankIds=$list[1];  
//$subId=$_GET['subId'];  
 
$loadSubject = System::loadTblCond2('beedygroupsub', 'subId', 'bankId', $subId, $bankIds);  
  ?>
  <select class="form-control" id="cbankId" name="cbankId" onChange="getGroupBatch(this.value)" required>
<?php 
if(!empty($loadSubject)): 
?>
<option value="">Select Subject/Course</option>
<?php
foreach($loadSubject as $Subject): 
 
?>	
<option value="<?php echo $Subject['bankId']; ?>" >
<?php $classId = System::getColById('beedysubjectlist', 'subId', $Subject['subId'], 2); 
 echo System::getColById('beedyclasslist', 'classId', $classId, 1)."\t".System::getColById('beedysubjectlist', 'subId', $Subject['subId'], 1); ?></option>
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