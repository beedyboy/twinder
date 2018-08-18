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
if($row['level'] == 1):
$fetchInfo = $conn->db->prepare("SELECT * FROM systemadmin WHERE adminId = ?");
$fetchInfo->execute( array($row['adminId']) );
$info = $fetchInfo->fetch();
$_SESSION['cbt']['page'] = "logged";	
$_SESSION['cbt']['uid'] = $row['uid']; 
$_SESSION['cbt']['username'] = $row['username'];
$_SESSION['cbt']['level'] = $row['level'];
$_SESSION['cbt']['firstname'] = $info['firstName'];
$_SESSION['cbt']['lastname'] = $info['lastName'];
$_SESSION['cbt']['adminId'] = $info['adminId'];
$_SESSION['cbt']['area_privilege'] = $info['area_privilege'];
$_SESSION['cbt']['image'] = $info['image'];
echo $feedbck =  1;
else:
echo $feedbck = 3;
endif;
} 
else {
echo $feedbck;
}	
}
if($_POST['action'] == "CreateLoaderGrp"){echo $GetSchool->CreateLoaderGrp($_POST);} 
if($_POST['action'] == "addNewBankCourse"){echo $GetExam->addNewBankCourse($_POST);}
if($_POST['action'] == "AddComplete"){ echo $GetExam->AddComplete($_POST, $_FILES);}
if($_POST['action'] == "AddLogical"){echo $GetExam->AddLogical($_POST, $_FILES);}
if($_POST['action'] == "normal"){echo $GetExam->updateQuestion($_POST, $_FILES);}
if($_POST['action'] == "applyCompleteform"){echo $GetExam->updateQuestion($_POST, $_FILES);}
if($_POST['action'] == "applyLogicalform"){echo $GetExam->updateLogical($_POST, $_FILES);}
//all ends here;
}
?>