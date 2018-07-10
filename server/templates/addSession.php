<?php 
if(!session_id()):
session_start(); 
endif;
?>
<h1 class='pageGuide'>Batch/Session</h1>				
<form id="AddgenStdBatchForm" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="addSession" /> 
<div class="form-group">
<label for="genStdBatchesYear">Batch/Session:</label>
<input type="text" class="form-control" name="genStdBatchesYear" id="genStdBatchesYear" placeholder="Enter Batch or Session" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Save Batch/Session</button>
<div id="add-bottom" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>