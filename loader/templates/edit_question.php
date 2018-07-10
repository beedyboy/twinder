<?php  
include('../includes/system.php');

include('layouts/examHead.php'); 
 
 $qid=$_REQUEST['qid'];
  $bankId=$_REQUEST['bankId'];
  $num=$_REQUEST['num'];
  $loadBankQues =	System::loadTblCond1('beedy_question_bank', 'Question_Id',$qid);
 
?>
    
 
   
<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-6">
 

<h1>Question Modification Panel</h1>
 <div class="black-img-white">
 <span style="color:#D2322D; font-weight:bold;"> Question Type: </span>
     <label>
            <input type="radio" name="type" value="logicalL" id="logically">
             Logical</label>
     
        <label>
            <input type="radio" name="type" value="completeL" id="completely">
            Complete</label>

</div> 
  
 <?php  
    $member1 =$loadBankQues->fetch(PDO::FETCH_LAZY);		
			$queid=$member1['Question_Id'];
			$quetitle=$member1['Exam_Question'];
			$Exam_Question_Logo=$member1['Exam_Question_Logo'];
			$ch1=$member1['Exam_Option_A'];
			$ch2=$member1['Exam_Option_B'];
			$ch3=$member1['Exam_Option_C'];
			$ch4=$member1['Exam_Option_D'];
			$ans=$member1['Exam_Answer']; 
 	
  ?>
  
   
 <div id="normal"> 
	   <form id="normalEdit" name="normal" class="submitForm form-horizontal" role="form" enctype="multipart/form-data">
    <label> <strong>Question</strong></label>
	<input type="hidden" name="action" value="normal" />
<input name="bankId" type="hidden" value="<?php  echo $bankId; ?>" />  
 <input type="hidden" id="numof" name="questionno" value="<?php echo $queid; ?>" />
   
 <table class="table table-bordered">
         <tr>
         <td class="black-img-white"> 
  <div>  
  <table class="table table-bordered">
         
        <tr>
        <td> <?php  echo $num; ?>.
        </td>  
         <td>   <textarea name="question" cols="" rows="" class="summernote"><?php  echo $quetitle; ?></textarea> 
         </td>
         </tr> 
          </table>
       </div> 
           
                
   
             <table class="table table-bordered"> 
        <tr>
        <td>  
        <div id='slidepanel'>
        <img  id="previewing" src='<?php if($Exam_Question_Logo != ""): echo "../../".$Exam_Question_Logo; endif;?>' width='60%' height='100' >
    </div>
        </td> 
        
         <td> 
		 <div id='accpanel'>
      <ul>
        <li class='left'>Click here &raquo;</li>
        <li class='right' id='toggle'><a id='slideit' href='#slidepanel' style='font-weight:bold;'>Show Diagram</a>
		<a id='closeit' style='font-weight:bold; display: none;' href='#slidepanel'>Hide Diagram</a></li>
      </ul>
    </div> 
        </td>
       
        </tr> 
 
        </table>
	    
 	 
 
 <table class="table table-bordered"> 
                <tr>        	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black;font-size:22px;'> Update Diagram </span><input type="file" name="photo" id="photo" />
                    <span id="pixReport"> </span>
                     </td>
			</tr>  
      <tr>
        <td>
    <input type="radio" name="options" required  value="A" id="radioA" <?php if($ans=='A'):
					echo "Checked"; endif;  ?> >
     <label>  Option A</label> </td>
        <td><input type="text" class="form-control"  name="optionA" id="optionA" value="<?php echo $ch1; ?>" placeholder="Enter option A" ></td>
      </tr>
      <tr>
        <td >
    <input type="radio" name="options" value="B" id="radioB" <?php if($ans=='B'):
					echo "Checked"; endif;  ?>> <label>   Option B</label></td>
        <td ><input type="text" class="form-control" value="<?php echo $ch2; ?>"   name="optionB" id="optionB" placeholder="Enter option B"></td>
      </tr>
      <tr class="<?php if($ch3==""){ ?>  hide  <?php }  ?>"  >
        <td >
        <input type="radio" name="options" value="C" id="radioC" <?php if($ans=='C'):
					echo "Checked"; endif;  ?>>
       <label>  Option C</label> </td>
        <td ><input type="text" class="form-control"  name="optionC" id="optionC" placeholder="Enter option C" value="<?php echo $ch3; ?>" ></td>
      </tr>
      <tr class="<?php if($ch4==""){ ?>  hide  <?php }  ?>"  >
        <td >
        <input type="radio" name="options" value="D" id="radioD" <?php if($ans=='D'):
	 	echo "Checked"; endif;  ?>> <label>  Option D</label></td>
        <td > <input type="text" class="form-control"  name="optionD" id="optionD" placeholder="Enter option D"   value="<?php echo $ch4; ?>"></td>
      </tr>
       
    </table>
   
    <table  class="table table-bordered">
                  <tr>
        <td colspan="3"> 
		 <button type="submit" class="btn btn-info  col-lg-12 submit"  title="Click to Update">
		 <img class="icon-small" src="../images/Save.png" />&nbsp;Update Question</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div> 
        </td> 
        </tr>    
    	</table>		
</td>
</tr>
</table>
</form>
 
</div>
	
                             	     
		 <div id="applyComplete"> 
  <form id="applyCompleteform" class="submitForm form-horizontal" role="form" enctype="multipart/form-data">
    <label> <strong>Question</strong></label>
	<input type="hidden" name="action" value="applyCompleteform" />
<input name="bankId" type="hidden" value="<?php  echo $bankId; ?>" />  
 <input type="hidden" id="numof" name="questionno" value="<?php echo $queid; ?>" />
     
 <table class="table table-bordered">
         <tr>
         <td class="black-img-white"> 
  <div>  
  <table class="table table-bordered">
         
        <tr>
        <td> <?php  echo $num; ?>.
        </td> 
        
         <td>   <textarea name="question" cols="" rows="" class="summernote"><?php  echo $quetitle; ?></textarea> 
         </td>
         </tr> 
          </table>
       </div> 
                  
             <table class="table table-bordered"> 
        <tr>
        <td>  
        <div id='slidepanel'>
    
           <img  id="previewingC" src='<?php if($Exam_Question_Logo != ""): echo "../../".$Exam_Question_Logo; endif;?>' width='60%' height='100' >
    </div>
        </td> 
        
         <td> 
		 <div id='accpanel'>
      <ul>
        <li class='left'>Click here &raquo;</li>
        <li class='right' id='toggle'><a id='Cslideit' href='#slidepanel' style='font-weight:bold;'>Show Diagram</a>
		<a id='Ccloseit' style='display: none;' href='#slidepanel'>Hide Diagram</a></li>
      </ul>
    </div> 
        </td>
       
        </tr> 
 
        </table>
	  
   
 <table class="table table-bordered"> 
                <tr>        	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black;font-size:22px;'> Update Diagram </span><input type="file" name="photo" id="photoC" />
                    <span id="pixReport"> </span>
                     </td>
			</tr> 
      <tr>
        <td>
    <input type="radio" name="options" required  value="A" id="radioA" <?php if($ans=='A'): echo "Checked"; endif;  ?> >
     <label>  Option A</label> </td>
        <td><input type="text" class="form-control"  name="optionA" id="optionA" value="<?php echo $ch1; ?>" placeholder="Enter option A" ></td>
      </tr>
      <tr>
        <td >
    <input type="radio" name="options" value="B" id="radioB" <?php if($ans=='B'):
					echo "Checked"; endif;  ?>> <label>   Option B</label></td>
        <td ><input type="text" class="form-control" value="<?php echo $ch2; ?>"   name="optionB" id="optionB" placeholder="Enter option B"></td>
      </tr>
      <tr>
        <td >
        <input type="radio" name="options" value="C" id="radioC" <?php if($ans=='C'):
					echo "Checked"; endif;  ?>>
       <label>  Option C</label> </td>
        <td ><input type="text" class="form-control"  name="optionC" id="optionC" placeholder="Enter option C" value="<?php echo $ch3; ?>" ></td>
      </tr>
      <tr>
        <td >
        <input type="radio" name="options" value="D" id="radioD" <?php if($ans=='D'):
	 	echo "Checked"; endif;  ?>> <label>  Option D</label></td>
        <td > <input type="text" class="form-control"  name="optionD" id="optionD" placeholder="Enter option D"   value="<?php echo $ch4; ?>"></td>
      </tr>
       
    </table>
   
    <table  class="table table-bordered">
                  <tr>
        <td colspan="3"> 
		 <button type="submit" class="btn btn-info  col-lg-12 submit"  title="Click to Update">
		 <img class="icon-small" src="../images/Save.png" />&nbsp;Update Question</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div> 
        </td>
       
        </tr>    
    	</table>		
</td>
</tr>
</table>
</form>


</div>
	
	
	
<div id="applyLogical" >
  <form id="applyLogicalform" class="submitForm form-horizontal" role="form" enctype="multipart/form-data">
    <label> <strong>Question</strong></label>
	 <input type="hidden" name="action" value="applyLogicalform" />
<input name="bankId" type="hidden" value="<?php  echo $bankId; ?>" />  
 <input type="hidden" id="numof" name="questionno" value="<?php echo $queid; ?>" />
   
 <table class="table table-bordered">
         <tr>
         <td class="black-img-white"> 
  <div>  
  <table class="table table-bordered">
         
        <tr>
        <td> <?php  echo $num; ?>.
        </td> 
        
         <td>   <textarea name="question" cols="" rows="" class="summernote"><?php  echo $quetitle; ?></textarea> 
         </td>
         </tr> 
          </table>
       </div> 
                 
  
             <table class="table table-bordered"> 
        <tr>
        <td> 
        
        <div id='slidepanel'>
          <img  id="previewingL" src='<?php if($Exam_Question_Logo != ""): echo "../../".$Exam_Question_Logo; endif;?>' width='60%' height='100' >
    </div>
        </td> 
        
         <td>  <div id='accpanel'>
      <ul>
        <li class='left'>Click here &raquo;</li>
        <li class='right' id='toggle'><a id='Lslideit' href='#slidepanel' style='font-weight:bold;'>Show Diagram</a><a id='Lcloseit' style='display: none;' href='#slidepanel'>Hide Diagram</a></li>
      </ul>
    </div> 
        </td>
       
        </tr> 
        </table> 
 
 <table class="table table-bordered"> 
                <tr>        	
					<td>&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:black;font-size:22px;'> Update Diagram </span><input type="file" name="photo" id="photoL" />
                    <span id="pixReport"> </span>
                     </td>
			</tr> 
				<tr>
					 <td>
    <input type="radio" name="options" required  value="A" id="radioA" <?php if($ans=='A'):
					echo "Checked"; endif;  ?> >
     <label>  Option A</label> </td>	 
					<td> &nbsp;&nbsp;&nbsp;&nbsp;
					<span style='color:black;font-size:22px;'>
					<label for="LogicalA"></label>
        <select  class="form-control" name="Logical_A" size="1" id="LogicalA">
        
                    <option>--Select--</option>
                    <option value="True"  <?php if($ch1=='True') echo "Selected"; ?>>True</option>
                    <option value="False" <?php if($ch1=='False') echo "Selected"; ?>>False</option>
                    
                    </select>
					</span> </td>
			</tr>
   
   <tr>					
			 <td>
    <input type="radio" name="options" required  value="B" id="radioB" <?php if($ans=='B'):
					echo "Checked"; endif;  ?> >
     <label>  Option B</label>
	 </td>
	 <td> &nbsp;&nbsp;&nbsp;&nbsp;
	 <span style='color:black;font-size:22px;'>
					<select  class="form-control" name="Logical_B" id="LogicalB">
                    <option>--Select--</option>
                    <option value="True"  <?php if($ch2=='True') echo "Selected"; ?>>True</option>
                    <option value="False" <?php if($ch2=='False') echo "Selected"; ?>>False</option>
                    </select>
		</span>
		<input type="hidden" name="optionC"  value=" " /> 
		<input type="hidden" name="optionD"  value=" " /> 
        </td>
								
		  </tr>				 
   </table>
        
         <table  class="table table-bordered">
                  <tr>
        <td colspan="3"> 
		 <button type="submit" class="btn btn-info  col-lg-12 submit"  title="Click to Update">
		 <img class="icon-small" src="../images/Save.png" />&nbsp;Update Question</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div> 
        </td>
       
        </tr>    
    	</table>		
	
</td>
</tr>
</table>
  
</form>



</div>
</div>

<div class="col-lg-3">
</div>
 
</div>
  