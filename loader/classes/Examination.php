<?php
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
public static function CreateLoaderGrp(){ //bank group;
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

 
public static function AddComplete($POST, $FILES){
$conn = Database::getInstance();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'bank/');
}
else{
	$image = $File_Name;
} 
 $query = $conn->db->prepare("INSERT INTO beedy_question_bank (bankId, Exam_Question, Exam_Question_Logo, Exam_Option_A, Exam_Option_B,
 Exam_Option_C, Exam_Option_D, Exam_Answer) 
 VALUES (:bankId, :question, :Exam_Question_Logo, :optionA, :optionB, :optionC, :optionD, :options)");
	$query->bindParam(':bankId', $POST['bankId'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR);
	$query->bindParam(':Exam_Question_Logo',  $image , PDO::PARAM_STR);
	$query->bindParam(':optionA', $POST['optionA'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['optionB'], PDO::PARAM_STR);
	$query->bindParam(':optionC', $POST['optionC'], PDO::PARAM_STR);
	$query->bindParam(':optionD', $POST['optionD'], PDO::PARAM_STR);
	$query->bindParam(':options', $POST['options'], PDO::PARAM_STR); 
 
if ($query->execute()): 
return 1; 	else: return 0;	endif; 
}
public static function AddLogical($POST, $FILES){
$conn = Database::getInstance();
$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'bank/');
}
else{
	$image = $File_Name;
} 
 $query = $conn->db->prepare("INSERT INTO beedy_question_bank (bankId, Exam_Question, Exam_Question_Logo, Exam_Option_A, Exam_Option_B,
 Exam_Answer) 
 VALUES (:bankId, :question, :Exam_Question_Logo, :optionA, :optionB, :options)");
	$query->bindParam(':bankId', $POST['bankId'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR);
	$query->bindParam(':Exam_Question_Logo',  $image , PDO::PARAM_STR);
	$query->bindParam(':optionA', $POST['Logical_A'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['Logical_B'], PDO::PARAM_STR);
	 $query->bindParam(':options', $POST['Logical_options'], PDO::PARAM_STR); 
 
if ($query->execute()): 
return 1; 	else: return 0;	endif; 
}

public static function updateQuestion($POST, $FILES){
	$conn = Database::getInstance();
	$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'bank/');
 
$query = $conn->db->prepare("UPDATE beedy_question_bank SET Exam_Question=:question, Exam_Question_Logo=:Exam_Question_Logo, Exam_Option_A=:optionA, Exam_Option_B=:optionB, 
Exam_Option_C=:optionC, Exam_Option_D=:optionD, Exam_Answer=:options WHERE Question_Id=:Question_Id");
$query->bindParam(':Question_Id', $POST['questionno'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR);
	$query->bindParam(':Exam_Question_Logo',  $image , PDO::PARAM_STR);
	$query->bindParam(':optionA', $POST['optionA'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['optionB'], PDO::PARAM_STR);
	$query->bindParam(':optionC', $POST['optionC'], PDO::PARAM_STR);
	$query->bindParam(':optionD', $POST['optionD'], PDO::PARAM_STR);
	$query->bindParam(':options', $POST['options'], PDO::PARAM_STR); 
 if($query->execute()) {return 1;} else {return 0;} 
}
else{

$query = $conn->db->prepare("UPDATE beedy_question_bank SET Exam_Question=:question, Exam_Option_A=:optionA, Exam_Option_B=:optionB, 
Exam_Option_C=:optionC, Exam_Option_D=:optionD, Exam_Answer=:options WHERE Question_Id=:Question_Id");
$query->bindParam(':Question_Id', $POST['questionno'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR); 
	$query->bindParam(':optionA', $POST['optionA'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['optionB'], PDO::PARAM_STR);
	$query->bindParam(':optionC', $POST['optionC'], PDO::PARAM_STR);
	$query->bindParam(':optionD', $POST['optionD'], PDO::PARAM_STR);
	$query->bindParam(':options', $POST['options'], PDO::PARAM_STR); 
 if($query->execute()) {return 1;} else {return 0;} 
}
 } 
public static function updateLogical($POST, $FILES){
	$conn = Database::getInstance();
	$barcode = substr(number_format(time() * rand(),0,'',''),0,13);
$File_Name  = strtolower($FILES['photo']['name']);
$empty =NULL;
if($File_Name!="")
{
 $image = self::uploadImage($FILES,$barcode,'bank/');
 $query = $conn->db->prepare("UPDATE beedy_question_bank SET Exam_Question=:question, Exam_Question_Logo=:Exam_Question_Logo, Exam_Option_A=:optionA, Exam_Option_B=:optionB, 
Exam_Option_C=:optionC, Exam_Option_D=:optionD, Exam_Answer=:options WHERE Question_Id=:Question_Id");
$query->bindParam(':Question_Id', $POST['questionno'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR);
	$query->bindParam(':Exam_Question_Logo',  $image , PDO::PARAM_STR);
	$query->bindParam(':optionA', $POST['Logical_A'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['Logical_B'], PDO::PARAM_STR);
	$query->bindParam(':optionC', $$empty, PDO::PARAM_STR);
	$query->bindParam(':optionD', NULL, PDO::PARAM_STR);
	$query->bindParam(':options', $POST['options'], PDO::PARAM_STR); 
 if($query->execute()) {return 1;} else {return 0;} 
}
else{
	$image = $File_Name;$query = $conn->db->prepare("UPDATE beedy_question_bank SET Exam_Question=:question, Exam_Option_A=:optionA, Exam_Option_B=:optionB, 
Exam_Option_C=:optionC, Exam_Option_D=:optionD, Exam_Answer=:options WHERE Question_Id=:Question_Id");
$query->bindParam(':Question_Id', $POST['questionno'], PDO::PARAM_INT);
	$query->bindParam(':question', $POST['question'], PDO::PARAM_STR); 
	$query->bindParam(':optionA', $POST['Logical_A'], PDO::PARAM_STR);
	$query->bindParam(':optionB', $POST['Logical_B'], PDO::PARAM_STR);
	$query->bindParam(':optionC', $empty, PDO::PARAM_STR);
	$query->bindParam(':optionD', $empty, PDO::PARAM_STR);
	$query->bindParam(':options', $POST['options'], PDO::PARAM_STR); 
 if($query->execute()) {return 1;} else {return 0;} 
}

 } 
  
public static function updateBnkGroup($bankName,$exambankId){
	$conn = Database::getInstance();
$updateClass = $conn->db->prepare("UPDATE beedygroup SET  bankName=:bankName  WHERE exambankId=:exambankId ");
$updateClass->bindParam(':bankName', $bankName);
$updateClass->bindParam(':exambankId', $exambankId);
 if($updateClass->execute()) {return "Modified successfully!";} else {return "Error:: Update failed";} 
 } 
 
public static function updateExamSubGrp($bankId,$Exam_Instruction,$Exam_Duration,$Exam_Date,$mark,$getface,$showresult,$no_ques,$Active){
	$conn = Database::getInstance();
 $query = $conn->db->prepare("UPDATE beedygroupsub SET Exam_Date=:Exam_Date, Exam_Instruction=:Exam_Instruction, 
 Exam_Duration=:Exam_Duration, Total_Question=:no_ques, Mark=:mark, faceId=:getface, Show_Result=:showresult, Active=:Active WHERE bankId=:bankId ");

	$query->bindParam(':mark', $mark, PDO::PARAM_STR);
	$query->bindParam(':Exam_Date', $Exam_Date, PDO::PARAM_STR);
	$query->bindParam(':Exam_Instruction', $Exam_Instruction, PDO::PARAM_STR);
	$query->bindParam(':Exam_Duration', $Exam_Duration, PDO::PARAM_STR);
	$query->bindParam(':showresult', $showresult, PDO::PARAM_STR);
	$query->bindParam(':getface', $getface, PDO::PARAM_INT);
	$query->bindParam(':no_ques', $no_ques, PDO::PARAM_INT);
	$query->bindParam(':Active', $Active, PDO::PARAM_STR);
	$query->bindParam(':bankId', $bankId, PDO::PARAM_INT);
	
	 
 if($query->execute()) {return "Examination settings successful";} else {return "Examination settings  was not successful... please try again later";} 
 } 

public static function deleteteBnkGroup($exambankId){
$conn = Database::getInstance(); 
$deleteInfo = $conn->db->prepare("DELETE FROM beedygroup WHERE exambankId = :exambankId");
$deleteInfo->bindValue(":exambankId",$exambankId);
$deleteInfo->execute();
return 1;
}

public static function deleteteCourseFile($bankId){
$conn = Database::getInstance(); 
$deleteInfo = $conn->db->prepare("DELETE FROM beedygroupsub WHERE bankId = :bankId");
$deleteInfo->bindValue(":bankId",$bankId);
$deleteInfo->execute();
return 1;
}



}