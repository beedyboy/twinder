/*
* Author : Akinniyi Bolade
* Email : boladebode@gmail.com
* Website : http://www.cedarcliffng.net
* Subject : Using Ajax with PHP/MySQL
*/


//addClass
function addExamType()
{
var url = 'templates/addExamType.php';
var method = 'POST';
var params = '';
var container_id = 'activate';
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}

function modifyExamType(change) {
// initialisation
var url = 'templates/modifyExamType.php';
var method = 'POST';
var params = 'examTypeId='+change;
var container_id = 'activate' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}
//addClass
function addAdmin()
{
var url = 'templates/addNewAdmin.php';
var method = 'POST';
var params = '';
var container_id = 'activate';
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}

function modifyAdmin(change) {
// initialisation
var url = 'templates/modifyAdmin.php';
var method = 'POST';
var params = 'adminId='+change;
var container_id = 'activate' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}

function modifyPermission(change) {
// initialisation
var url = 'templates/modifyPermission.php';
var method = 'POST';
var params = 'permitId='+change;
var container_id = 'activate' ;
var loading_text = '<img src="images/ajax-loader.gif">';
// call ajax function
ajax (url, method, params, container_id, loading_text);
}

//addClass
function addClass() 
{
	var url = 'templates/addClass.php';
	var method = 'POST';
	var params = '';
	var container_id = 'activate';
	var loading_text = '<img src="images/loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
 
}


function modifyClass(change) {
	// initialisation
 var url = 'templates/modifyClass.php';
	var method = 'POST';
	var params = 'ClassId='+change;
 	var container_id = 'activate' ;
	var loading_text = '<img src="images/ajax-loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
	}
 
//addSession
function addSession() 
{
	var url = 'templates/addSession.php';
	var method = 'POST';
	var params = '';
	var container_id = 'activate';
	var loading_text = '<img src="images/loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
 
}



 // modifySession function
function modifySession(change) {
	var url = 'templates/modifySession.php';
	var method = 'POST';
	var params = 'genStdBatchId='+change;
 	var container_id = 'activate' ;
	var loading_text = '<img src="images/ajax-loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
}

//addSemester
function addSemester() 
{
	var url = 'templates/addTerm.php';
	var method = 'POST';
	var params = '';
	var container_id = 'activate';
	var loading_text = '<img src="images/loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
}
// modifySemester function
function modifySemester(change) {
	var url = 'templates/modifyTerm.php';
	var method = 'POST';
	var params = 'SchoolTermId='+change;
 	var container_id = 'activate' ;
	var loading_text = '<img src="images/ajax-loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
}

// modifySubject function
function modifySubject(change) {
	var url = 'templates/modifySubject.php';
	var method = 'POST';
	var params = 'subId='+change;
 	var container_id = 'activate' ;
	var loading_text = '<img src="images/ajax-loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
}


 //addCourse
function addSubject()
{
	var url = 'templates/addSubject.php';
	var method = 'POST';
	var params = '';
	var container_id = 'activate';
	var loading_text = '<img src="images/loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
 }
 
 
 //addFinCat
function addStdGroup()
{
	var url = 'templates/addStdGroup.php';
	var method = 'POST';
	var params = '';
	var container_id = 'activate';
	var loading_text = '<img src="images/loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
 }

  // modifyStdGroup function
function modifyStdGroup(change) {
	var url = 'templates/modifyStdGroup.php';
	var method = 'POST';
	var params = 'groupId='+change;
 	var container_id = 'activate' ;
	var loading_text = '<img src="images/ajax-loader.gif">';
	// call ajax function
	ajax (url, method, params, container_id, loading_text);
}
// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
		    alert("Not supported!");
		}
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
							       document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
							       document.getElementById(container_id).innerHTML = loading_text;
							   }
						   	}
	xhr.open(method, url, true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send(params);
}