<?php 
class Database 
{ 
public $db; 
private static $dsn = 'mysql:host=localhost:3306;dbname=twinders'; 
private static $user= 'root'; 
private static $pass= ''; 
public static $instance; 
public function __construct() 
{ 
$this->db = new PDO(self::$dsn,self::$user,self::$pass); 
} 

public static function getInstance() 
{ 
if(!isset(self::$instance)) 
{ 
$object= __CLASS__; 
self::$instance= new $object; 
} 
return self::$instance; 
} 
 

public static function existOne($tbl, $col, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? Limit 1");
$select->execute(array($value));
return $select->rowCount();
} 
public static function existTwo($tbl, $col, $col2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? Limit 1");
$select->execute(array($value, $value2));
return $select->rowCount();
} 
public static function existThree($tbl, $col, $col2, $col3, $value, $value2, $value3){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3));
return $select->rowCount();
} 

public static function existFour($tbl, $col, $col2, $col3, $col4, $value, $value2, $value3, $value4){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ?  AND $col4 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3, $value4));
return $select->rowCount();
} 

public static function existFive($tbl, $col, $col2, $col3, $col4, $value, $value2, $value3, $value4, $schId){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE schId LIKE ? AND $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ?  AND $col4 LIKE ? Limit 1");
$select->execute(array($schId, $value, $value2, $value3, $value4));
return $select->rowCount();
} 
public static function loadTbl($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select->fetchAll();
}
public static function loadTblCond($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select->fetchAll();
}
public static function loadTblCond1($tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ?  ");
$select->execute(array($value));
return $select;
}

public static function loadTblCond2($tbl, $cond, $cond2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ? AND $cond2 LIKE ?  ");
$select->execute(array($value, $value2));
return $select->fetchAll();
}
public static function loadDistinct($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl");
$select->execute();
return $select->fetchAll();
}
public static function loadDistinctCond1($col, $tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $cond LIKE ? ");
$select->execute(array($value));
return $select->fetchAll();
}

public static function getName($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? ");
$select->execute(array($id));
return $select->fetchColumn($return); 
}

public static function getName2($tbl, $col, $col2, $id, $id2, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? ");
$select->execute(array($id, $id2));
return $select->fetchColumn($return); 
}

public static function getField($tbl, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select->fetchColumn($return); 
}
public static function addLogin($userType, $userValue,  $email, $username, $password, $firstname, $lastname, $level){
$conn = Database::getInstance();
$addToLogin = $conn->db->prepare("INSERT INTO login ( $userType, email, username, password, firstname, lastname, level) VALUES (?,?,?,?,?,?,?)");
$addToLogin->execute(array($userValue, $email, $username, md5($password), $firstname, $lastname, $level));
}
 
public static function updateLogin($firstName,$lastName,$email,$username,$pass,$cond, $val){
$conn = Database::getInstance();
$password = md5($pass);
$updateClass = $conn->db->prepare("UPDATE login SET firstName=:firstName,lastName=:lastName, email=:email, username=:username,password=:password WHERE $cond=$val "); 
if($updateClass->execute(array
(':firstName'=>$firstName,':lastName'=>$lastName,':email'=>$email,':username'=>$username,':password'=>$password)
)){return 1;} else {return 0;} 
} 
  
public static function updateStdLogin($email,$username,$pass, $val){
$conn = Database::getInstance();
$password = md5($pass);
$updateClass = $conn->db->prepare("UPDATE login SET email=:email, username=:username,password=:password WHERE stdAddNum=$val "); 
if($updateClass->execute(array(':email'=>$email,':username'=>$username,':password'=>$password)
)){return 1;} else {return 0;} 
} 
 
public static function uploadImage($FILES,$imagename, $path){
$UploadDirectory	= 'uploads/'.$path; //specify upload directory ends with / (slash)
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
if(move_uploaded_file($FILES['photo']['tmp_name'], '../'.$UploadDirectory.$NewFileName )):
 return $location;  
else: return $location; endif;
}
else{ return $location;}
}
 
} 
?>