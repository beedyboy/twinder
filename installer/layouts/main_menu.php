 <?php

//$menu = Router::getMenu('menu_acl.json');

// /dnd($menu);


 ?>
	<nav role="navigation" class=" navbar is-primary">
	

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
 
	 <div class="dropdown">
	    <a href="#" class="dropbtn"><i class="fas fa-suitcase fa-fw"></i>Manage Software</a> 

		<div class="dropdown-content">
		<?php   if(actionAcl('Role')):  ?>
			<a href="<?=base_url?>role/index"><i class="fa fa-fw fa-user-plus"></i>Roles</a>
		<?php   endif; ?>
			<a href="<?=base_url?>company/settings"><i class="fa fa-fw fa-cog"></i>General Settings</a>
			<a href="<?=base_url?>company/profile"><i class="fa fa-fw fa-check-circle"></i>Company's Profile</a>
			<a href="#"></a>
		</div> 
	 </div>
	
	<?php   if(actionAcl('Category')):  ?>
	 <div class="dropdown">
	    <a href="<?=base_url?>category" class="dropbtn"><i class="fas fa-bullhorn fa-fw"></i>Category</a> 

		<div class="dropdown-content">
		<?php   if(actionAcl('Category', 'r') || actionAcl('Category', 'c')):  ?>
			<a href="<?=base_url?>category/index"><i class="fa fa-fw fa-th-list"></i>List</a>
		<?php  endif;  ?>
			<?php   if(actionAcl('Category', 'c')):  ?>
			<a href="#" class="addNewCategory"><i class="fas fa-plus fa-fw"></i>Create</a>
		<?php endif; ?>
		</div> 
	 </div>
 <?php  endif;  ?>

<?php   if(actionAcl('Event')):  ?>
	 <div class="dropdown">
	    <a href="<?=base_url?>event" class="dropbtn"><i class="fas fa-calendar fa-fw"></i>Event Management</a> 

		<div class="dropdown-content">
		<?php   if(actionAcl('Event', 'c') || actionAcl('Event', 'r')):  ?>
			<a href="<?=base_url?>event/index"><i class="fa fa-fw fa-th-list"></i>List</a>
		<?php endif;
		  if(actionAcl('Event', 'c')):  ?>
			<a href="#" class="addNewEvent"><i class="fas fa-plus fa-fw"></i>Create</a>
			<?php  endif;  ?>
		</div> 
	 </div>
	<?php endif; ?>

<?php   if(actionAcl('User')):  ?>
      <a href="<?=base_url?>user"><i class="fas fa-user  fa-fw"></i>User Management</a>
  <?php endif; ?>
	  
    <a href="<?=base_url?>report"><i class="fas fa-chart-bar fa-fw"></i>Report</a>
	

	   

</div>


<div class="navbar-right">


	 <?php if(Auth::check()): ?>
 <div class="dropdown">
	 <a class="dropbtn"><?php echo Auth::auth('acc_first_name').' '.Auth::auth('acc_last_name');  ?>
	 	<span class="caret"></span>
	 </a>

		<div class="dropdown-content">
			<a class="navbar-item" href="<?=base_url?>user/profile">
          <i class="fa fa-fw fa-user-secret"></i>  Profile
          </a>
          <a class="navbar-item" href="<?=base_url?>auth/logout">
         <i class="fa fa-fw fa-bell"></i>   Notifications
          </a>
         <!--  <a class="navbar-item" href="<?=base_url?>auth/logout">
          <i class="fa fa-fw fa-cog"></i> Settings
         </a> -->
           
          <hr class="navbar-divider">
         
          <a class="navbar-item is-active" href="<?=base_url?>auth/logout">
            <i class="fa fa-fw fa-sign-out-alt"></i>Log Out
          </a>
			 
		</div>
		
	
	 </div>

	<?php elseif (!Auth::check()) : ?>
		<a href="<?=base_url?>auth/login">Log in</a>

	<?php endif; ?>
 
</div>

	 

</div>

	</nav> 
   
   <?php  //dnd($_SESSION); ?>