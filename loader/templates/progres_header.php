<script src="src/facebox.js" type="text/javascript"></script>
 
   <link rel="stylesheet" href="src/facebox.css" />
    <link rel="stylesheet" href="src/update.css" />

<script src="src/update.js" type="text/javascript"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    

	});
</script>
<?php

include('../includes/system.php');

$bankId = $_REQUEST['bankId'];
$loadBankQues =	System::loadTblCond('beedy_question_bank', 'bankId',$bankId);
 ?>
 
<?php if(!empty($loadBankQues)): ?>
<?php 
echo "<div class='black-img-white'>Total Questions(".count($loadBankQues).")"."</div>";
	echo "<br /><hr style=\"margin:2px;  border-bottom:5px solid #C7E282;\">";
								$i = 0;
								foreach($loadBankQues as $Bank): 
								$i++;
								 
								$qid = $Bank['Question_Id'];
		//	echo "<a href='edit_question.php?bankId=$bankId&qid=$qid&num=$i' class='btn btn-success' id='qlist' rel='facebox'>  $i  </a>";
		
 // echo "<a href='viewBank.php?bankId=$bankId&qid=$qid&num=$i' id='qlist' class='btn btn-success'>  $i  </a>";
// "<a data-toggle='modal' href='#createAccount$i' class='btn btn-success'>  $i  </a>";
 ?>
   <input class="btn btn-success" name="" type="button" 
   value="<?php echo $i; ?>" onclick="javascript:editQuestion('<?php echo $bankId; ?>', '<?php echo $qid; ?>', '<?php echo $i; ?>', 4)" style="cursor:pointer;" />

 
 <?php
 endforeach;  
else:
echo "No question for this category";

endif;

?>	
  <script>
  $("#beedy").click(function () {

swal('beedy');
});

</script>