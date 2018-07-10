<?php
spl_autoload_register(function ($class_name){
$file_name =  "../classes/" . $class_name . '.php';
if(file_exists($file_name)){
require $file_name;
}
});
ob_start();
session_start();
$GetSession  = new my_Session();
$GetDatabase  = new Database();
$GetSchool  = new school(); 
$GetStudent  = new student();
$GetExam  = new Examination();
?>