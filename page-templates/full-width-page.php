<?php
/**
 * Template Name: Full Width Page
 *
 * @package Beautiful_Reader
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'hero' ); ?>

    <?php endwhile; ?>

    <?php rewind_posts(); ?>


    <div class="content-wrapper full-width">
        <div id="primary" class="content-area">
            <div id="main" class="site-main" role="main">

                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'template-parts/content', 'page' ); ?>

                <?php endwhile; // end of the loop. ?>

            </div><!-- #content -->
        </div><!-- #primary -->
    </div><!-- .content-wrapper -->

<?php get_footer(); ?>