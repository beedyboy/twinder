<div class="row" class="submitForm">

<div class="col-md-4" >
		
<form id="viewResult" class="submitForm"  role="form" action="#">
<input type="hidden" name="action" value="getResultLog" /> 
<div class="option-log">
 <span style="color:#D2322D; font-weight:bold;">View By: </span>
      <label>
            <input type="radio" name="type" value="group" id="groupType" required>
            Group</label>
     
          <label>
            <input type="radio" name="type" value="class" id="classType">
            Class</label>
  <label>
            <input type="radio" name="type" value="individual" id="individualType">
            Individual</label>

</div> 

<div id="groupView" style="display:none;">

<div class="form-group">
<label for="className">Group:</label>
	<?php $loadStudentGroup = System::loadDistinct('exambankId','beedygroupsub'); ?>
<select class="form-control" id="exambankId" name="exambankId" onChange="getGroupSubject(this.value)">
<option value="">Select Group </option>
 <?php 
if(!empty($loadStudentGroup)): 
?>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['exambankId']; ?>" ><?php echo System::getColById('beedygroup', 'exambankId', $Group['exambankId'], 1); ?></option>
<?php 
endforeach;
?>
<?php
endif; 
?> 
</select>
</div>


<div class="form-group">
<label for="className">Subject:</label>
	<div id="groupSubSelect"> 
<select class="form-control" id="bankId" name="gbankId">
<option value="">Select Subject </option>
  
</select>
</div>
</div>


</div>
 

<div id="classView" style="display:none;">

<div class="form-group">
<label for="className">Subject:</label>
	<?php $loadStudentClass = Database::loadDistinct('bankId','beedy_exam_result'); ?>
<select class="form-control" id="cbankId" name="cbankId" onChange="getSubjectClass(this.value)">
<option value="">Select Subject </option>
 <?php 
if(!empty($loadStudentClass)): 
?>
<?php
foreach($loadStudentClass as $CLASS):
 $subId = System::getColById('beedyGroupSub', 'bankId', $CLASS['bankId'], 1);  
 $bankId = System::getColById('beedyGroupSub', 'bankId', $CLASS['bankId'], 0);  
?>	
<option value="<?php echo $subId; ?>|<?php echo $bankId; ?>" >
<?php echo System::getColById('beedysubjectlist', 'subId', $subId, 1); ?></option>
<?php 
endforeach;
?>
<?php
else:  
echo "<option value=''>Not Available</option>";
endif; 
?> 
</select>
</div>


<div class="form-group">
<label for="className">Class:</label>
	<div id="classSelect"> 
<select class="form-control" id="bankId" name="bankId">
<option value="">Select Class </option>
  
</select>
</div>
</div>


</div>


<div id="individualView" style="display:none;">

<div class="form-group">
<label for="className">Select Student:</label>
	<?php $loadStudentClass = System::loadDistinct('stdAddNum','beedy_exam_result'); ?>
<select class="form-control" id="stdAddNum" name="stdAddNum" onChange="getStudentBatch(this.value)">
<option value="">Select a Student </option>
 <?php 
if(!empty($loadStudentClass)): 
?>
<?php
foreach($loadStudentClass as $STUDENT):
?>	
<option value="<?php echo $STUDENT['stdAddNum']; ?>" >
<?php echo System::getColById('beedystudentprofile', 'stdAddNum', $STUDENT['stdAddNum'], 1)."\t". System::getColById('beedystudentprofile', 'stdAddNum', $STUDENT['stdAddNum'], 2)."\t". System::getColById('beedystudentprofile', 'stdAddNum', $STUDENT['stdAddNum'], 3); ?></option>
<?php 
endforeach;
?>
<?php
endif; 
?> 
</select>
</div>

 
</div>


<h5 class="pageGuide"> School Criteria</h5>
<div class="form-group">
<label for="className">Batch:</label>
	<div id="sessionselect"> 
<select class="form-control" id="genStdBatchId" name="genStdBatchId" onChange="getGeneralTerm(this.value)" required>
<option value="">Select Batch </option>
  
</select>
</div>
</div>


<div class="form-group">
<label for="className">Term/Semester:</label>
	<div id="termselect"> 
<select class="form-control" id="SchoolTermId" name="SchoolTermId" required>
<option value="">Select Batch/Session First </option>

</select> 
</div> 

</div>


<div class="form-group">
<button type="submit" class="btn btn-cbt-success" title="Click to Save"><i class="icon-search icon-large"></i>&nbsp;Save Class</button>
 </div>
</form>
</div>

<div class="col-md-8" id="activate">
<h1 class='pageGuide'>Result Table</h1>	
<div id="resultViewer" class="resultViewer innerMain-left innerMain-right">
			<canvas id="mycanvas"></canvas>
		</div>
		
</div>

</div>