<?php 
/*
Template Name: Menu
*/
 
//edit these to match the stuff you registered in your custom post type plugin
$post_type = 'menuitem';
$taxonomy = 'menuitemcat'; ?>

<?php get_header(); ?>
<main class="content">

<?php         

//TODO Main Loop for featured and content


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
<article>
    <h3><?php the_title(); ?></h3>
    <p><?php the_content( ); ?></p>
    <?php the_post_thumbnail(); ?>
</article>

<?php 
        endwhile; 
    endif;
endforeach;
?>
</main>
<?php get_sidebar() ?>
<?php get_footer() ?>