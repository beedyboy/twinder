<div class="black-img-white">
 <span style="color:#D2322D; font-weight:bold;"> Question Type: </span>
      <label>
            <input type="radio" name="type" value="logical" id="type_0">
            Logical</label>
     
          <label>
            <input type="radio" name="type" value="complete" id="type_1" checked>
            Complete</label>

</div> 
		 <div id="complete">
		 
		 <h3 style="color:#000; font-weight:bolder;">Add New Questions To Database</h3>
  <form id="AddComplete" class="submitForm form-horizontal" role="form" enctype="multipart/form-data">
    <label style="color:#000; font-weight:bolder;"> Question</label>
	<input type="hidden" name="action" value="AddComplete" />
<input name="bankId" type="hidden" value="<?php  echo $_GET['bankId'] ; ?>" />  
 
 <textarea name="question" cols="" rows="" class="summernote"> </textarea> 
 
 <div class="form-group black-img-white">
						<label for="photo" class="control-label col-lg-5">Question Image(Optional):</label>
						 <div class="col-lg-6">
				<div id="reg_photo" role="img"><img id="previewing" src="" width="150px" />
				<div id="message"></div></div>
				<input type="file" class="form-control" name="photo" id="photo" placeholder="Insert image"  />

					 	</div>
						</div>
    <table class="table table-bordered" >
    
      <tr>
        <td>
    <input type="radio" name="options" required  value="A" id="radioA">
     <label>  Option A</label> </td>
        <td><input type="text" class="form-control"  name="optionA" id="optionA" placeholder="Enter option A" ></td>
      </tr>
      <tr>
        <td >
    <input type="radio" name="options" value="B" id="radioB"> <label>   Option B</label></td>
        <td ><input type="text" class="form-control"  name="optionB" id="optionB" placeholder="Enter option B"></td>
      </tr>
      <tr>
        <td >
        <input type="radio" name="options" value="C" id="radioC">
       <label>  Option C</label> </td>
        <td ><input type="text" class="form-control"  name="optionC" id="optionC" placeholder="Enter option C"></td>
      </tr>
      <tr>
        <td >
        <input type="radio" name="options" value="D" id="radioD"> <label>  Option D</label></td>
        <td > <input type="text" class="form-control"  name="optionD" id="optionD" placeholder="Enter option D"></td>
      </tr>
       
    </table>
   

 <br/>
<div class="form-group">
<div class="col-lg-offset-4 col-lg-4">
 <button type="submit" class="btn btn-info  pull-right submit"  title="Click to Save"><img class="icon-small" src="images/Save.png" />&nbsp;Save Question</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</div>
</form>


</div>
	
	 <div id="logical">
		 <h3 style="color:#000; font-weight:bolder;">Add New Questions To Database</h3>
  <form id="AddLogical" class="submitForm form-horizontal" role="form" enctype="multipart/form-data">
     <label style="color:#000; font-weight:bolder;"> Question</label> 
  	<input type="hidden" name="action" value="AddLogical" />
<input name="bankId" type="hidden" value="<?php  echo $_GET['bankId']; ?>" />  
 
 <textarea name="question" cols="" rows="" class="summernote2"> </textarea><br/>
 
 <div class="form-group black-img-white">
						<label for="photo" class="control-label col-lg-5">Question Image(Optional):</label>
						 <div class="col-lg-6">
				<div id="reg_photoL" role="img"><img id="previewingL" src="" width="150px" />
				<div id="messageL"></div>
				</div>
				<input type="file" class="form-control" name="photo" id="photoL" placeholder="Insert image"  />

					 	</div>
						</div>
    <table class="table table-bordered" >
    
       <tr>
        <td >
    <input type="radio" name="Logical_options" value="A" id="options_1" required> <label>   Option A</label></td>
        <td >
		<select  class="form-control" name="Logical_A" size="1" id="LogicalA" required>
         <option value="">--Select--</option>
        <option value="True">True</option>
        <option value="False">False</option>
        </select>
       </td>
      </tr>
     <tr>
        <td >
    <input type="radio" name="Logical_options" value="B" id="options_2"> <label>   Option B</label></td>
        <td >
		<select  class="form-control" name="Logical_B" size="1" id="LogicalB" required>
         <option value="">--Select--</option>
        <option value="True">True</option>
        <option value="False">False</option>
        </select>
       </td>
      </tr>
          
    </table>
   

 <br/>
<div class="form-group">
<div class="col-lg-offset-4 col-lg-4">
 <button type="submit" class="btn btn-info  pull-right submit"  title="Click to Save"><img class="icon-small" src="images/Save.png" />&nbsp;Save Question</button>
<div id="add-button" class="alert hide" style="margin:10px 0 0;"></div>
</div>
</div>
</form>


</div>
		