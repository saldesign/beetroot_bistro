<?php 
/*
Template Name: Single
*/
 
//edit these to match the stuff you registered in your custom post type plugin
$post_type = 'menuitem';
$taxonomy = 'menuitemcat'; ?>

<?php get_header(); ?>

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

<main class="content">
    <div class="main container">
        <?php the_content( ); ?>
    </div>
<?php
if(is_page(1719)){
    ?>
    <div class="booking container">
        <?php dynamic_sidebar('booking-sidebar'); //add booking widget area ?>
    </div>
    <?php
}
?>

 
</main>
<?php get_footer() ?>