<?php
 
	 	 spl_autoload_register(function ($class_name){
		$file_name =  "classes/" . $class_name . '.php';
		if(file_exists($file_name)){
			require $file_name;
		}
	});
	ob_start();
	session_start();
$GetDatabase  = new Database();
$System  = new System();
$GetSchool  = new school();
$GetStudent  = new student();
$GetBeedyTips  = new BeedyTips();

$GetExam  = new Examination();

$conn = $GetDatabase->getInstance();
date_default_timezone_set("Etc/GMT-8");
if(isset($_GET['otherAction'])){ 

if($_GET['otherAction'] == "editGroup"){echo $GetExam->updateBnkGroup($_REQUEST['bankName'],$_REQUEST['exambankId']);} 
if($_GET['otherAction'] == "deleteGroup"){echo $GetExam->deleteteBnkGroup($_REQUEST['exambankId']);} 
if($_GET['otherAction'] == "deleteBankGroup"){echo $GetExam->deleteteCourseFile($_REQUEST['bankId']);} 


}

if(isset($_POST['action'])){ 

 
//started here  
if($_POST['action'] == "login"){ $feedbck = 0; $email =  $username = $_POST['username']; $password = md5($_POST['password']);
$stmt = $conn->db->prepare("SELECT * FROM login WHERE (username = ? || email = ?) AND password = ? ");
$stmt->execute( array($username,$email,$password) );
$row = $stmt->fetch(); 
if(!empty($row)){

$feedbck =  1;
if($row['level'] == 3):
$fetchInfo = $conn->db->prepare("SELECT * FROM beedyStudentProfile WHERE stdAddNum = ?");
$fetchInfo->execute( array($row['stdAddNum']) );
$info = $fetchInfo->fetch();
$_SESSION['cbt']['page'] = "logged";	
$_SESSION['cbt']['uid'] = $row['uid']; 
$_SESSION['cbt']['username'] = $row['username'];
$_SESSION['cbt']['classId'] = $info['classId'];
$_SESSION['cbt']['surname'] = $info['stdSurname'];
$_SESSION['cbt']['firstname'] = $info['stdFirstName'];
$_SESSION['cbt']['middlename'] = $info['stdMiddleName'];
$_SESSION['cbt']['stdAddNum'] = $info['stdAddNum'];
$_SESSION['cbt']['image'] = $info['stdPicture'];
echo $feedbck =  1;
else:
 echo $feedbck = 3;
  endif;
} 
else {
echo $feedbck;
}	
}

 
if($_POST['action'] == "applyCompleteform"){echo $GetExam->updateQuestion($_POST, $_FILES);}
if($_POST['action'] == "applyLogicalform"){echo $GetExam->updateLogical($_POST, $_FILES);}
  //all ends here;
}
?>