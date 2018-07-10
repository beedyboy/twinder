<?php 
include('../includes/system.php');

$classId =$_POST['ClassId'];
$loadClassList = $GetSchool->loadClassList();
$loadStudentGroup = $GetSchool->loadStudentGroup(); 
?>
<p class="alert pageGuide"> Modify Class Information
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addClass()" >
<i class="icon-plus-sign icon-large"></i>Add Class</a>		</p>
<?php 
 
$ClassName =System::getColById('beedyClassList', 'classId', $classId, 1);
$groupId =System::getColById('beedyClassList', 'classId', $classId, 2);
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateClass" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateClass" />
<input type="hidden" name="classId" id="classId" value="<?php echo $classId ?>" />
<div class="form-group">
<label for="groupId">Group Name:</label>
<?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="groupId" name="groupId" required>
<option value="">Select Group</option>
<?php
foreach($loadStudentGroup as $GroupList):
?>	
<option value="<?php echo $GroupList['groupId']; ?>"  <?php
if($groupId == $GroupList['groupId']) { echo 'Selected';} ?> ><?php echo $GroupList['groupName']; ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
</div>

<div class="form-group">
<label for="ClassName">Class Name:</label>
<input type="text" class="form-control" name="ClassName" id="ClassName" value="<?php echo $ClassName; ?>" placeholder="Enter Class Name" required>
</div>

<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Group </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>


