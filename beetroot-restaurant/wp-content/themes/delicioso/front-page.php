<?php get_header(); //include header.php ?>

<main class="content">
<?php //THE LOOP
	if( have_posts() ): ?>
	<?php while( have_posts() ): the_post(); ?>

	<?php// the_post_thumbnail('big-banner'); //don't forget to activate in functions ?>
	<div class="header-container">
		<header class="main-header">
			<article id="post-<?php the_ID(); ?>" 
			<?php post_class('cf'); ?>>	

				<h2 class="entry-title"> 
					<a href="<?php the_permalink(); ?>"> 
						<?php the_title(); ?> 
					</a>
				</h2>
				
				<div class="entry-content">
					<?php 
					the_excerpt();
					?>
				</div>
						
			</article><!-- end post -->
		</header><!-- end main header -->
	</div>
	<?php endwhile; ?>
<?php else: ?>
<h2>Sorry, no posts found</h2>
<p>Try using the search bar instead</p>
<?php endif;  //end THE LOOP ?>


<?php //Quicklinks loop
	//custom query to fetch three pages as quick links by their post id#
	$quicklink_query = new WP_Query( array(
		'post_type' => 'page',
		'post__in' => array( 701,703,1719 )
	));
	//custom loop
	if($quicklink_query->have_posts()){ ?>
	<nav class="quicklinks-container">
	<ul class="quicklinks">
	<?php while($quicklink_query-> have_posts()){
				$quicklink_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('thumbnail' ); ?>
				<h3 class="button"><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
			</a>
		</li>
	<?php }//close while have posts ?>
	</ul>
	</nav>
<?php	}//end if have posts ?>

<?php dynamic_sidebar('booking-sidebar'); //add booking widget area ?>


<?php menu_feed(); ?>
<?php blog_feed(); ?>












</main> <!-- end #content -->
<?php get_footer(); //include footer.php ?>









