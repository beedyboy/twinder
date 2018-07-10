<?php 
include('../includes/system.php');

$subId =$_POST['subId'];
$loadClassList = $GetSchool->loadClassList();
$loadStudentGroup = $GetSchool->loadStudentGroup(); 
?>
<p class="alert pageGuide"> Modify Subject Information
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addSubject()" >
<i class="icon-plus-sign icon-large"></i>Add Subject</a>		</p>
<?php 
 
$subjectName =System::getColById('beedysubjectList', 'subId', $subId, 1);
$classId =System::getColById('beedysubjectList', 'subId', $subId, 2);  
$groupId =System::getColById('beedyClassList', 'classId', $classId, 2);  

?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateClassSubject" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateClassSubject" />
<input type="hidden" name="subId" id="subId" value="<?php echo $subId ?>" />


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
<option value="<?php echo $Group['groupId']; ?>" <?php
if($groupId == $Group['groupId']) { echo 'Selected';} ?>  ><?php echo System::getColById('beedystdgroup', 'groupId', $Group['groupId'], 1); ?></option>
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
<option value="<?php echo $classId; ?>" selected><?php echo System::getColById('beedyClassList', 'classId', $classId, 1);   ?></option>
</select>
</div>
</div>
<div class="form-group">
<label for="className">Subject Name:</label>
<input type="text" class="form-control" name="subjectName" id="subjectName" value="<?php echo $subjectName; ?>" placeholder="Enter Subject Name" required>
</div>

 
 
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Group </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>


