<?php
@$pid = $_GET['pid'];
@$sub = $_GET['sub'];
if(( $pid=="" || $pid=="16") &&( $sub=="" || $sub=="about/") )
{
if (!isset($pid) || $pid >= count($arr_pages)) {
$pid = 16;
$sub = "about/";
}
}
switch ($sub) {
case "about/": $layout = "about";
break;
default: $layout = "about";
} 
if (!isset($layout)||$layout=="" || !file_exists("templates/" . $layout . ".cbt.php")) {
$layout = "ac";
} 
include( TEMPLATES_PATH . DS . $layout . ".cbt.php");
?>