	<h1>Assign Bank Course File</h1>	
<form id="addNewBankCourse" class="submitForm form-horizontal" role="form" action="#">
<fieldset class="col-lg-8"><legend><img src="images/plus.gif">Add Exam Group</legend>
 
		<input type="hidden" name="action" value="addNewBankCourse" />
					<input type="hidden" name="exambankId" value="<?php echo $_GET['exambankId']; ?>" />
		 
					 <?php $loadStudentClass = System::loadDistinct('classId','beedySubjectList'); ?>
					 <div class="form-group">
						<label for="classId" class="control-label col-lg-3">Class Name:</label>
						 <div class="col-lg-5">
 <?php 
if(!empty($loadStudentClass)): 
?>
<select class="form-control" id="classIdSelect" name="classId" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentClass as $Class):
?>	
<option value="<?php echo $Class['classId']; ?>" ><?php echo System::getColById('beedyClassList', 'classId', $Class['classId'], 1); ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?>
					</div>
					</div>
							
  	 			
					<div class="form-group">
						<label for="courseCode" class="control-label col-lg-3">Subject Name:</label>
						 <div class="col-lg-5">
						 <div id="bankCourseName"> 
						<select class="form-control" id="subId" name="subId" required>
					<option value="">Select Subject</option>
						 </select>
					 	</div>	
						</div>
						</div>
				
			 			<div class="form-group">
						<label for="instruction" class="control-label col-lg-3">Exam Instruction:</label>
						 <div class="col-lg-5">
					<input type="text" class="form-control" name="instruction" id="instruction" placeholder="Enter Exam Instruction"  />

					 	</div>
						</div>
				
			 			<div class="form-group">
				<label for="duration" class="control-label col-lg-3">Exam Duration:</label>
						<div class="col-lg-5">
						<input type="number" class="form-control" name="duration" id="duration" placeholder="Enter Exam Duration" required />
						</div>
						</div>
				
			 			
			 			<div class="form-group">
				<label for="date" class="control-label col-lg-3">Exam Date:</label>
						<div class="col-lg-5">
						<input type="date" class="form-control" name="date" id="date" placeholder="Enter Exam Date" required />
						</div>
						</div>
				
			 			
									
									
 <div class="form-group">
<div class="col-lg-offset-4 col-lg-4">
 <button type="submit" class="btn btn-info  pull-right"  title="Click to Save"><img class="icon-small" src="images/Save.png" />&nbsp;Save Group</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</div>

</form>
 