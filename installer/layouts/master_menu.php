 <?php

//$menu = Router::getMenu('menu_acl.json');

// /dnd($menu);


 ?>
	<nav role="navigation" class="navbar is-primary">
	

	<div class="navbar-brand">
		
	<a href="#" class="link">	<img src="<?=base_url;?>public/images/bg.jpg" alt="logo"></a>
	 <div class="navbar-burger"  id="toggle" data-target="allMenu">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
	 


	<div  id="allMenu" class="navbar-menu">
	<div class="navbar-left">

	 <a href="<?=base_url?>"> Home</a>
	 <a href="<?=base_url?>feature">Feature </a> 

	 <div class="dropdown">
	 <a class="dropbtn">System</a>

		<div class="dropdown-content">
			<a href="<?=base_url?>software/index">List</a>
			<a href="<?=base_url?>software/Create">Create</a>
			<a href="#"></a>
		</div>
		
	
	 </div>
 

</div>


<div class="navbar-right">


	 <?php if(Auth::check()): ?>
 <div class="dropdown">
	 <a class="dropbtn"><?php echo Auth::auth('acc_first_name').' '.Auth::auth('acc_last_name');  ?></a>

		<div class="dropdown-content">
			<a href="#">Settings</a>
			<a href="#">Profile</a>
			<a href="<?=base_url?>auth/logout">Log out</a>
		</div>
		
	
	 </div>

	<?php elseif (!Auth::check()) : ?>
		<a href="<?=base_url?>auth/login">Log in</a>

	<?php endif; ?>
<a href="#">Contact Us</a>
</div>

	 

</div>

	</nav> 
   
   <?php  //dnd($_SESSION); ?>