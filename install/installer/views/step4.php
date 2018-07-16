
 <?php

session_start();
// echo php_uname();
 $version=phpversion();
 $version_allow='5.3.0';
 $ver_comp = false;
 if(version_compare(PHP_VERSION, $version_allow, '>='))
 {  
 	 $ver_comp= true;
 }
 else
 {
    $ver_comp = false;
 }

  $dbFile = "../db.php";
  $dummyFile = "../uploads/dummy.txt";
   $dummy2File = "../uploads/admin/dummy.txt";
 ?>
  <div class="grid mobile ">

<div class="column  column-12">
<center>Database created</center>

 

<div class="grid mobile" >

<div class="column column-12">

<div style="border: 1px solid #000; border-radius: 15px; height: 50px;"  class="column offset-3 column-6">

<div style="border: 1px solid #000;  margin-top: 8px;" >
<div class="progressBar"  style="width: 75%; background: forestgreen; border: 1px solid #000;  ">
<span style="color: #FFF; left: 50%;">75%</span>
</div>
</div>
		 <span style="margin-bottom: 0px; left:30%; width: 40%; text-align: center; position: absolute;">Step 3 of 4</span>
</div>


 

<!-- every other thing-->
 
<div class="column column-12">
<center><strong>Set Institution Profile.<br />
          (All fields are important) </strong></center>

<div id="alert_message_mod"> 
	 	 
	 </div>
<form method="post" class="formTag install-step4 form-horizontal" enctype="multipart/form-data" role="form" data-parsley-validate=''>
	 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Institution Name:</label> 
<input type="text"  name="beedySchoolName"  placeholder="Enter Institution Name" class="form-control  column-1" data-parsley-maxlength="50" required="">
 </div>

 </div>

  
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Institution Motto:</label> 
<input type="text"  class="form-control  column-1"  name="beedySchoolMotto" id="beedySchoolMotto" placeholder="Enter Institution Motto" required="">
 </div>

 </div>


 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Institution Email:</label> 
<input type="email"  class="form-control  column-1"  name="beedySchoolEmail" id="beedySchoolEmail" placeholder="Enter Institution Email" required="">
 </div>

 </div>

  
 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Phone Number:</label> 
<input type="text"  class="form-control  column-1"  name="beedySchoolPhoneNum" id="beedySchoolPhoneNum" placeholder="Enter Institution Phone Number" required="">
 </div>

 </div>

 
	
<div class="form-group">
<div class="row"> 
<label class="column  column-3">Institution Logo:</label> 
<input type="file"  class="form-control  column-1" name="photo" id="photo" placeholder="Enter your Photo" required="">
 </div>

 </div>

  
 
 
<div class="form-group">
 
 <button type="submit"  id="submitBtn" class="btn btn-primary"><span class="fas fa-save"></span> Save & Next</button>
 </div>

 
</form>
  
</div>
 

</div>




</div>


</div>
</div>

<script src="public/js/jquery.js"></script>
<script src="public/js/parsley.min.js"></script> 
 
 