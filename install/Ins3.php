<?php 
error_reporting(0);
include 'functions/ParamLibFnc.php';

session_start();
$dbconn = mysql_connect($_SESSION['host'],$_SESSION['username'],$_SESSION['password']);
$result = mysql_select_db($_SESSION['db']);
        if(!$result)
        {
            echo "<h2>" . mysql_error() . "</h2>\n";
            exit;
        } 




if(isset($_REQUEST['beedySchoolName']) && $_REQUEST['beedySchoolName']!='')
    
$_SESSION['school_installed']='user';

$beedySchoolName = $_REQUEST['beedySchoolName'];
$beedySchoolMotto = $_REQUEST['beedySchoolMotto'];
//$beedySchoolAddress = $_REQUEST['beedySchoolAddress'];
$beedySchoolEmail = $_REQUEST['beedySchoolEmail'];
$beedySchoolPhoneNum = $_REQUEST['beedySchoolPhoneNum'];
//$beedySchoolWebsite = $_REQUEST['beedySchoolWebsite'];

$_SESSION['beedySchoolName'] = $_REQUEST['beedySchoolName'];
$query = "INSERT INTO beedyschooldata (beedySchoolName, beedySchoolMotto, beedySchoolEmail,
	beedySchoolPhoneNum) 
	VALUES ('$beedySchoolName', '$beedySchoolMotto', '$beedySchoolEmail', '$beedySchoolPhoneNum')"; 
$res = mysql_query($query);
	
		
		 
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
if(move_uploaded_file($_FILES['photo']['tmp_name'], '../'.$UploadDirectory.$NewFileName )): 

$pic="update beedyschooldata SET beedySchoolLogo='$location' "; 
$res = mysql_query($pic);   
 endif;
}
 

}
 
 
mysql_close($dbconn);

echo '<script type="text/javascript">window.location = "Step4.php"</script>';

 
?>
