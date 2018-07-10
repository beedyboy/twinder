<?php
/***********************************************
**	Used to force download any file by passing the full path of the file for download
**	Use Like 
**	echo ForceDownloadFile("documents/application.pdf");
************************************************/
spl_autoload_register(function ($class_name){
$file_name = INCLUDES_CLASS_PATH . DS. $class_name . '.php';
if(file_exists($file_name)){
require $file_name;
}
});
$arr_scripts = array ('jquery.min.js', 'jquery-ui.js', 'jquery-form.js', 'jquery-1.5.min.js', 'jquery.jgrowl.js',
'bootstrap.min.js','respond.min.js','beedy.js','beedyScript.js');
$arr_css = array ('blue.css','pink.css', 'violet.css');
function beedy_goto($location = NULL)
{
if($location != NULL)
{
header("Location: {$location}");
exit;
}
}
function output_message($message="")
{
if(!empty($message))
{
return "<p class=\"message\"> {$message} </p>";
}
else
{
return "";
}
}
function include_layout_template($path="",$template="")
{
if(($path=="") AND ($template!=NULL)):
include($template);
else:
include($path.$template);
endif;
}
function ForceDownloadFile($filepath) {
$extn = fileextension($filepath);
$flnm = filename($filepath);
$downloadfl = $flnm.".".$extn;
$downloadfl = RemoveDateFromFilename($downloadfl);
$len = @filesize($filepath);
header("Content-type: application/$extn");
header("Content-Disposition: attachment; filename=$downloadfl");
header("Content-Length: $len");
@readfile($filepath);
exit;
}
function getage($birthdate,$lastyear){
$dt1 = substr($birthdate,0,2);
$mon1 = substr($birthdate,3,2);
$yr1 = substr($birthdate,6,4);
$date1 = $dt1.'/'.$mon1.'/'.$yr1;
if($lastyear==""){
$sys_date = date("d/m/Y");
}else{
$sys_date = $lastyear;
}
$dt2 = substr($sys_date,0,2);
$mon2 = substr($sys_date,3,2);
$yr2 = substr($sys_date,6,4);
$date2 = $dt2.'/'.$mon2.'/'.$yr2;
function smoothdate ($year, $month, $day)
{
return sprintf ('%04d', $year) . sprintf ('%02d', $month) . sprintf ('%02d', $day);
}
function date_difference ($first, $second)
{
$month_lengths = array (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$retval = FALSE;
if (    checkdate($first['month'], $first['day'], $first['year']) &&
checkdate($second['month'], $second['day'], $second['year'])
)
{
$start = smoothdate ($first['year'], $first['month'], $first['day']);
$target = smoothdate ($second['year'], $second['month'], $second['day']);
if ($start <= $target)
{
$add_year = 0;
while (smoothdate ($first['year']+ 1, $first['month'], $first['day']) <= $target)
{
$add_year++;
$first['year']++;
}
$add_month = 0;
while (smoothdate ($first['year'], $first['month'] + 1, $first['day']) <= $target)
{
$add_month++;
$first['month']++;
if ($first['month'] > 12)
{
$first['year']++;
$first['month'] = 1;
}
}
$add_day = 0;
while (smoothdate ($first['year'], $first['month'], $first['day'] + 1) <= $target)
{
if (($first['year'] % 100 == 0) && ($first['year'] % 400 == 0))
{
$month_lengths[1] = 29;
}
else
{
if ($first['year'] % 4 == 0)
{
$month_lengths[1] = 29;
}
}
$add_day++;
$first['day']++;
if ($first['day'] > $month_lengths[$first['month'] - 1])
{
$first['month']++;
$first['day'] = 1;
if ($first['month'] > 12)
{
$first['month'] = 1;
}
}
}
$retval = array ('years' => $add_year, 'months' => $add_month, 'days' => $add_day);
}
}
return $retval;
}
$begin = array ('year' => $yr1, 'month' => $mon1, 'day' => $dt1);
$end = array ('year' => $yr2, 'month' => $mon2, 'day' => $dt2);
$foo = date_difference ($begin, $end);
//array_print($foo);
return $foo;
}
function getage123($birthdate){
$dt1 = substr($birthdate,0,2);
$mon1 = substr($birthdate,3,2);
$yr1 = substr($birthdate,6,4);
$date1 = $dt1.'/'.$mon1.'/'.$yr1;
$sys_date = date("d/m/Y");
$dt2 = substr($sys_date,0,2);
$mon2 = substr($sys_date,3,2);
$yr2 = substr($sys_date,6,4);
$date2 = $dt2.'/'.$mon2.'/'.$yr2;
function smoothdate ($year, $month, $day)
{
return sprintf ('%04d', $year) . sprintf ('%02d', $month) . sprintf ('%02d', $day);
}
function date_difference ($first, $second)
{
$month_lengths = array (31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
$retval = FALSE;
if (    checkdate($first['month'], $first['day'], $first['year']) &&
checkdate($second['month'], $second['day'], $second['year'])
)
{
$start = smoothdate ($first['year'], $first['month'], $first['day']);
$target = smoothdate ($second['year'], $second['month'], $second['day']);
if ($start <= $target)
{
$add_year = 0;
while (smoothdate ($first['year']+ 1, $first['month'], $first['day']) <= $target)
{
$add_year++;
$first['year']++;
}
$add_month = 0;
while (smoothdate ($first['year'], $first['month'] + 1, $first['day']) <= $target)
{
$add_month++;
$first['month']++;
if ($first['month'] > 12)
{
$first['year']++;
$first['month'] = 1;
}
}
$add_day = 0;
while (smoothdate ($first['year'], $first['month'], $first['day'] + 1) <= $target)
{
if (($first['year'] % 100 == 0) && ($first['year'] % 400 == 0))
{
$month_lengths[1] = 29;
}
else
{
if ($first['year'] % 4 == 0)
{
$month_lengths[1] = 29;
}
}
$add_day++;
$first['day']++;
if ($first['day'] > $month_lengths[$first['month'] - 1])
{
$first['month']++;
$first['day'] = 1;
if ($first['month'] > 12)
{
$first['month'] = 1;
}
}
}
$retval = array ('years' => $add_year, 'months' => $add_month, 'days' => $add_day);
}
}
return $retval;
}
$begin = array ('year' => $yr1, 'month' => $mon1, 'day' => $dt1);
$end = array ('year' => $yr2, 'month' => $mon2, 'day' => $dt2);
$foo = date_difference ($begin, $end);
//array_print($foo);
}
//==========================
//	File extension
//=====================
function fileextension($filename) { 
$path_info = pathinfo($filename);
return $path_info['extension'];
} 
//===================
//	File name
//==================
function filename($filename) {
$path_info = pathinfo($filename);
return $path_info['filename'];
}
function uploadanyfile($fieldname, $path="", $newname=false, $allowed="", $max_size="") {
if($path=="")
$path = dirname(__FILE__)."/";
if($allowed=="")
$allowed = array('image/gif','image/pjpeg','image/jpeg','image/png');
if($max_size=="")
$max_size = 200000;
$upldfile = "";
if($fieldname!="")
$upldfile = $_FILES[ $fieldname ];
if($newname) {
$newname = filename($upldfile['name'])."_".date("YmdHis").".".fileextension($upldfile['name']);
}
if(isset($upldfile) && $upldfile!="")
{ 
if(is_uploaded_file($upldfile['tmp_name'])) 
{ 
if($upldfile['size'] < $max_size) 
{ 
if(in_array($upldfile['type'], $allowed)) 
{ 
if(!file_exists($path.$newname)) 
{ 
if( move_uploaded_file($upldfile['tmp_name'], $path.$newname)) 
{ 
$returnstr = $newname;
}
else{ 
$html_output = 'Upload failed!<br>'; 
if(!is_writeable($path)) 
{ 
$error = 'The Directory "'.$path.'" must be writeable!'; 
}else{ 
$html_output = 'An unknown error ocurred.';       
} 
}
}else{ 
$error = 'The file already exists.'; 
}
}else{ 
$error = 'Wrong file type provided.';
}
}else{
$error = 'The file is too big.';
}
}else{
$error = 'Some error occured in uploading the file.';
}
}else{
$error = 'No file is found to be uploaded.';
}
if($error!="") {
echo $error;
exit;
} else {
return $returnstr;
}
}
//function to display the images
function displayimage($imgsrc, $thumbsize = "100", $alt = "Image", $title = "Images" ){
if (file_exists($imgsrc)) {
list($width, $height ) = getimagesize($imgsrc);
$imgratio = $width/$height;
if ($imgratio>1) {
$newwidth = $thumbsize;
$newheight = $thumbsize/$imgratio;
}else {
$newheight = $thumbsize;
$newwidth = $thumbsize*$imgratio;
}
return '<img src="' . $imgsrc . '" width="' . $newwidth . '" height="' . $newheight . '" alt="' . $alt . '" border="0" title="' . $title . '" >';
} else {
return '<i>Image</i>';
}
}
#Delete Icon
function deleteIcon(){
return '<img src="images/b_drop.png" border="0" alt="Delete">';
}
function editIcon(){
return '<img src="images/b_edit.png" border="0" alt="Edit">';
}
function viewIcon(){
return '<img src="images/b_browse.png" border="0" alt="View">';
}
?>