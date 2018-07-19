<?php 
include('../includes/system.php');	  
$genStdBatchId =$_POST['genStdBatchId'];
?>
<p class="alert pageGuide"> Modify Session
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addSession()" >
<i class="icon-plus-sign icon-large"></i>Add Session</a>		</p>
<?php 
$genStdBatchesYear =System::getColById('genstudentbatches', 'genStdBatchId', $genStdBatchId, 1);
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateBatchesYear" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateBatchesYear" /> 
<input type="hidden" name="genStdBatchId" id="genStdBatchId" value="<?php echo $genStdBatchId ?>" />
<div class="form-group">
<label for="genStdBatchesYear">Batch/Session:</label>
<input type="text" class="form-control" name="genStdBatchesYear" id="genStdBatchesYear" value="<?php echo $genStdBatchesYear; ?>" placeholder="Enter Batch/Session" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Batch/Session </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>


