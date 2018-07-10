jQuery(document).ready( function($){
	window.clicked = 0;
	var pressed = false; 
    var chars = [];
	
	var desktopView = Backbone.View.extend({
		className: "docrows",
		el: "body",
		events: {
			"submit #login-form": "loginProcess",
			"click #topNav li a": "menuEvent",
			"submit .submitForm": "submitForm",
			"submit #addSubjectTeacher": "addSubjectTeacher",
			"submit #addSubjectTeacherStudent": "addSubjectTeacherStudent",
			"submit #addSubjectTeacherSection": "addSubjectTeacherSection",
			"submit #addStudentToSection": "addStudentToSection",
			"click #removeStudentSubjectTeacher": "removeStudentSubjectTeacher",
			"click #removeSubjectTeacher": "removeSubjectTeacher",
			"click #closeModal": "closeModal",
			"submit #triggerRemoveSubjectTeacher": "triggerRemoveSubjectTeacher",
			"submit #triggerRemoveStudentSubjectTeacher": "triggerRemoveStudentSubjectTeacher",
			"click #deleteTeacher": "deleteTeacher",
			"submit #triggerDeleteTeacher": "triggerDeleteTeacher",
			"change #selectSubjectStudent": "selectSubjectStudent",
			/* "change #selectOfficePlaces": "selectOfficePlaces", */
			"keypress #barcode": "keypressBarcode",
			"click #mainContext": "clickBody",
			"change #loadStudentPerSubject": "loadStudentPerSubject",
			"click #printPage": "printPage",
			"submit #addSectionYearLevel": "addSectionYearLevel",
			"click #deleteYearLevel": "deleteYearLevel",
			"click #removeStudentSection": "removeStudentSection",
			"click #deletePersonnel": "deletePersonnel",
			"click #teacherLogAttendance": "teacherLogAttendance",
			"click #deleteStudent": "deleteStudent",
			"click #deleteSubject": "deleteSubject"
		},
		deleteStudent: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$.post("ajax.php", 
			{ sid: $(_this).attr('sid'), action: 'deleteStudent' },
			function(responseText, responseStatus){
				viewDesktop.loadStudent();
			});	
		},
		deleteSubject: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$.post("ajax.php", 
			{ subjid: $(_this).attr('subjid'), action: 'deleteSubject' },
			function(responseText, responseStatus){
				viewDesktop.loadSubject();
			});	
		},
		teacherLogAttendance: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$.post("ajax.php", 
			{ subjtid: $(_this).attr('subjtid'), action: 'teacherLogAttendance' },
			function(responseText, responseStatus){
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: {tid:$(_this).attr('tid'), subjtid:$(_this).attr('subjtid'), action: 'loadAllTeacherSubjectStudent'},
					success: function(result){
						$("#resultAreaDisplay").removeClass('hide').html(result);
						$("#barcode").focus();
						viewDesktop.loadDatePicker();
					}
				});
			});	
		},
		deletePersonnel: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$.post("ajax.php", 
			{ personnel_id: $(_this).attr('personnelid'), action: 'deletePersonnel' },
			function(responseText, responseStatus){
				viewDesktop.personnel();
			});			
		},
		deleteYearLevel: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$.post("ajax.php", 
			{ yearlevelid: $(_this).attr('yearlevelid'), action: 'delete_yearlevel' },
			function(responseText, responseStatus){
				viewDesktop.yearlevel();
			});
		},
		printPage: function(evt){
			var data = $("#printArea").html();
			var mywindow = window.open('', 'Print Area', 'height=600,width=800');
			mywindow.document.write('<html><head><title>Silay Institue Student Attendance Monitoring System</title>');
			mywindow.document.write('</head><body >');
			mywindow.document.write(data);
			mywindow.document.write('</body></html>');

			mywindow.print();
			mywindow.close();

			return true;
		},
		loadDatePicker: function(){
			
			$("#fromRange").datepicker({
				dateFormat: 'yy-mm-dd',
				numberOfMonths: 1,
			
				onSelect: function(selected) {
			
				$("#toRange").datepicker("option","minDate", selected)
			
				}
		
			});
		
			$("#toRange").datepicker({
				dateFormat: 'yy-mm-dd',
				numberOfMonths: 1,
			
				onSelect: function(selected) {
			
					$("#fromRange").datepicker("option","maxDate", selected)
			
				}
			
			}); 

		},
		loadStudentPerSubject: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var tid = $(_this).attr('tid');
			var subjtid = $(_this).val();
			if($(_this).val() == "" || $(_this).val() == null){
				$("#resultAreaDisplay").addClass('hide').html('');
			} else {
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: {tid:tid, subjtid:subjtid, action: 'loadTeachersStudentBySubject'},
					success: function(result){
						$("#resultAreaDisplay").removeClass('hide').html(result);
						$("#barcode").focus();
					}
				});
			}
		},
		clickBody: function(evt){
			/* if($("#barcode").length > 0){
				$("#barcode").focus();
			} else {
				
			} */
		},
		/* selectOfficePlaces: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			if($(_this).val() == "" || $(_this).val() == null){
				$("#resultAreaDisplay").addClass('hide').html('');
			} else {
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: {action: 'loadPlacesTracking'},
					success: function(result){
						$("#resultAreaDisplay").removeClass('hide').html(result);
						$("#barcode").focus();
					}
				});
			}
		}, */
		keypressBarcode: function(evt){
			var _this = $(evt.target);
			if ( evt.which === 13 ) {
				evt.preventDefault();
				var barcodeid = $(_this).val();
				var type = $(_this).attr('typetrack');
				if(type == "attendance"){
					$.ajax({
						url: window.site_url+'ajax.php',
						type: 'POST',
						data: {action: 'logAttendace',subjtid: $("#subjtid").val(),barcodeid: barcodeid},
						success: function(result){
							$(_this).val('');
							if(result == 1){
								if($("#"+barcodeid).find('.caption div').length > 0){
									$("#"+barcodeid).find('.caption div').html('Present');
								} else {
									$("#"+barcodeid).find('.caption').append('<div class="alert alert-info" style="margin:0;text-align:center;font-family:opensans_semibold_macroman">Present</div>');
								}
							} else if(result == 2){
								if($("#"+barcodeid).find('.caption div').length > 0){
									$("#"+barcodeid).find('.caption div').html('Late');
								} else {
								$("#"+barcodeid).find('.caption').append('<div class="alert alert-warning" style="margin:0;text-align:center;font-family:opensans_semibold_macroman">Late</div>');
								}
							} else if(result == 3){
								if($("#"+barcodeid).find('.caption div').length > 0){
									$("#"+barcodeid).find('.caption div').html('Absent');
								} else {
									$("#"+barcodeid).find('.caption').append('<div class="alert alert-danger" style="margin:0;text-align:center;font-family:opensans_semibold_macroman">Absent</div>');
								}
							} else {
								if($("#"+barcodeid).find('.caption div').length > 0){
									$("#"+barcodeid).find('.caption div').html('The system encountered an error!');
								} else {
									$("#"+barcodeid).find('.caption').append('<div class="alert alert-danger" style="margin:0;text-align:center;font-family:opensans_semibold_macroman">The system encountered an error!</div>');
								}
							}
						}
					});
				} else {
					$.ajax({
						url: window.site_url+'ajax.php',
						type: 'POST',
						data: {action: 'logTracking',barcodeid: barcodeid, type: $("#selectOfficePlaces").val()},
						success: function(result){
							$(_this).val('');
							$("#userDisplay").html(result);
							viewDesktop.loadTracking();
						}
					});
				}
			}
		},
		barcodeTrigger: function(e){
			if (e.which >= 48 && e.which <= 57) {
				chars.push(String.fromCharCode(e.which));
			}
			console.log(e.which + ":" + chars.join("|"));
			if (pressed == false) {
				setTimeout(function(){
					if (chars.length >= 10) {
						var barcode = chars.join("");
						console.log("Barcode Scanned: " + barcode);
						// assign value to some input (or do whatever you want)
						$("#barcode").val(barcode);
					}
					chars = [];
					pressed = false;
				},500);
			}
			pressed = true;
		},
		selectSubjectStudent: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var tid = $(_this).attr('tid');
			var subjtid = $(_this).val();
			if($(_this).val() == "" || $(_this).val() == null){
				$("#resultAreaDisplay").addClass('hide').html('');
			} else {
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: {tid:tid, subjtid:subjtid, action: 'loadAllTeacherSubjectStudent'},
					success: function(result){
						$("#resultAreaDisplay").removeClass('hide').html(result);
						$("#barcode").focus();
						viewDesktop.loadDatePicker();
					}
				});
			}
		},
		deleteTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$('#modalDeleteTeacher').on('show.bs.modal', function () {
				$(this).find('input[name="tid"]').val($(_this).attr('tid'));
			});
			$("#modalDeleteTeacher").modal('show');
		},
		triggerDeleteTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: formData,
				success: function(result){
					if( result == 0 ){
					
					} else {
						viewDesktop.loadTeacher();
					}
					$("#modalDeleteTeacher").modal('hide');
				}
			});
		},
		triggerRemoveStudentSubjectTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: formData,
				success: function(result){
					if( result == 0 ){
					
					} else {
						viewDesktop.checkYearLevelSection($(_this).attr('yearlevelid'),result);
					}
					$("#modalRemoveStudentSubjectTeacher").modal('hide');
				}
			});
		},
		triggerRemoveSubjectTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: formData,
				success: function(result){
					if( result == 0 ){
					
					} else {
						viewDesktop.checkTeacher(result);
					}
					$("#modalRemoveSubjectTeacher").modal('hide');
				}
			});
		},
		closeModal: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var modalid = $(_this).parent().parent().parent().parent().parent().attr('id');
			$("#"+modalid).modal('hide');
		},
		removeSubjectTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$('#modalRemoveSubjectTeacher').on('show.bs.modal', function () {
				$(this).find('input[name="tid"]').val($(_this).attr('tid'));
				$(this).find('input[name="subjid"]').val($(_this).attr('subjid'));
			});
			$("#modalRemoveSubjectTeacher").modal('show');
		},
		removeStudentSubjectTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			$('#triggerRemoveStudentSubjectTeacher').attr('yearlevelid',$(_this).attr('yearlevelid'))
			$('#modalRemoveStudentSubjectTeacher').on('show.bs.modal', function () {
				$(this).find('input[name="yearsectionid"]').val($(_this).attr('yearsectionid'));
				$(this).find('input[name="subjtid"]').val($(_this).attr('subjtid'));
			});
			$("#modalRemoveStudentSubjectTeacher").modal('show');
		},
		loadTimePicker: function(){
			$('#start').timepicker({ 'minTime': '7:30am', 'maxTime': '6:30pm', 'step': 30, 'timeFormat': 'h:i A' });
			$('#end').timepicker({ 'minTime': '7:30am', 'maxTime': '6:30pm', 'step': 30, 'timeFormat': 'h:i A' });
		},
		addSubjectTeacher: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			var selectedSubjID = $("#subjectIDSelect option:selected").val();
			if($("#subj_"+selectedSubjID).length > 0){
				$("#messageText").removeClass('hide');
			} else {
				$("#messageText").addClass('hide');
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: formData,
					success: function( result ){
						if(result == 0){
							
						} else {
							viewDesktop.checkTeacher(result);
						}
					}
				});
			}
		},
		addSubjectTeacherStudent: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			var selectedSubjID = $("#subjectTidSelect option:selected").val();
			if($("#subj_"+selectedSubjID).length > 0){
				$("#messageText").removeClass('hide');
			} else {
				$("#messageText").addClass('hide');
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: formData,
					success: function( result ){
						if(result == 0){
							
						} else {
							viewDesktop.checkStudent(result);
						}
					}
				});
			}
		},
		addSubjectTeacherSection: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			var selectedSubjID = $("#subjectTidSelect option:selected").val();
			if($("#subj_"+selectedSubjID).length > 0){
				$("#messageText").removeClass('hide');
			} else {
				$("#messageText").addClass('hide');
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: formData,
					success: function( result ){
						if(result == 0){
							
						} else {
							viewDesktop.checkSection($(_this).attr('yearlevelid'),result);
						}
					}
				});
			}
		},
		addStudentToSection: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			var studentSelect = $("#studentSelect option:selected").val();
			if($("#secsubj_"+studentSelect).length > 0){
				$("#messageText").removeClass('hide');
			} else {
				$("#messageText").addClass('hide');
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: formData,
					success: function( result ){
						if(result == 0){
							
						} else {
							viewDesktop.checkYearLevelSectionStudents($(_this).attr('yearlevelid'),result);
						}
					}
				});
			}
		},
		addSectionYearLevel: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var formData = $(_this).serialize();
			$("#messageText").addClass('hide');
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: formData,
				success: function( result ){
					if(result == 0){
						
					} else {
						viewDesktop.checkYearLevel(result);
					}
				}
			});
		},
		displayAllBarcode: function(){
			$("#studentTable .barcodeImg").each( function(){
				$(this).barcode($(this).attr('rel'), "ean13", {barWidth:2, barHeight:30, output: 'svg'});
			});
		},
		submitForm: function(evt){
			var _this = $(evt.target);
			var formType = $(_this).attr('formtype');
			evt.preventDefault();
			var options = { 
				beforeSend: function() 
				{
					$("#message").addClass('hide');
					$(".progress").removeClass('hide');
					$(".progress-bar").width('0%');
					$("#percent").removeClass('hide').html("<p>0% Complete (success)</p>");
					$(_this).find(':input').attr('disabled',true);
					$(_this).find(':button').attr('disabled',true);
				},
				uploadProgress: function(event, position, total, percentComplete) 
				{
					$(".progress-bar").width(percentComplete+'%');
					$("#percent").removeClass('hide').html('<p>'+percentComplete+'% Complete (success)</p>');
				},
				success: function() 
				{
					$(".progress-bar").width('100%');
					$("#percent").removeClass('hide').html('<p>100% Complete (success)</p>');
				},
				complete: function(response) 
				{
					$("#percent").addClass('hide');
					$(".progress").addClass('hide');
					$(_this).find(':input').attr('disabled',false);
					$(_this).find(':button').attr('disabled',false);
					
					if(formType == 'student'){
						if(response.responseText == 1){
							$("#message").removeClass('alert-danger hide').addClass('alert-success').html("<p>Success!</p>");
							viewDesktop.checkLogin($(_this).attr('rel'));
						} else if(response.responseText == 2){
							$("#message").removeClass('alert-success hide').addClass('alert-danger').html("<p>Email is already used!</p>");
						}else {
							$("#message").removeClass('alert-success hide').addClass('alert-danger').html("<p>There was an error encountered!</p>");
						}
					} else {
						if(response.responseText == 1){
							$("#message").removeClass('alert-danger hide').addClass('alert-success').html("<p>Success!</p>");
							viewDesktop.checkLogin($(_this).attr('rel'));
						} else {
							$("#message").removeClass('alert-success hide').addClass('alert-danger').html("<p>There was an error encountered!</p>");
						}
					}
				},
				error: function()
				{
					$("#message").removeClass('alert-success hide').addClass('alert-danger').html("<p>ERROR: unable to upload files</p>");
				}			 
			}; 
			if(clicked >= 1){
				$(_this).ajaxForm(options);
			} else {	
				clicked = clicked + 1;
				$(_this).ajaxForm(options);
				$(_this).submit();
			}		
		},	
		menuEvent: function(evt){
			var _this = $(evt.target);
			$("#topNav li a").removeClass('active');
			$(_this).addClass('active');
		},
		loginProcess: function(evt){
			var _this = $(evt.target);
			evt.preventDefault();
			var username = $(_this).find('#username').val();
			var password = $(_this).find('#password').val();
			var formdata = $(_this).serialize();
			$(_this).find(':input').attr('disabled',true);
			$(_this).find(':button').attr('disabled',false);
			$(_this).find(':button').html('Loading..');
			if( username == "" || password == "" ){
				$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p><i class="fa fa-exclamation-triangle"></i> Check your login credentials! Something is empty!</p>');
				$(_this).find(':input').attr('disabled',false);
				$(_this).find(':button').attr('disabled',false);
				$(_this).find(':button').html('Login');
			} else {
				$.ajax({
					url: window.site_url+'ajax.php',
					type: 'POST',
					data: formdata,
					success: function( result ){
						if(result == 0){
							$("#login-bottom").removeClass('hide').addClass('alert-danger').html('<p>No user is registered using this credentials.</p>');
							$(_this).find(':input').attr('disabled',false);
							$(_this).find(':button').attr('disabled',false);
							$(_this).find(':button').html('Login');
						} else {
							$("#login-bottom").removeClass('hide').addClass('alert-success').html('<p>Logging in......</p>');
							viewDesktop.checkLogin('index');
							Backbone.history.navigate( '!/index' , true );
						}
					}
				});
			}
			return this;
		},
		loadClock: function(){
			// Create two variable with the names of the months and days in an array
			var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			// Create a newDate() object
			var newDate = new Date();
			// Extract the current date from Date object
			newDate.setDate(newDate.getDate());
			// Output the day, date, month and year    
			$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

			setInterval( function() {
				// Create a newDate() object and extract the seconds of the current time on the visitor's
				var seconds = new Date().getSeconds();
				// Add a leading zero to seconds value
				$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
				},1000);
				
			setInterval( function() {
				// Create a newDate() object and extract the minutes of the current time on the visitor's
				var minutes = new Date().getMinutes();
				// Add a leading zero to the minutes value
				$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
				},1000);
				
			setInterval( function() {
				// Create a newDate() object and extract the hours of the current time on the visitor's
				var hours = new Date().getHours();
				// Add a leading zero to the hours value
				$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
				}, 1000);
		},
		loadIndex: function(){
			$.post("home.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				$("#contextArea").html(responseText);
			});
		},
		loadTeacher: function(){
			$.post("teacher.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		loadStudent: function(){
			$.post("student.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		loadSubject: function(){
			$.post("subject.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		loadAttendance: function(){
			$.post("attendance.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
				  viewDesktop.loadDatePicker();
			});
		},
		loadTracking: function(){
			$.post("tracking.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
				  viewDesktop.loadDatePicker();
			});
		},
		loadAttendanceLog: function(){
			$.post("attendance-log.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
				  viewDesktop.loadDatePicker();
			});
		},
		logoutUser: function(){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=logout',
				success: function( result ){
					Backbone.history.navigate( '!/login' , true );
				}
			});
		},
		checkTeacher: function(tid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadTeacherInfo(tid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="teacher"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadTeacherInfo(tid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="teacher"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		checkSection: function(yearlevelid,yearlevelsectionid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadYearLevelSectionInfo(yearlevelid,yearlevelsectionid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadYearLevelSectionInfo(yearlevelid,yearlevelsectionid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		checkStudent: function(sid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadStudentInfo(sid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="student"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadStudentInfo(sid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="student"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		checkYearLevel: function(yearlevelid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadYearLevelInfo(yearlevelid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadYearLevelInfo(yearlevelid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		checkYearLevelSection: function(yearlevelid,yearlevelsectionid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadYearLevelSectionInfo(yearlevelid,yearlevelsectionid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadYearLevelSectionInfo(yearlevelid,yearlevelsectionid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		checkYearLevelSectionStudents: function(yearlevelid,yearlevelsectionid){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								viewDesktop.loadYearLevelSectionStudents(yearlevelid,yearlevelsectionid);
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							viewDesktop.loadYearLevelSectionStudents(yearlevelid,yearlevelsectionid);
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav li a[rel="yearlevel"]').addClass('active');
							viewDesktop.loadClock();
						}	
						
					}
				}
			});
		},
		loadStudentInfo: function(sid){
			$.post("studentinfo.php", 
			{ valid: "yes", sid: sid },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
				  
			});
		},
		loadTeacherInfo: function(tid){
			$.post("teacherinfo.php", 
			{ valid: "yes", tid: tid },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
				  viewDesktop.loadTimePicker();
			});
		},
		loadYearLevelInfo: function(yearlevelid){
			$.post("yearlevelinfo.php", 
			{ valid: "yes", yearlevelid: yearlevelid },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		loadYearLevelSectionInfo: function(yearlevelid,yearlevelsectionid){
			$.post("yearlevelsectioninfo.php", 
			{ valid: "yes", yearlevelsectionid: yearlevelsectionid, yearlevelid: yearlevelid },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		loadYearLevelSectionStudents: function(yearlevelid,yearlevelsectionid){
			$.post("yearlevelsectionstudents.php", 
			{ valid: "yes", yearlevelsectionid: yearlevelsectionid, yearlevelid: yearlevelid },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		teachersList: function(){
			$.post("teacherslist.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		sectionInfo: function(){
			$.post("sectioninfo.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		teachersStudents: function(){
			$.post("teacherstudents.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		personnel: function(){
			$.post("personnel.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		yearlevel: function(){
			$.post("yearsection.php", 
			{ valid: "yes" },
			function(responseText, responseStatus){
				  $("#contextArea").html(responseText);
			});
		},
		checkLogin: function(url){
			$.ajax({
				url: window.site_url+'ajax.php',
				type: 'POST',
				data: 'action=loginForm',
				success: function( result ){
					if(result == 0){
						$("body").attr('class','login');
						$("#mainContext").load('login.php', function(){
							Backbone.history.navigate( '!/login' , true );
						});
					} else {
						$("body").removeClass('login');
						if($("#contextArea").length == 0) {
							$("#mainContext").load('main.php', function(){
								if(url == "teacher"){
									viewDesktop.loadTeacher();
								} else if(url == "student"){
									viewDesktop.loadStudent();
								} else if(url == "attendance"){
									viewDesktop.loadAttendance();
								} else if(url == "tracking"){
									viewDesktop.loadTracking();
								} else if(url == "checklog"){
									viewDesktop.loadAttendanceLog();
								} else if(url == "subject"){
									viewDesktop.loadSubject();
								} else if(url == "logout"){
									viewDesktop.logoutUser();
								} else if(url == "teacherslist"){
									viewDesktop.teachersList();
								} else if(url == "teacherstudents"){
									viewDesktop.teachersStudents();
								} else if(url == "personnel"){
									viewDesktop.personnel();
								} else if(url == "yearlevel"){
									viewDesktop.yearlevel();	
								} else if(url == "sectioninfo"){
									viewDesktop.sectionInfo();
								} else {
									Backbone.history.navigate( '!/index' , true );
									viewDesktop.loadIndex();
								}
								$("#topNav li a").removeClass('active');
								$('#topNav li a[rel="'+url+'"]').addClass('active');
								$("#sidebar .nav li a").removeClass('active');
								$('#sidebar .nav a[rel="'+url+'"]').addClass('active');
								viewDesktop.loadClock();
							});
						} else {
							if(url == "teacher"){
								viewDesktop.loadTeacher();
							} else if(url == "student"){
								viewDesktop.loadStudent();
							} else if(url == "attendance"){
								viewDesktop.loadAttendance();
							} else if(url == "tracking"){
								viewDesktop.loadTracking();
							} else if(url == "checklog"){
								viewDesktop.loadAttendanceLog();
							} else if(url == "subject"){
								viewDesktop.loadSubject();
							} else if(url == "logout"){
								viewDesktop.logoutUser();
							} else if(url == "teacherslist"){
									viewDesktop.teachersList();
							} else if(url == "teacherstudents"){
									viewDesktop.teachersStudents();
							} else if(url == "personnel"){
									viewDesktop.personnel();
							} else if(url == "yearlevel"){
									viewDesktop.yearlevel();	
							} else if(url == "sectioninfo"){
									viewDesktop.sectionInfo();
							} else {
								Backbone.history.navigate( '!/index' , true );
								viewDesktop.loadIndex();
							}
							$("#topNav li a").removeClass('active');
							$('#topNav li a[rel="'+url+'"]').addClass('active');
							$("#sidebar .nav li a").removeClass('active');
							$('#sidebar .nav a[rel="'+url+'"]').addClass('active');
							viewDesktop.loadClock();
						}
					}
				}
			});
		}
		
	});

	window.viewDesktop = new desktopView;

	window.Workspace = Backbone.Router.extend({
		routes: {
			"": "loadPage",
			"!/:url": "loadPage",
			"!/teacher/:tid": "loadTeacher",
			"!/student/:sid": "loadStudent",
			"!/yearlevel/:yearlevelid": "loadYearLevel",
			"!/yearlevel/:yearlevelid/section/:yearlevelsectionid": "loadYearLevelSection",
			"!/yearlevel/:yearlevelid/section/:yearlevelsectionid/students": "loadYearLevelSectionStudents"
		},
		loadPage: function(url){
			clicked = 0;
			viewDesktop.checkLogin(url);
		},
		loadTeacher: function(tid){
			clicked = 0;
			viewDesktop.checkTeacher(tid);
		},
		loadStudent: function(sid){
			clicked = 0;
			viewDesktop.checkStudent(sid);
		},
		loadYearLevel: function(yearlevelid){
			clicked = 0;
			viewDesktop.checkYearLevel(yearlevelid);
		},
		loadYearLevelSection: function(yearlevelid,yearlevelsectionid){
			clicked = 0;
			viewDesktop.checkYearLevelSection(yearlevelid,yearlevelsectionid);
		},
		loadYearLevelSectionStudents: function(yearlevelid,yearlevelsectionid){
			clicked = 0;
			viewDesktop.checkYearLevelSectionStudents(yearlevelid,yearlevelsectionid);
		}
	});
	
	new Workspace();
	
	window.router = new Workspace();
		
	Backbone.history.start();
});