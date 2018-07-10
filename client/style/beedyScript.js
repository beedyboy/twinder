/*
* Author : Akinniyi Bolade
* Email : boladebode@gmail.com
* Website : http://www.cedarcliffng.net
* Subject : Using Ajax with PHP/MySQL
*/

 
 
  // modifyStdGroup function
function modifyQuestion(bankId, qid, num) {
	
	var url = 'templates/edit_question.php';
	var method = 'POST'; 
	var params = 'bankId='+ bankId;
	 params += '&qid='+ qid;
	params += '&num='+ num;
 	var container_id = 'editAddQst' ;
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