<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Client System</title>   
    
   <link rel="shortcut icon" href="../<?php echo _SCHOOL_LOGO; ?>">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/bootstrap-toggle.css" rel="stylesheet">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="src/update.css" />
  <!-- include summernote css/js--> 
          <link href="assets/css/line-icons.css" rel="stylesheet" type="text/css">
              <link href="assets/css/elegant-icons-style.css" rel="stylesheet" type="text/css">
 	<link rel="stylesheet" href="assets/dist/sweetalert.css">
 	<style type="text/css"> 
 
 	.black-img-white {
	background-image: url(images/bg.jpg);
	color:#FFF;
}
	.blue-img-white {
	background:#E9EAED;
	color:#00008B;
	 font-weight: bold;
}
.mainContent {
	 overflow:hidden;
	position:relative;
	min-height:400px;
	height:auto;
	display:flex;
	flex-flow: row;
	}
.innerMain{
	background:#FFF;
		border:3px solid #C7E282;
	border-radius: 10px;
	color:#000;
	  }
	.innerMainLeft{
	background:#FFF;
		border:3px solid #C7E282;
	border-radius: 10px;
	color:#000;
	 }
    </style> 
  
  </head>
<body class="body_class">
  
<!--top menu -->
 
<!--top menu -->
<div class="row"> 
 <div class="col-md-12" > 

 <?php 
			 
				include(TEMPLATES_PATH . DS ."interfaces". DS . $face_pages[$face]['view'] . ".php");
		 
			?>
</div>
</div>



 
 <!-- javascripts -->
    <script src="assets/js/jquery.js"></script>
	 <script src="assets/dist/sweetalert-dev.js"></script>
 <!-- nice scroll -->
          <!-- bootstrap -->
    <!--<script src="../assets/js/jquery.min.js"></script> 
	-->	<script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/bootstrap-toggle.js"></script>
	  <script src="src/update.js" type="text/javascript"></script>
         <!-- custome script for all page-->
    <script src="style/beedy.js"></script> 
     <script src="assets/js/beedyScript.js"></script> 
 
</body>
</html>