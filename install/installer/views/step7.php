
 <?php

session_start();

 $db = $_SESSION['db'];
 $dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
  $oth = file_get_contents("../text.txt");
$myFile = "../../client/classes/Database.php";
$smyFile = "../../server/classes/Database.php";
$lmyFile = "../../loader/classes/Database.php";
$fh = fopen($myFile, 'w');


if ($fh == TRUE)
{	
	$string ='';
    $string .= "<"."?php \n";
    
    $string .= "class Database \n";
	$string .= "{ \n";
 $string .= "public".' '."$"."db; \n";
 $string .= "private static".' '."$"."dsn = 'mysql:host=$dbhost;dbname=$db'; \n";
  $string .= "private static".' '."$"."user= '".$dbusername."'; \n";
 $string .= "private static".' '."$"."pass= '".$dbpassword."'; \n";

  $string .= "public static".' '."$"."instance; \n";
 $string .= "public function".' '."__construct() \n";
 $string .= "{ \n";
   $string .= "$"."this->db = new PDO(self::$"."dsn,self::$"."user,self::$"."pass); \n" ;
   $string .= "} \n";
   $string .= "\n";
    $string .= "public static function".' '."getInstance"."() \n";
 $string .= "{ \n";
  $string .= "if"."(!isset"."(self"."::$"."instance)) \n";
 
  $string .= "{ \n";
  $string .= "$"."object= __CLASS__; \n";
  $string .= "self"."::$"."instance= new".' '."$"."object; \n";
      $string .= "} \n";
	     $string .= "return self"."::$"."instance; \n";
 $string .= "} \n";

 
 $string .= " \n";
 $string .= $oth;
 
 $string .= "\n";
 
 
 
  $string .= "} \n";
	
	 
	
    $string .="?".">";

    fwrite($fh, $string);
	
	
	
}

fclose($fh);

$sfh = fopen($smyFile, 'w');

if ($sfh == TRUE)
{	
	$string ='';
    $string .= "<"."?php \n";
    
    $string .= "class Database \n";
	$string .= "{ \n";
 $string .= "public".' '."$"."db; \n";
 $string .= "private static".' '."$"."dsn = 'mysql:host=$dbhost;dbname=$db'; \n";
  $string .= "private static".' '."$"."user= '".$dbusername."'; \n";
 $string .= "private static".' '."$"."pass= '".$dbpassword."'; \n";

  $string .= "public static".' '."$"."instance; \n";
 $string .= "public function".' '."__construct() \n";
 $string .= "{ \n";
   $string .= "$"."this->db = new PDO(self::$"."dsn,self::$"."user,self::$"."pass); \n" ;
   $string .= "} \n";
   $string .= "\n";
    $string .= "public static function".' '."getInstance"."() \n";
 $string .= "{ \n";
  $string .= "if"."(!isset"."(self"."::$"."instance)) \n";
 
  $string .= "{ \n";
  $string .= "$"."object= __CLASS__; \n";
  $string .= "self"."::$"."instance= new".' '."$"."object; \n";
      $string .= "} \n";
	     $string .= "return self"."::$"."instance; \n";
 $string .= "} \n";

 
 $string .= " \n";
 $string .= $oth;
 
 $string .= "\n";
 
 
 
  $string .= "} \n";
	
	 
	
    $string .="?".">";

    fwrite($sfh, $string);
	
	
	
}

fclose($sfh);

$lfh = fopen($lmyFile, 'w');
if ($lfh == TRUE)
{	
	$string ='';
    $string .= "<"."?php \n";
    
    $string .= "class Database \n";
	$string .= "{ \n";
 $string .= "public".' '."$"."db; \n";
 $string .= "private static".' '."$"."dsn = 'mysql:host=$dbhost;dbname=$db'; \n";
  $string .= "private static".' '."$"."user= '".$dbusername."'; \n";
 $string .= "private static".' '."$"."pass= '".$dbpassword."'; \n";

  $string .= "public static".' '."$"."instance; \n";
 $string .= "public function".' '."__construct() \n";
 $string .= "{ \n";
   $string .= "$"."this->db = new PDO(self::$"."dsn,self::$"."user,self::$"."pass); \n" ;
   $string .= "} \n";
   $string .= "\n";
    $string .= "public static function".' '."getInstance"."() \n";
 $string .= "{ \n";
  $string .= "if"."(!isset"."(self"."::$"."instance)) \n";
 
  $string .= "{ \n";
  $string .= "$"."object= __CLASS__; \n";
  $string .= "self"."::$"."instance= new".' '."$"."object; \n";
      $string .= "} \n";
	     $string .= "return self"."::$"."instance; \n";
 $string .= "} \n";

 
 $string .= " \n";
 $string .= $oth;
 
 $string .= "\n";
 
 
 
  $string .= "} \n";
	
	 
	
    $string .="?".">";

    fwrite($lfh, $string);
	
	
	
}

fclose($lfh);
 ?>
  <div class="grid mobile ">

<div class="column  column-12">
<center>Installation Successful</center>

 

<div class="grid mobile" >

<div class="column column-12">
 


 

<!-- every other thing-->
 
<div class="column column-12">

  <center style="margin-top:10%;">
 	<h1>Trial Mode</h1>
 
<a href='../index.php?modfunc=logout&ins=comp' target=\"_parent\">
 <button class="installBtn generateLicense"><img src='public/images/login.png'  width="90" alt="Login Now" height="130"  /> 
 </button>
 </a>

 	


 </center>
  
</div>
 

</div>




</div>


</div>
</div>

<script src="public/js/jquery.js"></script> 