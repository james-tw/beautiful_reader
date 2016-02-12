<?php
/**
 * Beautiful Reader Theme Customizer.
 *
 * @package Beautiful_Reader
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function beautiful_reader_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    // $wp_customize->add_section('colors', array(
    //     'title' => __('Standard Colors', 'BeautifulReader'),
    //     'priority' => 30,
    // ));

    $wp_customize->add_setting('br_color_primary', array(
        'default' => '#E34842',
        'transport' => 'refresh',
    ));
    $wp_customize->add_setting('br_color_primary_light', array(
        'default' => '#E65F5B',
        'transport' => 'refresh',
    ));


    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'br_color_primary_control', array(
        'label' => __('Primary Color', 'BeautifulReader'),
        'section' => 'colors',
        'settings' => 'br_color_primary',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'br_color_primary_light_control', array(
        'label' => __('Primary Color - Light', 'BeautifulReader'),
        'section' => 'colors',
        'settings' => 'br_color_primary_light',
    ) ) );


    $wp_customize->add_section( 'toggle_sections', array(
        'title' => 'Toggle Sections',
    ) );

    // Toggle card widget area on front page
    $wp_customize->add_setting( 'front_page_card_widget', array(
        'default' => true,
        'transport'  =>  'refresh'
    ) );

    $wp_customize->add_control( 'front_page_card_widget', array(
        'section'   => 'toggle_sections',
        'label' => __('Show "card" widget area on front page?', 'BeautifulReader'),
        'type'      => 'checkbox'
    ) );

    // Toggle sidebar on single pages
    $wp_customize->add_setting( 'single_page_card_sidebar', array(
        'default' => true,
        'transport'  =>  'refresh'
    ) );

    $wp_customize->add_control( 'single_page_card_sidebar', array(
        'section'   => 'toggle_sections',
        'label' => __('Show sidebar of recent top posts on single pages? (Desktop only)', 'BeautifulReader'),
        'type'      => 'checkbox'
    ) );

}
add_action( 'customize_register', 'beautiful_reader_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function beautiful_reader_customize_preview_js() {
	wp_enqueue_script( 'beautiful_reader_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'beautiful_reader_customize_preview_js' );


// Output Customize CSS

function beautiful_reader_customize_css() { ?>
<style>
    a,
    a:link,
    a:visited {
        color: <?php echo get_theme_mod('br_color_primary') ?>;
    }
    a:hover {
        color: <?php echo get_theme_mod('br_color_primary_light') ?>;
    }


    .article-list__link:hover {
        color: <?php echo get_theme_mod('br_color_primary_light') ?>;
    }

    .main-navigation, 
    .main-navigation .search-field, 
    .main-navigation .menu-item a, 
    .card__badge,
    .article-list__comments-number,
    .tags-links a,
    .button--primary {
        background-color: <?php echo get_theme_mod('br_color_primary') ?>;
    }
    .article-list__comments-number::before {
        border-top-color: <?php echo get_theme_mod('br_color_primary') ?>;
    }

    .menu-item a:hover,
    .button--primary:hover,
    .button--primary:active,
    .button--primary:focus {
        background-color: <?php echo get_theme_mod('br_color_primary_light') ?>;
    }

    .search-field:focus, 
    .article-list__title,
    .comments-title {
        border-color: <?php echo get_theme_mod('br_color_primary') ?>;
    }

</style>

<?php
}
add_action('wp_head', 'beautiful_reader_customize_css');