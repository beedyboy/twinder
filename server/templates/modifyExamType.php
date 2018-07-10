<?php 
 include('../classes/System.php');  
$examTypeId =$_POST['examTypeId'];
?>
<p class="alert pageGuide"> Modify Exam Type
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addExamType()" >
<i class="icon-plus-sign icon-large"></i>Add Exam Type</a>		</p>
<?php 
$typeName =System::getColById('beedyexamtype', 'examTypeId', $examTypeId, 1);
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateExamType" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateExamType" /> 
<input type="hidden" name="examTypeId" id="examTypeId" value="<?php echo $examTypeId ?>" />
<div class="form-group">
<label for="typeName">Exam Type:</label>
<input type="text" class="form-control" name="typeName" id="typeName" value="<?php echo $typeName; ?>" placeholder="Enter Exam Type" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Exam Type </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>


