<?php 

class student extends Database{
public function __construct(){
parent::__construct();
}


public static function loadStudentProfile(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedystudentprofile");
$select->execute();
return $select->fetchAll();
}

public static function loadStdProfile($stdAddNum){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedystudentprofile WHERE stdAddNum= $stdAddNum");
$select->execute();
return $select;
}

public static function addStudent($POST,$FILES){
$conn = Database::getInstance();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$stdSurname = $_POST['stdSurname']; 
$stdFirstName = $_POST['stdFirstName']; 
$stdMiddleName = $_POST['stdMiddleName'];
 $stdDob = $_POST['stdDob'];  
 $stdGender = $_POST['stdGender'];
$genStdBatchId = $_POST['genStdBatchId'];
$stdEmail = $_POST['stdEmail'];
 $username = $_POST['username'];  
 $password = $_POST['password'];  
 $classId = $_POST['classId'];  
$File_Name  = strtolower($FILES['photo']['name']);
if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'students/');
}
else{
	$image = $File_Name;
}
 
if($existCheck = self::existTwo('beedystudentprofile',  'genStdBatchId', 'stdEmail',  $genStdBatchId, $stdEmail)==0)
{
//$barcodeimg = $barcode.".png"; 
$stmt = $conn->db->prepare("INSERT INTO beedystudentprofile (stdSurname, stdFirstName, stdMiddleName, 
stdDob, stdGender, stdPicture,  stdEmail, username, password, genStdBatchId,  classId) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
if($stmt->execute( array($stdSurname, $stdFirstName, $stdMiddleName, $stdDob, $stdGender, $image,
  $stdEmail, $username, $password, $genStdBatchId, $classId  ) )):
$sid = $conn->db->lastInsertId();
self::addLogin('stdAddNum',  $sid, $stdEmail, $username, $password, $stdSurname, $stdFirstName, 3); 
return 1;
else:	return 0; endif;
} else {return 2; }
}

 
public static function stdUpdateProcess(){
$conn = Database::getInstance();
$type = $_POST['type'];
if($type=="UpdPersonal"):
$updateClass = $conn->db->prepare("UPDATE beedystudentprofile SET  stdSurname=:stdSurname, stdFirstName=:stdFirstName,
 stdMiddleName=:stdMiddleName, stdDob=:stdDob,  stdGender=:stdGender WHERE stdAddNum=:stdAddNum ");
$updateClass->bindParam(':stdSurname', $_POST['stdSurname'], PDO::PARAM_STR);
$updateClass->bindParam(':stdFirstName', $_POST['stdFirstName'], PDO::PARAM_STR);
$updateClass->bindParam(':stdMiddleName', $_POST['stdMiddleName'], PDO::PARAM_STR);
$updateClass->bindParam(':stdDob', $_POST['stdDob'], PDO::PARAM_STR); 
$updateClass->bindParam(':stdGender', $_POST['stdGender'], PDO::PARAM_STR); 
$updateClass->bindParam(':stdAddNum', $_POST['stdAddNum']);
if($updateClass->execute()){return 1;} else {return 0;} 
elseif($type=="UpdateAcademic"):
$updateClass = $conn->db->prepare("UPDATE beedystudentprofile SET 
 genStdBatchId=:genStdBatchId, genStudentClassId=:genStudentClassId   WHERE stdAddNum=:stdAddNum "); 
$updateClass->bindParam(':genStdBatchId', $_POST['genStdBatchId'], PDO::PARAM_INT); 
$updateClass->bindParam(':genStudentClassId', $_POST['classId'], PDO::PARAM_INT);
$updateClass->bindParam(':stdAddNum', $_POST['stdAddNum']);
if($updateClass->execute()){return 1;} else {return 0;} 
elseif($type=="UpdateContact"):
$updateClass = $conn->db->prepare("UPDATE beedystudentprofile SET  username=:username, password=:password, stdEmail=:stdEmail   WHERE stdAddNum=:stdAddNum ");
$updateClass->bindParam(':username', $_POST['username'], PDO::PARAM_STR);
$updateClass->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
$updateClass->bindParam(':stdEmail', $_POST['stdEmail'], PDO::PARAM_STR);
$updateClass->bindParam(':stdAddNum', $_POST['stdAddNum']);
if($updateClass->execute()){
	return self::updateStdLogin($_POST['stdEmail'],$_POST['username'],$_POST['password'], $_POST['stdAddNum']); } else {return 0;} 
 
endif;
} 

 
public static function changeProfPic($POST,$FILES){
$conn = Database::getInstance(); 
	$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
 
 if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'students/');
}
else{
	$image = $File_Name;
} 
$updateClass = $conn->db->prepare("UPDATE beedystudentprofile SET stdPicture=:stdPicture WHERE stdAddNum=:stdAddNum ");
$updateClass->bindParam(':stdPicture', $image, PDO::PARAM_STR); 
$updateClass->bindParam(':stdAddNum', $_POST['stdAddNum']);
if($updateClass->execute()){return 1;} else {return 0;} 
 
} 

public static function disableStudent($stdAddNum){
$conn = Database::getInstance();
$Active	= 0;
$deleteInfo = $conn->db->prepare("UPDATE beedystudentprofile SET Active=:Active WHERE stdAddNum = :stdAddNum");
$deleteInfo->bindValue(":stdAddNum",$stdAddNum);
$deleteInfo->bindValue(":Active",$Active);
$deleteInfo->execute();
return "Student disabled successfully";
}			 
public static function enableStudent($stdAddNum){
$conn = Database::getInstance();
$Active	= 1;
$deleteInfo = $conn->db->prepare("UPDATE beedystudentprofile SET Active=:Active WHERE stdAddNum = :stdAddNum");
$deleteInfo->bindValue(":stdAddNum",$stdAddNum);
$deleteInfo->bindValue(":Active",$Active);
$deleteInfo->execute();
return "Student enabled successfully";
}			
 
//delete functins
	 
 public static function deleteStudent($stdAddNum){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedystudentprofile WHERE stdAddNum = :stdAddNum");
$deleteInfo->bindValue(":stdAddNum",$stdAddNum);
$deleteInfo->execute();
return "Student deleted successfully";
} 

}
?>