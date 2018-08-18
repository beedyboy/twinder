 <!DOCTYPE html>
<html>
<body>
<style>
html,
body {
  width: 100%;
  height: 100%;
  overflow: hidden;
}
body {
  font-size: 14px;
  background: #04A6DA; 
  text-shadow: 0 0 6px rgba(0, 255, 0, 0.5);
  font-family: "Orbitron", monospace;
  background: #04A6DA linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1) 50%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.2));
  background-size: 100% 20px;
  box-shadow: inset 0 0 80px rgba(0, 0, 0, 0.45);
}
@media (min-width: 700px) {
  body {
    font-size: 16px;
  }
}
.screen {
  position: absolute;
  top: 80px;
  left: 5%;
  right: 0;
  bottom: 0;
  width: 40%;
  height: 100%;
  padding: 3em 2em;
  box-sizing: border-box;
  overflow: hidden;
}
.divClass { 
  position: absolute;
background: #fff; 
 background: #fff linear-gradient(to bottom, rgba(100, 0, 0, 1), rgba(0, 100, 0, 0.1) 50%, rgba(0, 0, 0, 0.3) 50%, rgba(0, 0, 0, 0.2));
  background-size: 100% 20px;
 font:bold 65px 'Aleo';
} 
div {
  width: 100%;
  max-width: 40em;
  line-height: 1.4;
  margin: 0 auto 1.5em;
}
div .captain {
  color: #F6F;
  font-weight: bold;
  font-size: 1.1em;
}
.itext {
  color: #000;
  font-weight: bold;
  font-size: 1.1em;
}
.printing:after {
  content: "|";
  color: #0f0;
  animation: blink 0.66s steps(3, start) infinite;
}
@keyframes blink {
  to {
    visibility: hidden;
  }
}
</style>

<div style="width:150px;margin:auto;height:500px;margin-top:300px">
<?php include('../includes/system.php'); ?>
<?php include('../includes/functions.cbt.php'); ?>
 
 <?php
 

unset($_SESSION);
session_destroy(); 
 

	
 //echo '<meta http-equiv="refresh" content="2;url=../index.php">';
  echo'<progress max=100><h1>Progress: 60% done. </h1></progress><br>';
 echo'<span class="itext">Logging out please wait!...</span>';
?>
 
<div class="screen print"> 
  <div class="divClass"> 
  <span ><font color="red">T </font></span><span ><font color="blue">W</font></span>
  <span class="captain">I</span>
<span class="N">N</span>
  <span class="I">D</span>
  <span class="I">E</span>
  <span class="I">R</span> 
  </div>
</div>
<script src="../style/jquery.min.js"></script>
<script src="../style/jquery.typeText.js"></script>

<script>
$(document).ready(function() {
    return $(".print").typeText({
      then: function() {
	 setTimeout( function() { window.location='../'; },2000);
	// location.href="../index.php";
   // return alert('done');
      }
    });
  });
</script>

 <script>
$(document).ready(function() {
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
  });
</script>
</div>
</body>
</html>
