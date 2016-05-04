<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="initial-scale=1.0" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/styles/beetroot.css" />
	<?php 
	//Necessary in <head> for JS and plugins to work. 
	//Before style.css loads so the theme stylesheet is more specific than all others.
	wp_head();  ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<?php

	if (has_post_thumbnail()) { //if a thumbnail has been set

		$imgID = get_post_thumbnail_id($post->ID); //get the id of the featured image
		$featuredImage = wp_get_attachment_image_src($imgID, 'full' );//get the url of the featured image (returns an array)
		$imgURL = $featuredImage[0]; //get the url of the image out of the array

		?>
		<style type="text/css">

	    .banner-header {
	         background-image: url(<?php echo $imgURL ?>);
			}

	  </style>

	  <?php
	}//end if

	?>
</head>
<body <?php body_class(); ?>>	
	<div class="wrapper">
		<header role="banner">
			<!-- TO DO: Custom Logo Display -->
			<nav role="navigation" class="main-nav">
				<h1 class="logo">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home">
						<span><?php bloginfo('name'); ?></span>
					</a>
				</h1>
				<a href="#menu" class="menu-link icon-menu"></a>
				<?php //Don't forget to register menu locations in functions.php!
					wp_nav_menu( array(
							'theme_location' 	=> 'main_menu',					//registered in functions.php
							'fallback_cb'		=>	'delicioso-menu_fallback',	//fallback function
							'container' 		=> false,
							'menu_class'		=> 'nav',							//<ul class="nav">
						));
				 ?>
			</nav>
		</header>


