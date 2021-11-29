<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */
get_header();
if ( is_active_sidebar( 'sidebar-1' ) ) {
    $main = 'col-md-8';
    $sidebar = 'col-md-4';
} else {
    $main = 'col-md-12';
    $sidebar = 'col-md-12';
}
?> 
    <section class="blog-page blog-style-one">
        <div class="container">
            <div class="row">
                <div class="<?php echo esc_attr($main);?>">
                    <div class="blog-details-content">

						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
                </div>
            </div>
            <div class="<?php echo esc_attr($sidebar);?>">
                <?php get_template_part( 'layouts/sidebar', 'left' ); ?>                        
            </div>            
        </div>
    </section>

<?php get_footer();?>
