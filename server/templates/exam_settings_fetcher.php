
<?php 
include('../includes/system.php');

$subId=$_GET['subId'];
$exambankId=$_GET['exambankId'];
//$classId=8;
	
 
$loadCourse = System::loadTblCond2('beedygroupsub', 'subId', 'exambankId', $subId, $exambankId);  
 
 ?>
 <?php 
						if(!empty($loadCourse)): 
						?>
			 	  	<?php
						foreach($loadCourse as $Crs):
					 $Exam_Duration=$Crs['Exam_Duration'];
	  $Total_Question=$Crs['Total_Question'];
	  $Exam_Date=$Crs['Exam_Date'];
	 $Mark=$Crs['Mark'];
	 $random=$Crs['random'];
	 $Show_Result=$Crs['Show_Result'];
	  $Exam_Instruction=$Crs['Exam_Instruction'];
	  $examTypeId=$Crs['examTypeId'];
	 	 
						 endforeach;
						?>
					 	<?php
						endif; 
						?> 
	 
	 
		
		 
		 
		<input type="number" class="form-control" name="duration" id="duration" value="<?php echo $Exam_Duration; ?>"  />
        
           
            <input  type="number" class="form-control" name="no_ques" id="no_ques" value="<?php  echo $Total_Question; ?>" />
              <input type="date" class="form-control" name="date" id="date" value="<?php  echo $Exam_Date; ?>" />
              <input type="text" class="form-control" name="mark" id="mark" value="<?php  echo $Mark; ?>" >
                <input type="text" class="form-control" name="instruction" id="instruction" value="<?php echo $Exam_Instruction; ?>" multiple>
      
	  <div id="showsorting1">
  <label class="switch"> 
   
   <input type="checkbox" name="showsorting"  id="showsorting"  <?php if($random=="Yes"): echo "Checked"; endif; ?>>
   <div class="slider round">  </div>
	 </label>
	 </div>
	  
	  <div id="showresults">
  <label class="switch"> 
   
   <input type="checkbox" name="showresult"  id="showresult"  <?php if($Show_Result=="Yes"): echo "Checked"; endif; ?>>
   <div class="slider round">  </div>
	 </label>
	 </div>