<?php get_header(); //include header.php ?>

<main class="content">

<?php 
//The Loop
		if(have_posts()): ?>
		<?php while(have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?>>
				<?php the_post_thumbnail('thumbnail'); //don't forget to activate in functions ?> 
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>	
				<div class="postmeta">
					<div class="categories"><?php the_category(); ?></div>
					<span class="date"><a href="<?php the_permalink(); ?>"><?php the_date(); ?></a></span>
				</div><!-- end postmeta -->	
				<div class="entry-content">
					<?php 
					//if the post is video format, show full content.
					//otherwise show the short content (excerpt)
					if(is_singular() OR has_post_format('video')){
						the_content();
						wp_link_pages();
					}else{
						the_excerpt();
					}
					 ?>
				</div>
		
			</article><!-- end post -->
		<?php endwhile; ?>
		<?php delicioso_pagination(); //defined in functions.php ?>
		<?php else: ?>
			<h2>Sorry, no posts found</h2>
			<p>Try using the search</p>
	<?php endif; //End The Loop ?>
</main> <!-- end #content -->
<?php get_sidebar(); //include sidebar.php ?>
<?php get_footer(); //include footer.php ?>