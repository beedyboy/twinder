<?php 
 include('../classes/System.php');  
$groupId =$_POST['groupId'];
?>
<p class="alert pageGuide"> Modify Group
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addStdGroup()" >
<i class="icon-plus-sign icon-large"></i>Add Group</a>		</p>
<?php 
$groupName =System::getColById('beedystdgroup', 'groupId', $groupId, 1);
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateStdGroup" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateStdGroup" /> 
<input type="hidden" name="groupId" id="groupId" value="<?php echo $groupId ?>" />
<div class="form-group">
<label for="groupName">Group Name:</label>
<input type="text" class="form-control" name="groupName" id="groupName" value="<?php echo $groupName; ?>" placeholder="Enter Group" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Group </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>


