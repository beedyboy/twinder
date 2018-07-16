
 <div class="row">
 <div class="col-lg-12">
 <div class="pageGuide">
 
 <a href="?pid=1&action=Add Exam&Loader=CreateGroup/"> <img src="images/db_add.ico" alt=" Create Group" title="Create Group" /> </a> 
<a href="?pid=1&action=Add Exam&Loader=GroupHelper/"><img src="images/help-about.ico" id="help" alt="Help" title="Help"/></a> 
<a href="?pid=1&action=Add Exam&Loader=<?php if(empty($_GET['Loader'])): echo "GroupHelper/"; else: echo $_GET['Loader']; endif; ?>"> <img  src="images/view-refresh-3.ico" alt="Refresh" title="Refresh" /> </a> 
   
 </div>
 </div>
 
 </div> 
   
 <div class="row mainContent "> 
 <div class="col-lg-3 innerMain"> 
 
 <!--group name -->
					<div class="form-group">
<div class="row">

						<div for="CourseCat" class="control-label col-lg-12 ">
		<div class="blue-img-white">Student Group:	 </div>
			</div>	
			</div>	
	
	
	<div class="black-img-white row"> 
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
		<?php $loadStudentGroup = System::loadDistinct('groupId','beedyStdGroup'); ?>
 <?php 
if(!empty($loadStudentGroup)): 
?>
<select class="form-control" id="SettingsGroupId" name="groupId"  onChange="nextfunction(this.value)" required>
<option value="">Select Group </option>
<?php
foreach($loadStudentGroup as $Group):
?>	
<option value="<?php echo $Group['groupId']; ?>" ><?php echo System::getColById('beedystdgroup', 'groupId', $Group['groupId'], 1); ?></option>
<?php 
endforeach;
?>
</select>
<?php
endif; 
?> 
					</div>
					</div>
					 
					</div>
<!--group name -->
<!--class -->
 <div class="form-group">
<div class="row">
						<div for="classCourseId" class="control-label col-lg-12">
						<div class="blue-img-white">Choose Class:</div>
			</div>	
			</div>	
	
	
	<div class="black-img-white row"> 	
				 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="f1">
			 		<select class="form-control"  id="bankId" name="bankId"  onChange="myFunction();" required>
						<option value="">Select Group First</option>
						</select>
</div>
					</div> 
					</div>
					</div>
<!--class -->
<!-- interface -->
  <div class="form-group">
<div class="row">
						<div for="CourseCat" class="control-label col-lg-12 ">
							<div class="blue-img-white">Exam Interface Type:</div>
			</div>	
			</div>	
	
	
	<div class="black-img-white row"> 
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
 
<?php $loadTblCond1 = System::loadTblCond1('beedyinterfaces', 'Active', 1); ?>
<select class="form-control" id="getface" name="getface">
							<?php if(!empty($loadTblCond1)): ?> 

							<option value="">Select Interface</option>
				
			 			<?php
						foreach($loadTblCond1 as $Face):
						?>	
							<option value="<?php echo $Face['faceId']; ?>" >
						<?php echo  $Face['faceName']; ?>
						</option>
							<?php 
						endforeach;
						?>
						
						<?php
						else: ?>
						<option value="">Interface Empty</option>
					<?php	endif;  ?> 
					</select>
					
					</div>
					</div>
				 
					</div>
  <!-- interface -->
 
 <div class="form-group">
<div class="row">
						<div for="CourseCat" class="control-label col-lg-12 ">
							<div class="blue-img-white">Instruction:</div>
			</div>	
			</div>	
	

	<div class="row"> 	
	 <div class="col-offset-lg-4 col-lg-8 pull-right">
						  <div id="slidepanel">
            <input name="instruction" id="instruction" type="text"  class="form-control" placeholder="Enter Instruction" required multiple>
    </div>
    
    
     <div id="accpanel">
      <ul>
        <li class="left">Click here &raquo;</li>
        <li class="right" id="toggle"><a id="slideit" href="#slidepanel">Open panel</a><a id="closeit" style="display: none;" href="#slidepanel">Close Panel</a></li>
      </ul> </div>
					</div>
					</div>
					</div>
			 

  
 </div>
  

 <div class="col-lg-6 innerMain">
 
  </div>
  
   <!-- last phase -->
 
  <div class="col-lg-3 innerMain">
   
  
 			
 <div class="form-group">
<div class="row">
						<div for="CourseCat" class="control-label col-lg-12 ">
						<div class="blue-img-white">Exam Date:</div>
</div>	
</div>	
	
	<div class="black-img-white row">		
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="date1">
			 		 <input type="date" class="form-control" name="date" id="date" placeholder="Enter Exam Date" required />
						
						</div>
					</div>
					</div>
					</div>

<div class="form-group">
<div class="row">
						<div for="duration" class="control-label col-lg-12 ">
						<div class="blue-img-white">Exam Duration:</div>
</div>	
</div>	
	
	<div class=" black-img-white row">		
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="examd">
			 		 <input type="number" class="form-control" name="duration" id="duration" placeholder="Enter Exam Duration" required />
						
						</div>
					</div>
					</div>
					</div>
<div class="form-group">
<div class="row">
						<div for="no_ques" class="control-label col-lg-12 ">
						<div class="blue-img-white">Number of Question:</div>
</div>	
</div>	
	
	<div class="row black-img-white">		
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="no_ques1">
	<input type="number" class="form-control" name="no_ques" id="no_ques" placeholder="Enter Number of Question" required />
						
						</div>
					</div>
					</div>
					</div>
<div class="form-group">
<div class="row">
						<div for="CourseCat" class="control-label col-lg-12 ">
						<div class="blue-img-white">Mark per Question:</div>
</div>	
</div>	
	<div class="black-img-white row ">		
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="mark1">
			 		 <input type="text" class="form-control" name="mark" id="mark" placeholder="Enter Exam Duration" required />
						
						</div>
					</div>
					</div>
					</div>
<div class="form-group">
<div class="row">
						<div for="CourseCat" class="control-label col-lg-12 ">
						<div class="blue-img-white">Show Result:</div>
</div>	
</div>	
	<div class="black-img-white row ">		
						 <div class="col-offset-lg-4 col-lg-8 pull-right">
<div id="showresult1">
 <label class="switch"> 
   
   <input type="checkbox" name="showresult"  id="showresult">
   <div class="slider round">  </div>
	 </label>
 		 
			 		 
						</div>
					</div>
					</div>
					</div>

<div class="form-group">
<div class="blue-img-white">
						<div for="CourseCat" class="control-label col-lg-12 "></div>
</div>	
	<div class=" black-img-white row">		
						 <div class="col-lg-12 pull-right">
 <input type="reset" class="btn btn-warning" value="Reset" onClick="saves();" title="Click to Reset" />
<button type="submit" class="btn btn-info"  title="Click to Save" onClick="save();"><i class="icon-save icon-large"></i>&nbsp;Save</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div>

 </div>
					</div>
					</div>

					
					
 </div>
 
 
 </div>
 