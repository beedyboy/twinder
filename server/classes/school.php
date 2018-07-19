<?php 

class school extends Database{
public function __construct(){
parent::__construct();
}
public static function loadSchoolData(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedyschooldata");
$select->execute();
return $select->fetchAll();
}
public static function loadAdmin(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM systemadmin");
$select->execute();
return $select->fetchAll();
}

public static function loadStudentBatches(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM genstudentbatches");
$select->execute();
return $select->fetchAll();
}

public static function loadSchool(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedysystem");
$select->execute();
return $select->fetchAll();
}
public static function loadPermission(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM permissions");
$select->execute();
return $select->fetchAll();
}
public static function loadPermit($permit){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM permissions WHERE permitId = ?");
$select->execute(array($permit));
//return $select->fetchAll();
while($get =  $select->fetch(PDO::FETCH_ASSOC))
{
	return $get['allocations'];
}
return $select->fetchAll();
}
 // Generate Guid 
 public static  function charFormat($word)
{
$output=str_replace("'", '',$word);
$output=str_replace(" ", '',$output);
$output=str_replace("-", '',$output);
$output=substr($output, 0,16);
return $output;
}
public static function DemoGuid($y) { 
      $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-'.$y . 
        substr($s,8,3). '-' . 
        substr($s,11,4); 
    return $guidText;
}
public static function NewGuid() { 
    $s = strtoupper(md5(uniqid(rand(),true))); 
    $guidText = 
        substr($s,0,4) . 
        substr($s,4,4) . 
        substr($s,8,4).  
        substr($s,12,4); 
    return $guidText;
}
public static function NewGuidR($s) { 
     $guidText = 
        substr($s,0,4) . '-' . 
        substr($s,4,4) . '-' . 
        substr($s,8,4). '-' . 
        substr($s,12,4); 
    return strtoupper($guidText);
}
// End Generate Guid 
 public static function beedy($beedy) {
	 
					$chars = "BEEDYBOLADE";
					$pass= rtrim(base64_encode($beedy), "=");
					return strtoupper($pass);
				}
 
 public static function beedyCheck($beedy)
				{
					$check= base64_decode($beedy);
 					return strtoupper($check); 
				}
 
public static function loadSchoolTerm(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedyschoolterm");
$select->execute();
return $select->fetchAll();
}

public static function loadStudentGroup(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedystdgroup");
$select->execute();
return $select->fetchAll();
}

public static function loadClassList(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedyclasslist");
$select->execute();
return $select->fetchAll();
}

public static function loadSubjectList(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedysubjectlist");
$select->execute();
return $select->fetchAll();
}


public static function loadExamTypeList(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedyexamtype");
$select->execute();
return $select->fetchAll();
}

public static function loadBankGroup(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroup");
$select->execute();
return $select->fetchAll();
} 

public static function getResultLog(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroup");
$select->execute();
return $select->fetchAll();
} 

public static function addStudentBatches(){
$conn = Database::getInstance();
if($existCheck = System::existOne('genstudentbatches', 'genStdBatchesYear',  $_POST['genStdBatchesYear'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO genstudentbatches (genStdBatchesYear) VALUES (:genStdBatchesYear)");
$stmt->bindParam(':genStdBatchesYear', $_POST['genStdBatchesYear'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}

public static function addSchoolTerm(){
    
$conn = Database::getInstance();
if($existCheck = System::existOne('beedychoolterm', 'SchoolTermName', $_POST['genSchTerm'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedyschoolterm (SchoolTermName) VALUES (:SchoolTermName)");
$stmt->bindParam(':SchoolTermName', $_POST['genSchTerm'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}
 
public static function addStdGroup(){
$conn = Database::getInstance();
if($existCheck = System::existOne('beedystdgroup', 'groupName', $_POST['stdGroup'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedystdgroup (groupName) VALUES (:groupName)");
$stmt->bindParam(':groupName', $_POST['stdGroup'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}
 
public static function addToClass(){
$conn = Database::getInstance();
if($existCheck = System::existTwo('beedyclasslist', 'groupId', 'className', $_POST['groupId'], $_POST['className'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedyclasslist (groupId, className) VALUES (:groupId, :className)");
$stmt->bindParam(':groupId', $_POST['groupId'], PDO::PARAM_STR); 
$stmt->bindParam(':className', $_POST['className'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}
 
public static function addClassSubject(){
$conn = Database::getInstance();
if($existCheck = System::existTwo('beedysubjectlist', 'classId', 'subjectName', $_POST['classId'], $_POST['subjectName'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedysubjectlist (classId, subjectName) VALUES (:classId, :subjectName)");
$stmt->bindParam(':classId', $_POST['classId'], PDO::PARAM_STR); 
$stmt->bindParam(':subjectName', $_POST['subjectName'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}
 
public static function addAdmin($POST,$FILES){
$conn = Database::getInstance();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$username = $_POST['username']; 
$email = $_POST['email']; 
$password = $_POST['password']; 
$permitId = $_POST['permitId']; 
$File_Name  = strtolower($FILES['photo']['name']);
if($File_Name!="")
{
$image = System::uploadImage($FILES,$barcode,'admin/');
}
else{
$image = $File_Name;
} 
if($existCheck = System::existTwo('systemadmin', 'username', 'email', $username, $email)==0)
{ 
$stmt = $conn->db->prepare("INSERT INTO systemadmin (firstName, lastName, area_privilege, email, username, password, image ) VALUES (?,?,?,?,?,?,?)");
if($stmt->execute( array($firstName, $lastName, $permitId, $email,  $username, $password, $image) )):
$sid = $conn->db->lastInsertId();
System::addLogin('adminId', $sid, $email, $username, $password, $firstName, $lastName, 1); 
return 1;
else:	return 0; endif;
} else {return 2; }
}

public static function addNewExamType(){
$conn = Database::getInstance();
if($existCheck = System::existOne('beedyexamtype', 'typeName',  $_POST['typeName'])==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedyexamtype (typeName) VALUES (:typeName)");
$stmt->bindParam(':typeName', $_POST['typeName'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
}
}

public static function addNewUserType(){
 	
$conn = Database::getInstance();
if($existCheck = System::existOne('permissions', 'permissionGrp',  $_POST['permissionGrp'])==0)
{ 
$schSettings=NULL;
$grpSettings=NULL;
$clsSettings=NULL;
$subSettings=NULL;
$stdSettings=NULL;
$admSettings=NULL;
$examSettings=NULL;
$ldrSettings=NULL;
$permit=NULL;
	if(isset($_POST['schSetAll'])):
$schSettings =  $_POST['schSetAll'];

elseif(isset($_POST['schSettings'])):
$schSettings =  $_POST['schSettings'];
$schSettings =  implode(",", $schSettings);
endif;
//	$schSetAll;
if(isset($_POST['grpAll'])):
$grpSettings =  $_POST['grpAll'];

elseif(isset($_POST['grpSettings'])):
$grpSettings =  $_POST['grpSettings'];
$grpSettings =  implode(",", $grpSettings);
endif;
//	$grpAll; 
if(isset($_POST['clsAll'])):
$clsSettings =  $_POST['clsAll'];

elseif(isset($_POST['clsSettings'])):
$clsSettings =  $_POST['clsSettings'];
$clsSettings =  implode(",", $clsSettings);
endif;
//	$clsAll;
if(isset($_POST['subAll'])):
$subSettings =  $_POST['subAll'];

elseif(isset($_POST['subSettings'])):
$subSettings =  $_POST['subSettings'];
$subSettings =  implode(",", $subSettings);
endif;
//	$subAll;
if(isset($_POST['stdAll'])):
$stdSettings =  $_POST['stdAll'];

elseif(isset($_POST['stdSettings'])):
$stdSettings =  $_POST['stdSettings'];
$stdSettings =  implode(",", $stdSettings);
endif;
//	$stdAll;
if(isset($_POST['admAll'])):
$admSettings =  $_POST['admAll'];

elseif(isset($_POST['admSettings'])):
$admSettings =  $_POST['admSettings'];
$admSettings =  implode(",", $admSettings);
endif;
//	$admAll;
if(isset($_POST['examAll'])):
$examSettings =  $_POST['examAll'];

elseif(isset($_POST['examSettings'])):
$examSettings =  $_POST['examSettings'];
$examSettings =  implode(",", $examSettings);
endif;
//	$examAll;
if(isset($_POST['loaderAll'])):
$ldrSettings =  $_POST['loaderAll'];

elseif(isset($_POST['ldrSettings'])):
$ldrSettings =  $_POST['ldrSettings'];
$ldrSettings =  implode(",", $ldrSettings);
endif;
if(isset($_POST['permit'])):
$permit =  $_POST['permit']; 
endif;
 
$permission = $schSettings.','.$grpSettings.','.$clsSettings.','.$subSettings.','.$stdSettings.','.$admSettings.','.$examSettings.','.$ldrSettings.','.$permit;

$stmt = $conn->db->prepare("INSERT INTO permissions (permissionGrp,allocations) VALUES (:permissionGrp,:allocations)");
$stmt->bindParam(':permissionGrp', $_POST['permissionGrp'], PDO::PARAM_STR); 
$stmt->bindParam(':allocations', $permission, PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1;
else:
return 0;
endif;
} else {
return 2;
} 

}


public static function updateTheme($theme){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedyschooldata SET theme=:theme");
$updateClass->bindParam(':theme', $theme, PDO::PARAM_STR); 
if($updateClass->execute()){return 1;} else {return 0;} 
} 
public static function updateSchoolData($POST,$FILES){
$conn = Database::getInstance();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
 if($File_Name!="")
{
$image = self::uploadSchImage($FILES,$barcode);
 $updateSchoolData = $conn->db->prepare("UPDATE beedyschooldata SET beedySchoolLogo=:beedySchoolLogo, beedySchoolName=:beedySchoolName, beedySchoolMotto=:beedySchoolMotto,
beedySchoolAddress=:beedySchoolAddress, beedySchoolEmail=:beedySchoolEmail, beedySchoolPhoneNum=:beedySchoolPhoneNum,
 beedySchoolWebsite=:beedySchoolWebsite");
$updateSchoolData->bindParam(':beedySchoolName', $_POST['beedySchoolName'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolMotto', $_POST['beedySchoolMotto'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolAddress', $_POST['beedySchoolAddress'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolEmail', $_POST['beedySchoolEmail'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolPhoneNum', $_POST['beedySchoolPhoneNum'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolWebsite', $_POST['beedySchoolWebsite'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolLogo', $image); 
if($updateSchoolData->execute())
{return 1;} else {return 0;}
}
else{ 
$updateSchoolData = $conn->db->prepare("UPDATE beedyschooldata SET beedySchoolName=:beedySchoolName, beedySchoolMotto=:beedySchoolMotto,
beedySchoolAddress=:beedySchoolAddress, beedySchoolEmail=:beedySchoolEmail, beedySchoolPhoneNum=:beedySchoolPhoneNum, beedySchoolWebsite=:beedySchoolWebsite");
$updateSchoolData->bindParam(':beedySchoolName', $_POST['beedySchoolName'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolMotto', $_POST['beedySchoolMotto'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolAddress', $_POST['beedySchoolAddress'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolEmail', $_POST['beedySchoolEmail'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolPhoneNum', $_POST['beedySchoolPhoneNum'], PDO::PARAM_STR);
$updateSchoolData->bindParam(':beedySchoolWebsite', $_POST['beedySchoolWebsite'], PDO::PARAM_STR); 
 if($updateSchoolData->execute())
{return 1;} else {return 0;} }

}

public static function updateAdmin(){
$conn = Database::getInstance();
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$permitId = $_POST['permitId'];
$username = $_POST['username']; 
$password = $_POST['password']; 
$adminId = $_POST['adminId']; 
if($existCheck = System::existTwo('systemadmin', 'username','password', $username, $password)==0)
{ 
$updateClass = $conn->db->prepare("UPDATE systemadmin SET  firstName=:firstName, lastName=:lastName, email=:email, area_privilege=:permitId, username=:username,password=:password WHERE adminId=:adminId ");
$updateClass->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$updateClass->bindParam(':lastName', $lastName, PDO::PARAM_STR);
$updateClass->bindParam(':email', $email, PDO::PARAM_STR);
$updateClass->bindParam(':permitId', $permitId, PDO::PARAM_STR);
$updateClass->bindParam(':username', $username, PDO::PARAM_STR);
$updateClass->bindParam(':password', $password, PDO::PARAM_STR);
$updateClass->bindParam(':adminId', $adminId, PDO::PARAM_INT);
if($updateClass->execute()){
return self::updateLogin($firstName,$lastName,$email,$username,$password,'adminId', $adminId);} else {return 0;} 
}
else {return 2;}
} 


public static function uploadSchImage($FILES,$imagename){
$UploadDirectory	= 'schoolData/';  //specify upload directory ends with / (slash)
//Is file size is less than allowed size.
if ($FILES["photo"]["size"] > 5242880) {
die("File size is too big!");
}
//allowed file type Server side check
switch(strtolower($FILES['photo']['type']))
{
//allowed file types
case 'image/png': 
case 'image/gif': 
case 'image/jpeg': 
case 'image/pjpeg':
case 'image/jpg':
break;
default:
die('Unsupported File!'); //output error
} 
$File_Name          = strtolower($FILES['photo']['name']);
$File_Ext           = substr($File_Name, strrpos($File_Name, '.')); //get file extention
$NewFileName 		= $imagename.$File_Ext; //new file name
$location='';
if($File_Name!="")
{$location			= $UploadDirectory.$NewFileName;
if(move_uploaded_file($FILES['photo']['tmp_name'], '../'.$UploadDirectory.$NewFileName )): return $location;  
else: return $location; endif;
}
else{ return $location;}
}


public static function updateBatchesYear(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE genstudentbatches SET genStdBatchesYear=:genStdBatchesYear WHERE genStdBatchId=:genStdBatchId ");
$updateClass->bindParam(':genStdBatchesYear', $_POST['genStdBatchesYear'], PDO::PARAM_STR);
$updateClass->bindParam(':genStdBatchId', $_POST['genStdBatchId'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
} 

public static function updateStdGroup(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedystdgroup SET groupName=:groupName WHERE groupId=:groupId ");
$updateClass->bindParam(':groupName', $_POST['groupName'], PDO::PARAM_STR);
$updateClass->bindParam(':groupId', $_POST['groupId'], PDO::PARAM_INT);
if($updateClass->execute()){return 1;} else {return 0;} 
} 

public static function updateSemester(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedyschoolterm SET SchoolTermName=:SchoolTermName WHERE SchoolTermId=:SchoolTermId ");
$updateClass->bindParam(':SchoolTermName', $_POST['genSchTerm'], PDO::PARAM_STR);
$updateClass->bindParam(':SchoolTermId', $_POST['SchoolTermId'], PDO::PARAM_INT); 
if($updateClass->execute()){return 1;} else {return 0;} 
} 

public static function updateClass(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedyclasslist SET ClassName=:ClassName, groupId=:groupId WHERE classId=:classId ");
$updateClass->bindParam(':ClassName', $_POST['ClassName'], PDO::PARAM_STR);
$updateClass->bindParam(':groupId', $_POST['groupId'], PDO::PARAM_INT); 
$updateClass->bindParam(':classId', $_POST['classId'], PDO::PARAM_INT); 
if($updateClass->execute()){return 1;} else {return 0;} 
} 
public static function updateClassSubject(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedysubjectlist SET subjectName=:subjectName, classId=:classId WHERE subId=:subId ");
$updateClass->bindParam(':subjectName', $_POST['subjectName'], PDO::PARAM_STR);
$updateClass->bindParam(':classId', $_POST['classId'], PDO::PARAM_INT); 
$updateClass->bindParam(':subId', $_POST['subId'], PDO::PARAM_INT); 
if($updateClass->execute()){return 1;} else {return 0;} 
} 
		 
public static function updateExamType(){
$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedyexamtype SET typeName=:typeName WHERE examTypeId=:examTypeId ");
$updateClass->bindParam(':typeName', $_POST['typeName'], PDO::PARAM_STR); 
$updateClass->bindParam(':examTypeId', $_POST['examTypeId'], PDO::PARAM_INT); 
if($updateClass->execute()){return 1;} else {return 0;} 
} 
		 
public static function updateUserPermit(){
$conn = Database::getInstance();

$schSettings=NULL;
$grpSettings=NULL;
$clsSettings=NULL;
$subSettings=NULL;
$stdSettings=NULL;
$admSettings=NULL;
$examSettings=NULL;
$ldrSettings=NULL;
$permit=NULL;
	if(isset($_POST['schSetAll'])):
$schSettings =  $_POST['schSetAll'];

elseif(isset($_POST['schSettings'])):
$schSettings =  $_POST['schSettings'];
$schSettings =  implode(",", $schSettings);
endif;
//	$schSetAll;
if(isset($_POST['grpAll'])):
$grpSettings =  $_POST['grpAll'];

elseif(isset($_POST['grpSettings'])):
$grpSettings =  $_POST['grpSettings'];
$grpSettings =  implode(",", $grpSettings);
endif;
//	$grpAll; 
if(isset($_POST['clsAll'])):
$clsSettings =  $_POST['clsAll'];

elseif(isset($_POST['clsSettings'])):
$clsSettings =  $_POST['clsSettings'];
$clsSettings =  implode(",", $clsSettings);
endif;
//	$clsAll;
if(isset($_POST['subAll'])):
$subSettings =  $_POST['subAll'];

elseif(isset($_POST['subSettings'])):
$subSettings =  $_POST['subSettings'];
$subSettings =  implode(",", $subSettings);
endif;
//	$subAll;
if(isset($_POST['stdAll'])):
$stdSettings =  $_POST['stdAll'];

elseif(isset($_POST['stdSettings'])):
$stdSettings =  $_POST['stdSettings'];
$stdSettings =  implode(",", $stdSettings);
endif;
//	$stdAll;
if(isset($_POST['admAll'])):
$admSettings =  $_POST['admAll'];

elseif(isset($_POST['admSettings'])):
$admSettings =  $_POST['admSettings'];
$admSettings =  implode(",", $admSettings);
endif;
//	$admAll;
if(isset($_POST['examAll'])):
$examSettings =  $_POST['examAll'];

elseif(isset($_POST['examSettings'])):
$examSettings =  $_POST['examSettings'];
$examSettings =  implode(",", $examSettings);
endif;
//	$examAll;
if(isset($_POST['loaderAll'])):
$ldrSettings =  $_POST['loaderAll'];

elseif(isset($_POST['ldrSettings'])):
$ldrSettings =  $_POST['ldrSettings'];
$ldrSettings =  implode(",", $ldrSettings);
endif;
if(isset($_POST['permit'])):
$permit =  $_POST['permit']; 
endif;
$permission = $schSettings.','.$grpSettings.','.$clsSettings.','.$subSettings.','.$stdSettings.','.$admSettings.','.$examSettings.','.$ldrSettings.','.$permit;

$updateClass = $conn->db->prepare("UPDATE permissions SET permissionGrp=:permissionGrp, allocations=:allocations WHERE permitId=:permitId ");
$updateClass->bindParam(':permissionGrp', $_POST['permissionGrp'], PDO::PARAM_STR); 
$updateClass->bindParam(':allocations', $permission, PDO::PARAM_STR); 
$updateClass->bindParam(':permitId', $_POST['permitId'], PDO::PARAM_INT); 
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

public static function setCurrentSess(){
$conn = Database::getInstance();
$updateSchoolData = $conn->db->prepare("UPDATE beedyschooldata SET CurrentSession=:CurrentSession");
$updateSchoolData->bindParam(':CurrentSession', $_POST['genStdBatchId'], PDO::PARAM_INT); 
if($updateSchoolData->execute())
{
return 1;
} else {
return 0;
}
}
public static function setCurrentSems(){
$conn = Database::getInstance();
$updateSchoolData = $conn->db->prepare("UPDATE beedyschooldata SET CurrentTerm=:CurrentSemester");
$updateSchoolData->bindParam(':CurrentSemester', $_POST['SchoolTermId'], PDO::PARAM_INT);  
if($updateSchoolData->execute()){return 1;} else {return 0;}
}


//delete functins
	 	
public static function deleteAdmin($adminId){
$conn = Database::getInstance(); 
$deleteInfo = $conn->db->prepare("DELETE FROM systemadmin WHERE adminId = :adminId");
$deleteInfo->bindValue(":adminId",$adminId);
$deleteInfo->execute();
return "Admin deleted successfully";
}

public static function deleteSession($genStdBatchId){
$conn = Database::getInstance(); 
$deleteInfo = $conn->db->prepare("DELETE FROM genstudentbatches WHERE genStdBatchId = :genStdBatchId");
$deleteInfo->bindValue(":genStdBatchId",$genStdBatchId);
$deleteInfo->execute();
return "Batch/Session deleted successfully";
}		 
public static function deleteSemester($SchoolTermId){
$conn = Database::getInstance(); 
$deleteInfo = $conn->db->prepare("DELETE FROM beedyschoolterm WHERE SchoolTermId = :SchoolTermId");
$deleteInfo->bindValue(":SchoolTermId",$SchoolTermId);
$deleteInfo->execute();
return "Term/Semester deleted successfully";
}		 
public static function deleteStudent($stdAddNum){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedystudentprofile WHERE stdAddNum = :stdAddNum");
$deleteInfo->bindValue(":stdAddNum",$stdAddNum);
$deleteInfo->execute();
return "Student deleted successfully";
}
public static function deleteStdGroup($groupId){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedystdgroup WHERE groupId = :groupId");
$deleteInfo->bindValue(":groupId",$groupId);
$deleteInfo->execute();
return "Group deleted successfully";
}	

public static function deleteFrmClass($classId){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedyclasslist WHERE classId = :classId");
$deleteInfo->bindValue(":classId",$classId);
$deleteInfo->execute();
return "Class deleted successfully";
}	

public static function deleteSubjectList($subId){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedysubjectlist WHERE subId = :subId");
$deleteInfo->bindValue(":subId",$subId);
$deleteInfo->execute();
return "Subject deleted successfully";
}	

public static function deleteExamType($examTypeId){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedyexamtype WHERE examTypeId = :examTypeId");
$deleteInfo->bindValue(":examTypeId",$examTypeId);
$deleteInfo->execute();
return "Exam Type deleted successfully";
}	



public static function systemwindow(){ 
$conn = Database::getInstance(); 
 $A=0; $B=0; $C=0; $D=0;
   $mode = $_POST['mode'];
   if($mode=="Time-Based"){
   $days = $_POST['days'];
   if($days=="0008"): $D=0; elseif($days =="0016"): $C=1; $D=6;
   elseif($days=="0034"): $C=3; $D=4; elseif($days=="0064"): $C=6; $D=4;
   elseif($days=="0080"): $C=8;   elseif($days=="0104"): $B=1; $D=8; 
   endif;
 }
 else 
 { 
  $A=mt_rand(7, 9); $B=mt_rand(5, 9);  $C= mt_rand(5, 9);  $D=mt_rand(5, 9); 
 
 }
  
  $charFormat = self::NewGuid();  
	$id = 1;
 $c1 = substr_replace($charFormat,$A,0,1); 
 
 $c2 = substr_replace($c1,$B,5,1); 
 
  $c3 = substr_replace($c2,$C,10,1);  
  
 $c4 = substr_replace($c3,$D,15,1);  
 
 $Guid= self::NewGuidR($c4); 
 
$b= self::beedy($Guid); //decode
  $foruser =  self::NewGuidR( self::beedy($b));
  $system= self::NewGuidR( self::beedy($foruser)); //to be confirmed


$updateClass = $conn->db->prepare("UPDATE systemwindow SET code1=:code1, code2=:code2, codeKey=:codeKey, active=:active WHERE id=:id ");
$updateClass->bindParam(':code1', $foruser, PDO::PARAM_STR);  
$updateClass->bindParam(':code2', $system, PDO::PARAM_STR);  
$updateClass->bindParam(':codeKey', $Guid, PDO::PARAM_STR);  
$updateClass->bindParam(':active', $mode, PDO::PARAM_STR);  
$updateClass->bindParam(':id', $id, PDO::PARAM_STR);  
if($updateClass->execute()){return 1;} else {return 0;} 
   
}

public static function activateKey(){
$conn = Database::getInstance();
  
$systemwindow =Database::loadTbl('systemwindow');
foreach($systemwindow as $det):
 //while($det = $systemwindow->fetch(PDO::FETCH_ASSOC)){
$code1 = $det['code1'];
$code2 = $det['code2'];
$codeKey = $det['codekey'];
$active = $det['active'];  
endforeach;
//}
$coder = self::charFormat($code2);
   $id = 1;
 $license = self::charFormat($_POST['name']);
 
 if($coder === $license): 
 $bd ="beedy"; 
$updateClass = $conn->db->prepare("UPDATE systemwindow SET code1=:code1, code2=:code2, codeKey=:codeKey, active=:active WHERE id=:id ");
$updateClass->bindParam(':code1', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':code2', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':codeKey', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':active', $bd, PDO::PARAM_STR);  
$updateClass->bindParam(':id', $id, PDO::PARAM_STR);  
if($updateClass->execute()){
$Guid = self::charFormat($codeKey);

$a= substr($Guid, 0,1);
$b= substr($Guid, 5,1);
$c= substr($Guid, 10,1);
$d= substr($Guid, 15,1);

 				
				$days=$a.$b.$c.$d;
	$from=date('Y-m-d');
	$dateFrom=date('Y-m-d');
$dateTo= date('Y-m-d', strtotime($dateFrom. '+'. $days.' days'));
	if($days >= 5000): $active="Life"; $dateTo="2099-12-12";  endif;		
				
$updateKey = $conn->db->prepare("UPDATE beedysystem SET code1=:code1, code2=:code2, codeKey=:codeKey, dateFrom=:dateFrom,
 dateTo=:dateTo, active=:active WHERE id=:id ");
$updateKey->bindParam(':code1', $code1, PDO::PARAM_STR);  
$updateKey->bindParam(':code2', $code2, PDO::PARAM_STR);  
$updateKey->bindParam(':codeKey', $codeKey, PDO::PARAM_STR);  
$updateKey->bindParam(':dateFrom', $from, PDO::PARAM_STR);  
$updateKey->bindParam(':dateTo', $dateTo, PDO::PARAM_STR);  
$updateKey->bindParam(':active', $active, PDO::PARAM_STR);  
$updateKey->bindParam(':id', $id, PDO::PARAM_STR); 
if($updateKey->execute()): return 1; else: return 0;
endif;
} else {return 0;} 
  
else: return 2; endif;
 
}



}
?>