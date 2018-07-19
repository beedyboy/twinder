<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
 require_once "Database.php";
  
class Examination extends Database{
public function __construct(){
parent::__construct();
} 

public static function loadBankGrp($exambankId){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroupsub WHERE exambankId=:exambankId");
$select->execute(array(':exambankId'=>$exambankId));
return $select->fetchAll();
}


  ##################LOADER########################## 
  
public static function loadStudentCourses($classId){ 
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedysubjectlist WHERE classId=:nn ");
$select->execute(array(':nn'=>$classId));
return $select->fetchAll();
}
  
public static function loadExamList($subId){
	$today = date("Y-m-d");
	$Active='Yes';
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroupsub WHERE subId=:sub AND Exam_DATE=:nn And Active=:Active");
$select->execute(array(':sub'=>$subId,':nn'=>$today, ':Active'=>$Active));
return $select->fetchAll();
}
  
public static function loadExamData($subId, $col){
	$today = date("Y-m-d");
	$Active='Yes';
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedygroupsub WHERE subId=:sub AND Exam_DATE=:nn And Active=:Active");
$select->execute(array(':sub'=>$subId,':nn'=>$today, ':Active'=>$Active));

return $select->fetchColumn($col); 
}

public static function process($stdAddNum,$bankId)
{	
	return $done= self::DoneExam($stdAddNum,$bankId);
	  
}

public static function DoneExam($stdAddNum,$bankId){
	
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedy_exam_result WHERE stdAddNum=:stdAddNum AND bankId=:bankId");
$select->execute(array(':stdAddNum'=>$stdAddNum,':bankId'=>$bankId));
return $select->rowCount();
}

public static function getQuestion($index){ 
$conn = Database::getInstance();
$result = $conn->db->prepare("SELECT * FROM beedy_question_bank WHERE Question_Id=:queid Limit 0,1");
$result->execute(array(':queid'=>$index)); 
$member1 =$result->fetch(PDO::FETCH_LAZY); 
return $member1;
}


public static function loadIntQuestion($bankId,$TotalQuestion){ 
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedy_question_bank WHERE bankId=:bankId ORDER BY Rand() Limit $TotalQuestion ");
$select->execute(array(':bankId'=>$bankId));
return $select;
}


public static function loadIntQuestion2($bankId,$TotalQuestion){
	 
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedy_question_bank WHERE bankId=:bankId Limit 0, $TotalQuestion ");
$select->execute(array(':bankId'=>$bankId));
return $select;
}


public static function loadintQuestionModeFace($beedy_bankId){ 
$conn = Database::getInstance();
$result=$conn->db->prepare("SELECT * FROM beedy_question_bank WHERE bankId=:bankId");
 	$result->execute(array(':bankId'=>$beedy_bankId)); 
return $result;
}

public static function loadintQuestionModeFace2($beedy_bankId){ 
$conn = Database::getInstance();
$result=$conn->db->prepare("SELECT * FROM beedy_question_bank WHERE bankId=:bankId");
 	$result->execute(array(':bankId'=>$beedy_bankId)); 
return $result;
}


public static function markExam($Question_Id){
	 
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedy_question_bank WHERE Question_Id=:Question_Id");
$select->execute(array(':Question_Id'=>$Question_Id));
return $select->fetchColumn(7);
}


public static function saveResult($bankId,$stdAddNum,$genStdBatchId, $SchoolTermId, $Score,$Percentage, $today, $questionGiven, $question, $answer){
$conn = Database::getInstance();
$stmt = $conn->db->prepare("INSERT INTO beedy_exam_result (bankId, stdAddNum, genStdBatchId, SchoolTermId, Score, Percentage, Date, questionGiven, question, answer) 
 VALUES (:bankId, :stdAddNum, :genStdBatchId, :SchoolTermId, :Score, :Percentage, :Datedate, :questionGiven, :question, :answer)");
$stmt->bindParam(':bankId', $bankId); 
$stmt->bindParam(':stdAddNum', $stdAddNum );
$stmt->bindParam(':genStdBatchId', $genStdBatchId );
$stmt->bindParam(':SchoolTermId', $SchoolTermId );
$stmt->bindParam(':Score', $Score );
$stmt->bindParam(':Percentage', $Percentage );
$stmt->bindParam(':Datedate', $today );
$stmt->bindParam(':questionGiven', $questionGiven );
$stmt->bindParam(':question', $question );
$stmt->bindParam(':answer', $answer );
if ($stmt->execute()): 
return 1; 	else: return 0;	endif;   
}



}