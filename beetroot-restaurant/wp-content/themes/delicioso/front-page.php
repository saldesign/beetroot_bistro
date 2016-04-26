<?php get_header(); //include header.php ?>

<main class="content">
<?php //Don't forget to register menu locations in functions.php!
	wp_nav_menu( array(
			'theme_location' 	=> 'image_menu',					//registered in functions.php
			'fallback_cb'		=>	'delicioso-menu_fallback',	//fallback function
			'container' 		=> false,							//no container
			'menu_class'		=> 'image-nav',							//<ul class="nav">
		));
 ?>
<?php //THE LOOP
	if( have_posts() ): ?>
	<?php while( have_posts() ): the_post(); ?>

	<?php the_post_thumbnail('big-banner'); //don't forget to activate in functions ?>
	<?php dynamic_sidebar('booking-sidebar'); //add booking widget area ?>

	<article id="post-<?php the_ID(); ?>" 
	<?php post_class('cf clearfix'); ?>>	

		<h2 class="entry-title"> 
			<a href="<?php the_permalink(); ?>"> 
				<?php the_title(); ?> 
			</a>
		</h2>
		
		<div class="entry-content">
			<?php 
			//if viewing a single post or page, show full content. otherwise, show the short content (excerpt)
			if( is_singular() ){
				the_content();
			}else{
				the_excerpt();
			}
			 ?>
		</div>
				
	</article><!-- end post -->

	<?php endwhile; ?>
<?php else: ?>

<h2>Sorry, no posts found</h2>
<p>Try using the search bar instead</p>

<?php endif;  //end THE LOOP ?>

</main> <!-- end #content -->
<?php get_footer(); //include footer.php ?>