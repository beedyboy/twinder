<?php 
include('../includes/system.php');
$classId = $_POST['classId'];
$loadSubList = System::loadTblCond('beedysubjectlist', 'classId', $classId); ?>
<select class="form-control" id="subId" name="subId" required>
<?php 
if(!empty($loadSubList)): 
?>
<option value="">Select Subject</option>
<?php
foreach($loadSubList as $SubList):
?>	
<option value="<?php echo $SubList['subId']; ?>" ><?php echo $SubList['subjectName']; ?></option>
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