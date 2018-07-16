 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TWINDER Installer</title>  
<link rel="stylesheet" href="public/css/color.css">
<link rel="stylesheet" href="public/css/layout.css">
<link rel="stylesheet" href="public/css/form.css">
<link rel="stylesheet" href="public/css/navbar.css"> 
<link rel="stylesheet" href="public/css/table.css"> 
<link rel="stylesheet" href="public/css/parsley.css"> 

 
<style>
  	
body{
	 box-sizing: border-box; 
}  
.installBtn,#refreshStep
{
  position: relative;
  padding: 10px;
  margin-right:5px;
  border: 2px groove;
  border-radius: 10px;
  cursor: pointer;
}
.installer
{
  background-color:transparent;
  border:2px solid #ccc;
   min-height:460px;
   height: auto;
   font-size: 12px;
    width:100%;
}
.progressBar
{
  width: 100%; 
}
.header
{
    background: #04A6DA; 
  text-shadow: 0 0 6px rgba(0, 255, 0, 0.5);
  font-family: "Orbitron", monospace;
  background: #04A6DA linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 50%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.2));
  background-size: 100% 20px;
  box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.45);
  color: #800000;
}

.TwinderDiv {  
background: #fff; 
 background: #fff linear-gradient(to bottom, rgba(100, 0, 0, 1), rgba(0, 100, 0, 0.1) 50%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.2));
  background-size: 100% 16px;
 font:bold 45px 'Aleo';
} 
  </style>
</head>
<body>
 
	 
<div class="container ">
	
 <div class="grid mobile ">

<div class="column offset-3 column-6 thick-border">
<?php include "header.php"; ?>
<?php
$step = '';
if(!Session::exists('steps')):
Session::set('steps', 1);

  endif;
?>
<input type="hidden" name="step" id="step" value="<?=Session::get('steps')?>">
 <div class="grid mobile ">
<div class="column column-12 installer">
 
 <!--  <iframe src="views/step1.php" scrolling="no" frameborder="2" style="background-color:transparent; height:360px; width:100%">
   
 
 </iframe> -->
</div>
</div>

<?php include "footer.php"; ?>

 </div>
 
</div>

<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery-3.3.1.min.js"></script>
<script src="public/js/apps.js"></script>
<script src="public/js/jquery.typeText.js"></script>
<script src="public/js/parsley.min.js"></script>
  <script type="text/javascript">
function showAlert() {
    var divAlert = document.getElementById('divAlert');
    var divConnInfo = document.getElementById('divConnInfo');

    divAlert.style.display='';
    divConnInfo.style.display='none';
}
function hideAlert() {
    var divAlert = document.getElementById('divAlert');
    var divConnInfo = document.getElementById('divConnInfo');

    divAlert.style.display='none';
    divConnInfo.style.display='';
}
    </script>

<script>
$(document).ready(function() {
/*    return $(".print").typeText({
      then: function() {
        return this.typeText("", {
          typeSpeed: 250,
          then: function() {
            return this.typeText("", {
              typeSpeed: 500
            });
          }
        });
      }
    });*/
twin();
   setInterval(function(){   
    twin();
   }, 30000);
        function twin()
        {
              return $(".print").typeText({
          then: function() {
            return this.typeText("", {
              typeSpeed: 250,
              then: function() {
                return this.typeText("", {
                  typeSpeed: 500
                });
              }
            });
          }
        });
        }

  });
</script>
</body>
</html>