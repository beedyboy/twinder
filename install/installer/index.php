<?php include_once "classes/session.php"; 

  $GetSession = new Session;
  ?>
<style>
.clear { height:10px;} 
.come-middle{
position: absolute;

width: 50%;
left:25%;
}
.thick-border{ 
border: 5px solid #16a085;
border-radius: 10px;
 
color: #555555;
}
</style>
<?php

error_reporting(E_ALL);
		ini_set('display_errors', 1);
include "layouts/app.php";

?>