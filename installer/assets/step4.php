<?php 
 session_start(); 
error_reporting(E_ALL);
		ini_set('display_errors', 1);
$data = array();

 $db = $_SESSION['db'];  
 
$dbhost = $_SESSION['host'];
   $dbusername = $_SESSION['username'];
   $dbpassword = $_SESSION['password'];
   
 
define('_HOST_NAME_', $dbhost);
	define('_USER_NAME_', $dbusername);
	define('_DB_PASSWORD', $dbpassword);
	define('_DATABASE_NAME_', $db);
	
	//PDO Database Connection
	try {
		$link = new PDO('mysql:host='._HOST_NAME_.';dbname='._DATABASE_NAME_, _USER_NAME_, _DB_PASSWORD);
$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
		echo 'ERROR: ' . $e->getMessage();
	}
 

if(isset($_REQUEST['beedySchoolName']) && $_REQUEST['beedySchoolName']!=''):

    
$_SESSION['school_installed']='user';

$beedySchoolName = $_REQUEST['beedySchoolName'];
$beedySchoolMotto = $_REQUEST['beedySchoolMotto'];
//$beedySchoolAddress = $_REQUEST['beedySchoolAddress'];
$beedySchoolEmail = $_REQUEST['beedySchoolEmail'];
$beedySchoolPhoneNum = $_REQUEST['beedySchoolPhoneNum'];
//$beedySchoolWebsite = $_REQUEST['beedySchoolWebsite'];

$_SESSION['beedySchoolName'] = $_REQUEST['beedySchoolName'];



	 

 
	 $query = $link->prepare("INSERT INTO beedyschooldata (beedySchoolName, beedySchoolMotto, beedySchoolEmail,
	beedySchoolPhoneNum) VALUES (:beedySchoolName, :beedySchoolMotto, :beedySchoolEmail, :beedySchoolPhoneNum)"); 
		
	 $query->bindParam(':beedySchoolName', $beedySchoolName, PDO::PARAM_STR);
	$query->bindParam(':beedySchoolMotto', $beedySchoolMotto, PDO::PARAM_STR);
	 $query->bindParam(':beedySchoolEmail', $beedySchoolEmail, PDO::PARAM_STR); 
	 $query->bindParam(':beedySchoolPhoneNum', $beedySchoolPhoneNum, PDO::PARAM_STR); 
	$query->execute();
	$schId = $link->lastInsertId();




$name1 = $_FILES['photo']['name'];  

if($name1!="")
{
	$imagename = substr(number_format(time() * rand(),0,'',''),0,13);
	
$UploadDirectory	= 'schoolData/';  //specify upload directory ends with / (slash)
//Is file size is less than allowed size.
if ($_FILES["photo"]["size"] > 5242880) {
die("File size is too big!");
}
//allowed file type Server side check
switch(strtolower($_FILES['photo']['type']))
{
//allowed file types
case 'image/png': 
case 'image/gif': 
case 'image/jpeg': 
case 'image/pjpeg':
case 'image/jpg':
case 'image/ico':
break;
default:
die('<h1>Unsupported File!</h1> <br/><h2>Please use the back button on your browser and choose another image </h2>'); //output error
} 
$File_Name          = strtolower($_FILES['photo']['name']);
$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
$NewFileName 		= $imagename.$File_Ext; //new file name
$location='';
if($File_Name!="")
{
	$location			= $UploadDirectory.$NewFileName;
if(move_uploaded_file($_FILES['photo']['tmp_name'], '../../'.$UploadDirectory.$NewFileName )): 

$pic = $link->prepare("UPDATE beedyschooldata SET beedySchoolLogo=:name1 "); 
$pic->bindParam(':name1', $location, PDO::PARAM_STR); 
if($pic->execute())
{
	echo 1;
}
else
{
	echo 2;
}

 endif;
}
 

}
 
endif;
  
unset($_POST);
	// echo json_encode($data); 

?>
                    