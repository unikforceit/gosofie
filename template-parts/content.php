<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

?>  

<div id="post-<?php the_ID(); ?>" <?php post_class('single-blog-style-one'); ?>>    
    <?php if ( has_post_thumbnail()) : ?>
        <div class="img-box">

            <?php the_post_thumbnail('full'); ?>   
                                      
        </div>
    <?php endif; ?>
    <div class="text-box">
        <?php gosofie_category();?>
        <?php the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>
        <div class="meta-info">
            <?php gosofie_post_date();?>
            <?php gosofie_post_author();?>
        </div><!-- /.meta-info -->        
        <div class="entry_excerpt"><?php the_excerpt();?></div>

    </div><!-- /.text-box -->
</div><!-- /.single-blog-style-one -->




