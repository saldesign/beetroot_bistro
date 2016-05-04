<?php get_header(); //include header.php ?>

<?php //THE LOOP
	if( have_posts() ): ?>
	<?php while( have_posts() ): the_post(); ?>

	<div class="header-container">
		<header class="banner-header">
			<article id="post-<?php the_ID(); ?>" 
			<?php post_class('cf'); ?>>	

				<h2 class="entry-title"> 
					<span class="button"> 
						<?php the_title(); ?> 
					</span>
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
	<ul class="quicklinks cf">
	<?php while($quicklink_query-> have_posts()){
				$quicklink_query->the_post(); 

		$imgID = get_post_thumbnail_id($post->ID); //get the id of the featured image
		$featuredImage = wp_get_attachment_image_src($imgID, 'full' );//get the url of the featured image (returns an array)
		$imgURL = $featuredImage[0]; //get the url of the image out of the array


				?>
		<li>
				<div style="background:url(<?php echo $imgURL ?>);
						background-size: cover; ?>');"></div>
				<h3>
					<a class="button" href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<a href="<?php the_permalink(); ?>">
					<?php the_excerpt(); ?>
				</a>
			
		</li>
	<?php }//close while have posts ?>
	</ul>
	</nav>
<?php	}//end if have posts ?>

<?php dynamic_sidebar('booking-sidebar'); //add booking widget area ?>

<main class="content">
<?php menu_feed(); ?>
<?php blog_feed(); ?>












</main> <!-- end #content -->
<?php get_footer(); //include footer.php ?>









