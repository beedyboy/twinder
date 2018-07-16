<?php 
 
error_reporting(0);
session_start();
$_SESSION['username'] = $_POST["addusername"];
$_SESSION['password'] = $_POST["addpassword"];
$_SESSION['server'] = $_POST["server"];
$_SESSION['port'] = $_POST["port"];
$_SESSION['host'] = $_POST['server'] . ':' . $_POST['port'];

$data = array();

$err = " <div class='heading'>Couldn't connect to database server: " . $_SESSION['host'] . "
<div>

 <br /><span class='header_txt'>Possible causes are:</span>

<ul class='error_cause'>
<li>1. MySQL is not installed. Try downloading from <a href='http://dev.mysql.com/downloads/' target=_blank>MySQL Website</a></li>
<li>2. Username or Password or MySQL Configuration is incorrect</li>
<li>3. Php.ini is not properly configured. Search for MySQL in php.ini</li>
</ul> ";
$err.="<button class='installBtn' id='refreshStep'><img src='public/images/retry.png'  /><button>

</div>
</div>";
 
//create connection
$conn = new mysqli($_SESSION['server'],$_SESSION['username'],$_SESSION['password']);

//check connection 
if($conn->connect_error):

	$data['status'] = "db_error";
	$data['msg'] = $err;
else:
	$data['status'] = "success";
	 $data['msg']  =   'Database Connection established successfully';
endif;

		 

	unset($_POST);
	echo json_encode($data);  
?>
                    