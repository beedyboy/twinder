<?php 
if(!session_id()):
session_start(); 
endif;
?>
<h1 class='pageGuide'>Term/Semester</h1>				
<form id="AddgenSchoolTermForm" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="addSemester" />
<div class="form-group">
<label for="genSchTerm">Term/Semester:</label> 
<input type="text" class="form-control" name="genSchTerm" id="genSchTerm" placeholder="Enter Term or Semester" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Term/Semester</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>