<?php
/**
 * The template for displaying the front page.
 *
 * 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beautiful_Reader
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="" role="main">


            <div class="card__container">
                <?php
                
                // while ( have_posts() ) : the_post();
    
                //     get_template_part( 'template-parts/content', 'page' );
    
                //     // If comments are open or we have at least one comment, load up the comment template.
                //     if ( comments_open() || get_comments_number() ) :
                //         comments_template();
                //     endif;
    
                // endwhile; // End of the loop.
    
                $latest_post = new WP_Query('posts_per_page=9');
                
                if ( $latest_post->have_posts() ) { ?>
                
                    <?php while ( $latest_post->have_posts() ) {
                
                        $latest_post->the_post();
                
                        get_template_part( 'template-parts/content-card');
                
                    }
                }
                
                wp_reset_postdata();
                ?>
            </div> <!-- .card__container -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
