<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Beautiful_Reader
 */

get_header(); ?>

    <!-- Increases the post views count by 1. -->
    <?php setPostViews(get_the_ID()); ?>

    <?php 
        $post_name = $post->post_name;
     ?>

	<div id="primary" class="content-area">

        <aside class="post-sidebar">
            <?php 

            $args = array( 
                'post_type'    => 'post',
                'posts_per_page'  => 6,  /* get n posts, or set -1 for all */
                'orderby'      => 'meta_value_num',  /* this will look at the meta_key you set below */
                'meta_key'     => 'post_views_count',
                'order'        => 'DESC',
                'post_status'  => 'publish',
                'date_query'   => array( /* Retrieves only posts from the past month. */
                        array(
                            'after'  => '1 month ago',
                        ),
                    ),
            );

            $top_posts = new WP_Query( $args );

            if ( $top_posts->have_posts() ) { ?>
            
                <?php while ( $top_posts->have_posts() ) {
                        $top_posts->the_post();

                        // Don't show the current post in the list.
                        if ( $post_name !== $post->post_name ) {
                            get_template_part( 'template-parts/content-card');
                        }
                        
                }
            }
            wp_reset_postdata();

     ?>
        </aside>

		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
