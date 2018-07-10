 <h1 class='pageGuide'>Group Management</h1>				
<div class="row">

<div class="col-md-12" id="activate">
<form id="addStdGroup" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="addStdGroup" /> 
<div class="form-group">
<label for="stdGroup">Group Name:</label>
<input type="text" class="form-control" name="stdGroup" id="stdGroup" placeholder="Enter Students group" required>
</div>
<?php if (in_array("2_1", $area_privilege)): ?>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>
&nbsp;Save Group</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
<?php endif; ?>
</form>
</div>
<div class="col-md-12" id="viewGroupList">
</div>
</div>