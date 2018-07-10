 
<link href="../css/font-awesome.css" rel="stylesheet" media="screen">
<link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
 <style>
 #dWeeks{
 display: none;
 }
 
 </style>
<form id="systemWindow" role="form">
<center><h4><i class="icon-key icon-large"></i>Lincense Window</h4></center>
<hr />
<div id="ac">  
<input type="hidden" name="action" value="systemWindow" />
<input type="hidden" id="url" value="server.php" />
   <span>Lincense Mode : </span>  <input type="radio" name="mode" value="Time-Based" onchange="demo();" style="width:25px; height:20px;" id="trial"/>
    Time Based  <input type="radio" name="mode"  style="width:25px; height:20px;" onchange="demo();" value="One-Off" id="purchased"  checked />
    One-Off  
<br />
<br />
 <div id="dWeeks">
<span>Number of Weeks : </span>
<select name="days" style="width:215px; height:28px; margin-left:-5px;" >
<option></option>
<option value="0008">1 week</option>
<option value="0016">2 weeks</option>
<option value="0034">4 weeks</option>
<option value="0064">8 weeks</option>
<option value="0080">10 weeks</option>
<option value="0104">13 weeks</option>
</select><br>
 </div>
<span></span> <br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:157px;"><i class="icon icon-save icon-large"></i> Generate Key</button>
</div>
<br />
<div id="add-bottom" class="alert hide" style="margin:20px 0 0;"></div>
</div>
</form>
<script src="../style/jquery.js" type="text/javascript"></script>
<script type="text/JavaScript" src="../style/bootstrap.min.js"></script>
<script type="text/JavaScript" src="../style/respond.min.js"></script>
<script type="text/JavaScript" src="../style/beedy.js"></script> 
  