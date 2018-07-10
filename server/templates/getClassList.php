<?php 
include('../includes/system.php');
$groupId = $_POST['groupId'];
$loadClsList = System::loadTblCond('beedyclasslist', 'groupId', $groupId); ?>
<select class="form-control" id="ClassId" name="classId" required>
<?php 
if(!empty($loadClsList)): 
?>
<option value="">Select Class</option>
<?php
foreach($loadClsList as $ClsList):
?>	
<option value="<?php echo $ClsList['classId']; ?>" ><?php echo $ClsList['className']; ?></option>
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