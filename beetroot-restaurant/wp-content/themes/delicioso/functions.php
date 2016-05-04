<?php 
//Look & Feel related functionality
//WP Auto Loads functions.php before all template files

/**
 * Activate Sleeping Features
 */

// turns on featured image
add_theme_support('post-thumbnails');

//TODO: allows you to personalize styles for post types
add_theme_support('post-formats', array('quote', 'image', 'gallery', 'video', 'link', 'audio', 'chat', 'status', 'aside',  ) );

//TODO: background customizer
add_theme_support('custom-background' );

//TODO: logo uploader
add_theme_support('custom-logo', array(
	'height' => 80,
	'width' => 324,
	'flex-height' => false,
	'flex-width' => false, ) );
//rss feed support
add_theme_support('automatic-feed-links' );

//html5 support
add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));

//dont forget to remove the <title> tag from header.php
add_theme_support('title-tag' );

//special image size for the front page banner
//						name 			  w    h   crop?
add_image_size( 'big-banner', 1050, 300, true );
add_image_size('quicklink', 300, 200, true  );
add_image_size('widethumb', 300, 150, true  );

/**
 * Make Excerpts Better!
 *	Change default length and [...]
 */
function delicioso_ex_length(){
	return 27;//words
}
add_filter('excerpt_length', 'delicioso_ex_length' );
/**
 * fix the [...]
 *	@param string $dots the original [...]
 *	@return string 		nice HTML button that links to the single post
 */
function delicioso_readmore($dots){
	if(!is_front_page()){
		return '&hellip; <a class="readmore button" href="' . get_permalink() . '"> Read More</a>';
	}
}
add_filter('excerpt_more', 'delicioso_readmore' );


/**
 * Make threaded comment replies more user friendly
 */
function delicioso_comment_ux(){
	if(is_singular() && get_option('thread_comments') && comments_open()){
		wp_enqueue_script('comment-reply' );
	}
}
add_action('wp_enqueue_scripts', 'delicioso_comment_ux' );


/**
 * Register Menu Locations
 */
	add_action('init', 'delicioso_menu_locations');
	function delicioso_menu_locations(){
		register_nav_menus( array(
				'main_menu' => 'Main Menu'
			));
	}
	function delicioso_menu_fallback(){
		echo 'Go into the admin panel and assign a menu to Main Menu!';
	}


/**
 * Helper function to output pagination on any template
 */
function delicioso_pagination(){
	?>
	<div class="pagination">
		<?php 
		if( is_singular() ){
			previous_post_link('%link', 'Older Post: %title'); 	//1 older post
			next_post_link('%link', 'Newer Post: %title' ); 		//1 newer post
		}
		//use newer numbered pagination if available (since 4.1)
		elseif( function_exists('the_posts_pagination') ){
			the_posts_pagination( array(
				'prev_text' => '&larr; Previous',
				'next_text' => 'Next &rarr;',
				'mid_size' => 2,
			) );
		}else{	
			previous_posts_link('&larr; Newer Posts'); 
		 	next_posts_link('Older Posts &rarr;'); 
		}
		 ?>
		</div>
	<?php 
}


/**
 * Create widget areas (dynamic sidebars)
 */
add_action( 'widgets_init', 'awesome_widget_areas' );
function awesome_widget_areas(){
	register_sidebar(array(
		'name' 			=> 'Blog Sidebar',
		'id' 			=> 'blog-sidebar',
		'description' 	=> 'Appears alongside blog posts and archives',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
	register_sidebar(array(
		'name' 			=> 'Booking Sidebar',
		'id' 			=> 'booking-sidebar',
		'description' 	=> 'Appears below Image Menu',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
	register_sidebar(array(
		'name' 			=> 'Footer Area',
		'id' 			=> 'footer-area',
		'description' 	=> 'Appears at the bottom of every screen',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
		register_sidebar(array(
		'name' 			=> 'Footer Newsletter Bar Area',
		'id' 			=> 'footer-newsletterbar',
		'description' 	=> 'Appears at the bottom of every screen',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
	));
}






//QUESTION: Should this go in plugins?
//Menuitem loop
function menu_feed($number = 6){
	$menuitem_query = new WP_Query(array(
		'post_type' 		=> 'menuitem',
		'posts_per_page'	=>	$number,
	));
	$menuitemcategory = get_terms( 'menuitemcat', array(
	    'orderby'    => 'count',
	    'hide_empty' => 0
	) );
	//custom loop
	if($menuitem_query->have_posts()){ ?>
		<section class="menu-feed">
		<h3>New Menu Items</h3>
		<?php while($menuitem_query->have_posts()){
					$menuitem_query->the_post(); ?>
				<article class="hentry">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title( ); ?></h4>
					</a>
					<?php the_terms( get_the_id(), 'menuitemcat', '<p>','', '</p>' ); ?>
					
					<?php the_post_thumbnail('medium' ); ?>
					<?php the_excerpt(); ?>
					<a class="button" href="<?php the_permalink(); ?>">Read More</a>
				</article>
		<?php }//end while have posts ?>
		</section>
<?php	}//end if have posts 
wp_reset_postdata();
}//end menu_feed()

//Blog Feed loop
function blog_feed($number = 6){
	$blogfeed_query = new WP_Query(array(
		'post_type' 		=> 'post',
		'posts_per_page'	=>	$number,
	));
	//custom loop
	if($blogfeed_query->have_posts()){ ?>
		<section class="blog-feed">
		<h3>Recent Posts</h3>
		<?php while($blogfeed_query->have_posts()){
					$blogfeed_query->the_post(); ?>
				<article class="hentry">
					<a href="<?php the_permalink(); ?>">
						<h4><?php the_title( ); ?></h4>
					</a>
					<?php the_post_thumbnail('widethumb' ); ?>
					<?php the_excerpt(); ?>
					<a class="button" href="<?php the_permalink(); ?>">Read More</a>
				</article>
		<?php }//end while have posts ?>
		</section>
<?php	}//end if have posts 
wp_reset_postdata();
}//end blog_feed()

//featured loop
function featured_header(){
	$featuredHeader_query = new WP_Query(array(
		
	));
}




//Blog page info loop
function blog_info(){
	$page_for_posts = get_option('page_for_posts');
	$bloginfo_query = new WP_Query(array(
		'page_id' => $page_for_posts,
		'post_type'=> 'page',
	));
	//custom loop
	if($bloginfo_query->have_posts()){
		while($bloginfo_query->have_posts()){
			$bloginfo_query->the_post();
			echo $page_for_posts;

		}//end while
	}//end if 
	wp_reset_postdata();

}//end blog_info






/**
 * Technique for looping through the blog page using options to find the posts page
 *	Gets post info using get_ method 
 *	Fails to get content/excerpt, must use custom loop instead
 */

/*
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
<?php echo get_the_title($page_for_posts);
endif;
*/











add_action('wp_enqueue_scripts', 'delicioso_scripts');
function delicioso_scripts(){
	//attach jq
	wp_enqueue_script('jquery' );
	//attach script.js
	$js_url =  get_stylesheet_directory_uri().'/js/script.js';
	//								handle 			 url 		dependancies     ver 	in footer
	wp_enqueue_script('delicioso_js', $js_url, array('jquery'));
	//attach html5.js
	$html5_url =  get_stylesheet_directory_uri().'/js/html5.js';
	//								handle 			 url 		dependancies     ver 	in footer
	wp_enqueue_script('html5', $html5_url);
}



//No Close PHP!