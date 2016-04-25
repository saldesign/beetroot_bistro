<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//Before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
</head>
<body <?php body_class(); ?>>	
	<div class="wrapper">
		<header role="banner">
			<!-- TO DO: Custom Logo Display -->
			<nav role="navigation" class="main-nav">
				<h1 class="logo">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
				<?php //Don't forget to register menu locations in functions.php!
					wp_nav_menu( array(
							'theme_location' 	=> 'main_menu',					//registered in functions.php
							'fallback_cb'		=>	'delicioso-menu_fallback',	//fallback function
							'container' 		=> false,							//no container
							'menu_class'		=> 'nav',							//<ul class="nav">
						));
				 ?>
			</nav>
		</header>


