jQuery(document).ready( function($){ 

 // alert(33);

	 /* *
	 @function destroyPopUp()
	  *@description destroys pop up content and closes it
	  *
	  */   
   // twinderText();

   var installDigit = 1; 
  var  installStep = getStoredValue('installStep');

twinderInit();
function storeValue(key, value){
if(localStorage){
return localStorage.setItem(key, value);
}
else{
return $.cookies.set(key, value);
  }
}
function getStoredValue(key){
  if(localStorage){
return localStorage.getItem(key);
}
else{
return $.cookies.get(key);
  }
} 



// clearStorage();
function clearStorage(){
window.localStorage.clear();
}

    
    function twinderInit()
    {
       
      if(installStep === null || installStep ==='NaN')
      { 
        // alert('not set'); 
        storeValue('installStep', 1);
        startInstaller();
        }
        else
        { 
          //continue installation from last step
         continueInstall(parseInt(getStoredValue('installStep')));  
        }
        

    }
function startInstaller()
{
   $.ajax({
    url: 'views/step1.php', 
       success:function(data)
       {

        $(".installer").html(data);
       }
       
    });
   

}

 

function continueInstall(page)
{
   storeValue('installStep', parseInt(page));
  var n = "step"+parseInt(page)+'.php';
  if(page === 7)
  {
    clearStorage();
  }
  else
  {
    
  }

   $.ajax({
    url: 'views/'+n, 
       success:function(data)
       {

        $(".installer").html(data);
       }
       
    });
   

}
//go to the next step
function nextStep()
{
   var n=  parseInt(getStoredValue('installStep')) + 1;  
         continueInstall(n);
  
}

//go to the previous step
function prevStep()
{
  var n=  parseInt(getStoredValue('installStep')) - 1; 

   continueInstall(n);  
}

function refreshStep(page)
{
   storeValue('installStep', parseInt(page));
  var n = "step"+parseInt(page)+'.php';

   $.ajax({
    url: 'views/'+n, 
       success:function(data)
       {
        $(".installer").html(data);
       }
       
    });
   

}

 function showMod(){
   $('.beedy-kaydee-popup').css('left', $(window).width() / 2 - ($('.beedy-kaydee-popup').width() / 2));
	 $('.beedy-kaydee-popup').show();
 
 }
	 function destroyPopUp(){
			$('.popup-content').empty();  
				$('.beedy-kaydee-popup').hide();
	 }
 
       /**
      *@function hide alert box
      *@returns void
       */
     function hideAlertBox(id){
      setInterval( function(){
       $("#"+id).html('');
       }, 10000);
       
     }

/**
 * [hideorShowMore description]
 * @param  {String}  id   [description]
 * @param  {Boolean} bool [description]
 * @return {[type]}       [description]
 */
function hideorShowMore(id='', bool = false)
{

  if(bool == true)
  {
     $("#"+id).css("display", "inline-block");
 $(".split-dropdown").css("display", "inline-block");
  }
  else
  {
    $("#"+id).css("display", "none");
   $(".split-dropdown").css("display", "none");
  }

}


function twinderText()
{
   $.ajax({
    url: 'assets/twinder.php', 
       success:function(data)
       {

        $(".twinderText").html(data);
       }
       
    });
   

}
 /*???????????????????????????????ADD OR SHOW FORM ?????????????????????????????????????????*/      
  
  $(document).on('click', '#newInstall', function(){

   nextStep();
   
   }); 
 
  $(document).on('click', '#refreshStep', function(){

   prevStep();
   
   }); 
 
  $(document).on('click', '.freeT', function(){

       // storeValue('installStep', 6);
      continueInstall(7);
   
   }); 
 
  $(document).on('click', '.generateLicense', function(){

      /* storeValue('installStep', 7);
      nextStep();*/
   
   }); 
 

 /* $(document).on('click', '.addNewUser', function(){  
   $.ajax({
    url: uri+'user/create', 
       success:function(data)
      {
    
   $('.headerTitle').html("Create User");
   $('.popup-content').html(data);
           showMod();
           
   }
    });
   
   });*/ 


/*??????????????????????????????PRINT ???????????????????????????????????*/

  
 
   $(document).on('submit', '.install-step2', function(e){ 
   e.preventDefault();

   var formdata = $(this).serialize();  
   $.ajax({
      url:  'assets/step2.php', 
      type: "POST",
      data: formdata, 
      dataType: "json", 
    }).done(function(data)
    {

       if(data.status =='success')
        {
            $('#alert_message_mod').html('<div class="alert alert-success" role="alert">' + data.msg + '</div>');    
           nextStep();
            hideAlertBox("alert_message_mod"); 
        }
                     
       else if(data.status == "db_error")
      {
        $(".formTag").empty();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">' + data.msg + '</div>');
      }
                    
     else
     {
      $(".formTag").empty();
      
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">' + data.msg + '</div>');
                   
    }
    // hideAlertBox("alert_message_mod"); 
       
    })
   
  }); 
 

 
   $(document).on('submit', '.install-step3', function(e){ 
   e.preventDefault();
   $("#submitBtn").hide();
    $('#alert_message_mod').html('<div class="alert alert-info" role="alert">Please wait while we set up your database...</div>');
   var formdata = $(this).serialize();  
   $.ajax({
      url:  'assets/step3.php', 
      type: "POST",
      data: formdata,  
    }).done(function(data)
    {  
       if(data == 1)
        {
            $('#alert_message_mod').html('<div class="alert alert-success" role="alert">Database created successfully</div>');    
           nextStep();
            // hideAlertBox("alert_message_mod"); 
        }
                     
       else if(data == 2)
      {
        $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">Database Exists. Enter a different name</div>');
      }
                 
       else if(data == 3)
      {
         $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">Unable to drop database</div>');
      }
                    
     else
     { 
       $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">' + data + '</div>');
                   
    }
    // hideAlertBox("alert_message_mod"); 
       
    })
   
  }); 
 


 
  $(document).on('submit', '.install-step4', function(e){ 
  e.preventDefault(); 
   $("#submitBtn").hide();
    $('#alert_message_mod').html('<div class="alert alert-info" role="alert">Please wait while we set up your institution profile...</div>');
 $.ajax({
url: "assets/step4.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data)   // A function to be called if request succeeds
    {  
       if(data == 1)
        {
            $('#alert_message_mod').html('<div class="alert alert-success" role="alert">Institution Profile Created Successfully</div>');    
           nextStep();
            // hideAlertBox("alert_message_mod"); 
        }
                     
       else if(data == 2)
      {
        $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">Error Setting Institution Profile. Please try again later...</div>');
      }
          
                    
     else
     { 
       $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">' + data + '</div>');
                   
    }
    // hideAlertBox("alert_message_mod"); 
       
    }
  });
   });

 


 
  $(document).on('submit', '.install-step5', function(e){ 
  e.preventDefault(); 
   $("#submitBtn").hide();
    $('#alert_message_mod').html('<div class="alert alert-info" role="alert">Please wait while we set up your administrative profile...</div>');
 $.ajax({
url: "assets/step5.php",
type: "POST",
data: new FormData(this),
contentType: false,
cache: false,
processData:false,
success: function(data)   // A function to be called if request succeeds
    {  
       if(data == 1)
        {
            $('#alert_message_mod').html('<div class="alert alert-success" role="alert">Your Profile has been Created Successfully</div>');    
           nextStep();
            // hideAlertBox("alert_message_mod"); 
        }
                     
       else if(data == 2)
      {
        $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">Error Creating your Profile. Please try again later...</div>');
      }
          
                    
     else
     { 
       $("#submitBtn").show();
        $('#alert_message_mod').html('<div class="alert alert-danger"role="alert">' + data + '</div>');
                   
    }
    // hideAlertBox("alert_message_mod"); 
       
    }
  });
   });

 



//select users
$( document ).on( "click", "#userCheckAll", function( e ) {  
  $('.userCheckCase').prop('checked', this.checked); 

if($("#userCheckAll").prop("checked"))
{
  hideorShowMore('userMore', true);
}
else
{
   hideorShowMore('userMore');
}
 

  } );
   

$( document ).on( "click", ".userCheckCase", function( e ) { 
        if($(".userCheckCase").length == $(".userCheckCase:checked").length) 
        {  
            $("#userCheckAll").prop("checked", "checked");

              hideorShowMore('userMore', true);
        }
         else
          { 
             if($(".userCheckCase:checked").length < 1) 
            {  
              hideorShowMore('userMore');
          }
          else
          {

            hideorShowMore('userMore', true);
          }
             
            $("#userCheckAll").prop("checked", false); 
          }

    });
 

 
 




  //ends here

})