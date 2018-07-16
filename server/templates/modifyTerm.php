<?php 
 include('../classes/System.php');  
$SchoolTermId =$_POST['SchoolTermId'];
?>
 <p class="alert pageGuide"> Modify Term/Semester
<a class="btn btn-info"  data-placement="right" title="Click to Add New" onclick="addSemester()" >
<i class="icon-plus-sign icon-large"></i>Add Term/Semester</a>		</p>
<?php 
$genSchTerm =System::getColById('beedyschoolterm', 'SchoolTermId', $SchoolTermId, 1);
?>
<div  class="row">
<div class="col-md-12">
<!--Update part -->
<form id="updateSemester" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="updateSemester" />
<input type="hidden" name="SchoolTermId" id="SchoolTermId" value="<?php echo $SchoolTermId ?>" /> 
<div class="form-group">
<label for="genSchTerm">Term/Semester:</label>
<input type="text" class="form-control" name="genSchTerm" id="genSchTerm" value="<?php echo $genSchTerm; ?>" placeholder="Enter Term/Semester" required>
</div>
<div class="form-group">
<button type="submit" class="btn btn-cbt-success"  title="Click to Save"><i class="icon-save icon-large"></i>&nbsp;Update Term/Semester </button>
<div id="update-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</form>
</div>
</div>