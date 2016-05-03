<?php get_header(); //include header.php ?>

<main class="content">

<?php 
$page_for_posts = get_option('page_for_posts');
if( is_home() && $page_for_posts ) :
  //echo get_the_post_thumbnail($page_for_posts, 'medium');


$imgID = get_post_thumbnail_id($page_for_posts); //get the id of the featured image
		$featuredImage = wp_get_attachment_image_src($imgID, 'full' );
	$imgURL = $featuredImage[0];
	

?>

<style type="text/css">

	    .banner-header {
	         background-image: url(<?php echo $imgURL ?>);
			}
</style>
<div class="header-container">
	<header class="banner-header">
		<article id="post-<?php the_ID(); ?>" 
		<?php post_class('cf'); ?>>	

			<h2 class="entry-title"> 
				<span class="button"> 
					<?php echo get_the_title($page_for_posts); ?> 
				</span>
			</h2>
			
			<div class="entry-content">
				<?php 
					echo get_the_content($page_for_posts);
				?>
			</div>
					
		</article><!-- end post -->
	</header><!-- end main header -->
</div>

<?php
endif;


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