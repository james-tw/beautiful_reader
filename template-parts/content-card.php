<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Beautiful_Reader
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('card'); ?> style="background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id()); ?>)">

        <div class="card__overlay">
            <a class="card__link" href="<?php the_permalink(); ?>"></a>
          

            <?php
                $category = get_the_category();
                if ( in_category('featured') OR in_category('breaking') OR in_category('opinion') ) {
                  echo '<span class="card__badge">' . $category[0]->name.'</span> ';
                }
            ?>
            
            <div class="card__text">
                <!-- <span class="card__date"><?php the_date(); ?></span> -->
                <?php
                    if ( is_single() ) {
                        the_title( '<h1 class="entry-title card__title">', '</h1>' );
                    } else {
                        the_title( '<h1 class="entry-title card__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    }
    
                if ( 'post' === get_post_type() ) : ?>
                <?php
                endif; ?>
                <span class="card__author">By <?php the_author(); ?></span>
            </div>
            
        </div>
</article><!-- #post-## -->
