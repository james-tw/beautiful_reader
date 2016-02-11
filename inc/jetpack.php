<?php
/**
 * Jetpack Compatibility File.
 *
 * @link https://jetpack.me/
 *
 * @package Beautiful_Reader
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.me/support/infinite-scroll/
 * See: https://jetpack.me/support/responsive-videos/
 */
function beautiful_reader_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'beautiful_reader_infinite_scroll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );

    add_theme_support( 'site-logo', array( 'size' => 'br-logo' ) );
    add_image_size( 'br-logo', 250, 80 );
}

add_action( 'after_setup_theme', 'beautiful_reader_jetpack_setup' );


/**
 * Return early if Site Logo is not available.
 */
function beautiful_reader_the_site_logo() {
    if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
        return;
    } else {
        jetpack_the_site_logo();
    }
}

/**
 * Custom render function for Infinite Scroll.
 */
function beautiful_reader_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
		    get_template_part( 'template-parts/content', 'search' );
		else :
		    get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
