 <h1 class='pageGuide'>Class Management</h1>				
<div class="row">

<div class="col-md-12" id="activate">
<form id="addClass" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="addClass" /> 
<?php $loadStudentGroup = $GetSchool->loadStudentGroup(); ?>
<div class="form-group">
<label for="groupId">Group Name:</label>
<?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="groupId" name="groupId" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['groupId']; ?>" ><?php echo $Group['groupName']; ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>
<div class="form-group">
<label for="className">Class Name:</label>
<input type="text" class="form-control" name="className" id="className" placeholder="Enter Class" required>
</div>
<?php if (in_array("3_1", $area_privilege)): ?>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Class</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
<?php endif; ?>
</form>
</div>
<div class="col-md-12" id="viewClassList">
</div>
</div>