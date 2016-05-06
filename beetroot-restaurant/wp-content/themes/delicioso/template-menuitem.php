<?php 
/*
Template Name: Menu
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
<?php         
// Gets every term in this taxonomy
$terms = get_terms( $taxonomy );

//go through each term in this taxonomy one at a time
foreach( $terms as $term ) : 

    //get ONE post assigned to this term
    $custom_loop = new WP_Query( array(
        'post_type' => $post_type,
        'taxonomy' => $taxonomy,
        'term' => $term->slug,
        ) );
    
    //LOOP
    if( $custom_loop->have_posts() ): ?>
    <h2><?php echo $term->name; ?></h2>
    <?php
        while( $custom_loop->have_posts() ) : $custom_loop->the_post(); ?>
<article class="cf">
    <div>
        <h3><?php the_title(); ?></h3>
        <?php the_content( ); ?>
    </div>
    <?php the_post_thumbnail(); ?>
</article>

<?php 
        endwhile; 
    endif;
endforeach;
?>
</main>
<?php get_footer() ?>