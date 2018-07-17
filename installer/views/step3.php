
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
<center>Connected to MySQL DBMS</center>

 

<div class="grid mobile" >

<div class="column column-12">

<div style="border: 1px solid #000; border-radius: 15px; height: 50px;"  class="column offset-3 column-6">

<div style="border: 1px solid #000;  margin-top: 8px;" >
<div class="progressBar"  style="width: 50%; background: forestgreen; border: 1px solid #000;  ">
<span style="color: #FFF;">50%</span>
</div>
</div>
		 <span style="margin-bottom: 0px; left:30%; width: 40%; text-align: center; position: absolute;">Step 2 of 4</span>
</div>


 

<!-- every other thing-->
 
<div class="column column-12">
<center><strong>System needs to create a new database.<br />
          (This could take up to a minute to complete)<br />
            Please enter a name.</strong></center>

<form  class="formTag install-step3 form-horizontal" data-parsley-validate=''>
	
	
 
	
<div class="form-group">
 
 
<input type="text"  name="db" size="20" value="twinder" class="form-control  " required="">
 </div>

 
	 
 
<div class="form-group">
  
<input type="checkbox"  name="purgedb"   value="purgedb"   /><strong>Remove data from existing database</strong>
  
 
 
<div class="form-group">
 
 <button type="submit"  id="submitBtn" class="btn btn-primary"><span class="fas fa-save"></span> Save & Next</button>
 </div>

<div id="alert_message_mod"> 
	 	 
	 </div>
 
</form>
  
</div>
 

</div>




</div>


</div>
</div>

<script src="public/js/parsley.min.js"></script> 
 
 