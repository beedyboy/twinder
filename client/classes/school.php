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

public static function loadBankGroup(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroup");
$select->execute();
return $select->fetchAll();
} 

public static function loadStudentBatches(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM genstudentbatches");
$select->execute();
return $select->fetchAll();
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

 ##################LOADER##########################
public static function CreateLoaderGrp(){
$conn = Database::getInstance();
if($existCheck = self::existOne('beedygroup', 'bankName', $_POST['bankName'])==0)
{
	//$time = time();
$stmt = $conn->db->prepare("INSERT INTO beedygroup (bankName) VALUES (:bankName)");
$stmt->bindParam(':bankName', $_POST['bankName'], PDO::PARAM_STR); 
if ($stmt->execute()): 
return 1; 	else: return 0;	endif; } else {return 2;}
}

public static function addNewBankCourse(){
$conn = Database::getInstance();
if($existCheck = self::existTwo('beedygroupsub', 'exambankId', 'subId', $_POST['exambankId'], $_POST['subId'] )==0)
{
$stmt = $conn->db->prepare("INSERT INTO beedygroupsub (exambankId, subId, Exam_Instruction, Exam_Duration, Exam_Date)
 VALUES (:exambankId, :subId, :Exam_Instruction, :Exam_Duration, :Exam_Date)");
$stmt->bindParam(':exambankId', $_POST['exambankId']);
$stmt->bindParam(':subId', $_POST['subId'] );
$stmt->bindParam(':Exam_Instruction', $_POST['instruction'] );
$stmt->bindParam(':Exam_Duration', $_POST['duration'] );
$stmt->bindParam(':Exam_Date', $_POST['date'] );
if ($stmt->execute()): 
return 1; 	else: return 0;	endif; } else {return 2;}
}

//delete functins
	 	
 
public static function deleteStdGroup($exambankId){
$conn = Database::getInstance();
$deleteInfo = $conn->db->prepare("DELETE FROM beedystdgroup WHERE exambankId = :exambankId");
$deleteInfo->bindValue(":exambankId",$exambankId);
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


}
?>