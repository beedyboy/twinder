<div class="row">
<div class="col-md-10">
<div class="beedyTemplate2">
<div class="col-md-4" id="activate">
<?php if (in_array("7_1", $area_privilege)): ?>
<h1 class='pageGuide'>Examination Type</h1>				
<form id="AddexamType" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="NewExamType" /> 
<div class="form-group">
<label for="typeName">Exam Type:</label>
<input type="text" class="form-control" name="typeName" id="typeName" placeholder="Enter Exam Type" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Exam Type</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
<?php endif; ?>
</div>
<div class="col-md-8" id="viewExamType">
</div>
<div class="clearfix"></div>
</div>
</div>
<div class="col-md-2" >
<div class="rightContainer cbt-2-right">
<?php
include( TEMPLATES_PATH . DS . 'layouts' . DS . "rightContent.php");
?>
</div>
</div>
</div>