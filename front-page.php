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
    
                $latest_posts = new WP_Query('posts_per_page=8');
                $c = 0;
                
                if ( $latest_posts->have_posts() ) { ?>
                
                    <?php while ( $latest_posts->have_posts() ) {
                        $c++;


                            $latest_posts->the_post();
                
                            get_template_part( 'template-parts/content-card');

                        if ( $c == 3 ) {

                            get_template_part( 'template-parts/article-list');


                            $latest_posts->the_post();
                            
                            get_template_part( 'template-parts/content-card');
                        }
                
                        


                
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
