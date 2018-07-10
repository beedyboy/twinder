<?php 
if(!session_id()):
session_start(); 
endif;
?>
<h1 class='pageGuide'>Examination Type</h1>				

<form id="AddexamType" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="NewExamType" /> 
<div class="form-group">
<label for="typeName">Exam Type:</label>
<input type="text" class="form-control" name="typeName" id="typeName" placeholder="Enter Exam Type" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Batch/Session</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>