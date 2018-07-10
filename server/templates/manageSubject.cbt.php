<h1 class='pageGuide'>Subject Management</h1>				
 <div class="row">

<div class="col-md-12" id="activate">
<form id="addClassSubject" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="addClassSubject" /> 
 
<?php $loadStudentGroup = System::loadDistinct('groupId','beedyStdGroup'); ?>
<div class="form-group">
<label for="groupId">Group Name:</label>
<?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="groupIdSelect" name="groupId" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['groupId']; ?>" ><?php echo System::getColById('beedystdgroup', 'groupId', $Group['groupId'], 1); ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>
<div class="form-group">
<label for="classList">Class Name:</label>
<div id="classList">
<select class="form-control" id="classId" name="classId" required>
<option value="">Select Group First</option>
</select>
</div>
</div>
<div class="form-group">
<label for="className">Subject Name:</label>
<input type="text" class="form-control" name="subjectName" id="subjectName" placeholder="Enter Subject Name" required>
</div>
 <?php if (in_array("4_1", $area_privilege)): ?>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Subject</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
<?php endif; ?>
</form>
</div>
<div class="col-md-12" id="viewClassSubjectList">
</div>
</div>

