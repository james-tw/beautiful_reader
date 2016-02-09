<?php
/**
 * Template part for displaying lists of posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beautiful_Reader
 */

?>

<section class="article-list">
    <h3 class="article-list__title">Top Posts</h3>

        <?php 

                $argsz = array( 
                    'post_type'    => 'post',
                    'posts_per_page'  => 3,  /* get 3 posts, or set -1 for all */
                    'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
                    'meta_key'     => 'post_views_count',
                    'order'        => 'DESC',
                    'post_status'  => 'publish',
                    'date_query'   => array( /* Retrieves only posts from the past 2 weeks. */
                            array(
                                'after'  => '2 weeks ago',
                            ),
                        ),
                );

                $top_posts = new WP_Query( $argsz );

                
                if ( $top_posts->have_posts() ) { ?>
                
                    <?php while ( $top_posts->have_posts() ) {

                            $top_posts->the_post();
                
                            // get_template_part( 'template-parts/content-card');
                            ?>
                            <a class="article-list__link" href="<?php the_permalink(); ?>"><?php the_title(); ?>
                            <?php if ( get_comments_number() > 0 ) { ?>

                                <span class="article-list__comments-number">
                                    <?php
                                        // printf( // WPCS: XSS OK.
                                        //     esc_html( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'beautiful_reader' ) ),
                                        //     number_format_i18n( get_comments_number() )
                                        // );
                                        
                                        echo get_comments_number();
                                    ?>
                                </span>

                                <?php } ?>
                                
                            </a>
                            <?php
                    }
                }
                
                wp_reset_postdata();

         ?>
         <div class="article-list__footer">
             <a class="article-list__more" href="#">See More</a>
         </div>
    
        
</section><!-- #post-## -->
