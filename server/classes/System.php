<?php
 require_once "Database.php";
  
class System extends Database{
public function __construct(){
parent::__construct();
} 


public static function existOne($tbl, $col, $value){
$conn = self::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? Limit 1");
$select->execute(array($value));
return $select->rowCount();
} 
public static function existTwo($tbl, $col, $col2, $value, $value2){
$conn = self::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? Limit 1");
$select->execute(array($value, $value2));
return $select->rowCount();
} 

public static function existTwoOR($tbl, $col, $col2, $value, $value2){
$conn = self::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? OR $col2 LIKE ? Limit 1");
$select->execute(array($value, $value2));
return $select->rowCount();
} 
public static function existThree($tbl, $col, $col2, $col3, $value, $value2, $value3){
$conn = self::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3));
return $select->rowCount();
} 
public static function existFour($tbl, $col, $col2, $col3, $col4, $value, $value2, $value3, $value4){
$conn = self::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? AND $col2 LIKE ? AND $col3 LIKE ? AND $col4 LIKE ? Limit 1");
$select->execute(array($value, $value2, $value3, $value4));
return $select->rowCount();
} 
 
public static function loadSchoolTerm(){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM beedySchoolTerm");
$select->execute();
return $select->fetchAll();
}

public static function loadTable($tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute( );
return $select;
}

public static function getName($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col LIKE ? ");
$select->execute(array($id));
return $select->fetchColumn($return); 
}
 

public function loadTbl($tbl){ 
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


public static function loadTblCond2($tbl, $cond,  $cond2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ? AND $cond2 LIKE ?  ");
$select->execute(array($value, $value2));
return $select->fetchAll();
}



public static function loadTblCond3($tbl, $cond,  $cond2, $value, $value2){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $cond LIKE ? AND $cond2 LIKE ?  ");
$select->execute(array($value, $value2));
return $select->fetchAll();
}

 /**
  *@method     getField()                
  * @return field column
  */ 
 public function getField($tbl, $return){ 
 $select = $conn->db->prepare("SELECT * FROM $tbl");
$select->execute();
return $select->fetchColumn($return); 
}

public static function loadDistinct($col, $tbl){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl ");
$select->execute();
return $select->fetchAll();
}
public static function loadDistinctCond1($col, $tbl, $cond, $value){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT DISTINCT $col FROM $tbl WHERE $cond = ? ");
$select->execute(array($value));
return $select->fetchAll();
}

public static function getColById($tbl, $col, $id, $return){
$conn = Database::getInstance();
$select = $conn->db->prepare("SELECT * FROM $tbl WHERE $col = ? Limit 1");
$select->execute(array($id));
return $select->fetchColumn($return);
}
   
public static function addLogin($userType, $userValue, $email, $username, $password, $firstname, $lastname, $level){
$conn = Database::getInstance(); 
$addToLogin = $conn->db->prepare("INSERT INTO login ( $userType, email, username, password, firstname, lastname, level) VALUES (?,?,?,?,?,?,?)");
$addToLogin->execute(array($userValue, $email, $username,md5($password),$firstname, $lastname,$level));
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
 
 
public static function formatMoney($number, $fractional=false) {
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
	  return '&#8358;'. $number.'k';
}
 

 public static function createRandomPassword() {
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					srand((double)microtime()*1000000);
					$i = 0;
					$pass = '' ;
					while ($i <= 3) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$pass = $pass . $tmp;
						$i++;
					}
					return $pass;
				}
				
public static function numberletter() {
					$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
					srand((double)microtime()*1000000);
					$i = 0;
					$passii = '' ;
					while ($i <= 2) {
						$num = rand() % 33;
						$tmp = substr($chars, $num, 1);
						$passii = $passii . $tmp;
						$i++;
					}
					return $passii;
				}
			

}