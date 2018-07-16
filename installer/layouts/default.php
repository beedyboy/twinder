<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$this->siteTitle(); ?></title> 
<link rel="stylesheet" href="<?=base_url.'public/css/layout/.css'; ?>">
<link rel="stylesheet" href="<?=base_url.'public/css/form.css'; ?>">
<link rel="stylesheet" href="<?=base_url.'public/css/navbar.css'; ?>">
<link rel="stylesheet" href="<?=base_url.'public/css/table.css'; ?>">
<link rel="stylesheet" href="<?=base_url.'public/css/style.css'; ?>">

<?=$this->content('head'); ?>
<style>
  	
body{
	 box-sizing: border-box; 
}
.form-div{
	display: flex;
	flex-flow: column wrap;
	justify-content: space-around;
	align-items: center;
	background:  rgba(125,256,255, 0.5);
	box-shadow: white;
}
form{
	display: flex;
	flex-flow: column wrap; 
	justify-content: center;
	flex-basis: 100%;
	background: #FFF;
	box-shadow: white;
	border-radius: 10px;
	margin: 0.6rem;
}
input, button{
	margin: 0.2rem;
	padding: 0.2rem;
	border: none;
	border-bottom: 2px solid blue;
	box-sizing: border-box;
}

 input:hover{
	margin: 0.2rem;
	padding: 0.2rem;
	color: red;
	border: none;
	box-sizing: border-box;
}

.btn-success{
	background: green;
	color: white;
	border-radius: 5px;
	padding: 5px;
}
.alert-danger{
	background: #C82333;
 

}
.text-warning
{

	color: #FFF;
}

  </style>
</head>
<body>
	
<?php include 'master_menu.php'; ?>
<div class="container">
	

<?= $this->content('body'); ?>




</div>

</body>
</html>