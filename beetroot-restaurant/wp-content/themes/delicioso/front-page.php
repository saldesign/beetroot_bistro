<?php get_header(); //include header.php ?>

<main class="content">
<?php //THE LOOP
	if( have_posts() ): ?>
	<?php while( have_posts() ): the_post(); ?>

	<?php// the_post_thumbnail('big-banner'); //don't forget to activate in functions ?>
	<div class="container">
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








<?php 
	$page_query = new WP_Query( array(
		'post_type' => 'page',
		'post__in' => array( 701,703,1719 )
	));
	//custom loop
	if($page_query->have_posts()){ ?>
	<ul class="quicklinks">
	<?php while($page_query-> have_posts()){
				$page_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('thumbnail' ); ?>
				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>
			</a>
		</li>
	<?php }//close while have posts ?>
	</ul>
<?php	}//end if have posts ?>

<?php dynamic_sidebar('booking-sidebar'); //add booking widget area ?>

</main> <!-- end #content -->
<?php get_footer(); //include footer.php ?>