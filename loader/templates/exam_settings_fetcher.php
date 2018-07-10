
<?php 
include('../includes/system.php');

$classId=$_GET['classId'];
//$classId=8;
	
 
$loadCourse = System::loadTblCond('beedyGroupSub', 'classId', $classId);  
 
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
	 $Show_Result=$Crs['Show_Result'];
	  $Exam_Instruction=$Crs['Exam_Instruction'];
	 	 
						 endforeach;
						?>
					 	<?php
						endif; 
						?> 
	 
	 
		
		 
		 
		<input type="number" name="duration" id="duration" value="<?php echo $Exam_Duration; ?>"  />
        
           
            <input  type="number" name="no_ques" id="no_ques" value="<?php  echo $Total_Question; ?>" />
              <input type="date" name="date" id="date" value="<?php  echo $Exam_Date; ?>" />
              <input type="text" name="mark" id="mark" value="<?php  echo $Mark; ?>" >
                <input type="text" name="instruction" id="instruction" value="<?php echo $Exam_Instruction; ?>" multiple>
      
	  <div id="showresults">
  <label class="switch"> 
   
   <input type="checkbox" name="showresult"  id="showresult"  <?php if($Show_Result=="Yes"): echo "checked"; endif; ?>>
   <div class="slider round">  </div>
	 </label>
	 </div>