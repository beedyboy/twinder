<?php
 
 	$arr_scripts = array ('jquery.min.js', 'bootstrap.min.js','respond.min.js','beedy.js','beedyScript.js');
	     ?>  
 <script src="../src/update.js" type="text/javascript"></script> 

<?php  //include JS files
  foreach ($arr_scripts as $eachscript) {
  	echo '<script type="text/JavaScript" src="../style/' . $eachscript . '"></script>' . "\n";
  }
  ?>  
  <!-- javascripts -->
 
     <script src="../assets/dist/sweetalert-dev.js"></script>
     
 <!-- nice scroll -->
   
	    <script src="../assets/js/bootstrap-toggle.js"></script>
	

  
  <script> 
 
  function hidefor() { 
	$("#complete").hide();
 $("#logical").hide(); 
}

$("#type_0").click(function () {
hidefor();
$("#logical").css("display","block");     
});


$("#type_1").click(function () {
hidefor();
$("#complete").css("display","block");     
});

 

  hidefor();
 $("#complete").css("display","block");     

 
  
 
	</script>


</body>
</html>
 