<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Beautiful_Reader
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

        <?php get_sidebar( 'footer' ); ?>
        
		<div class="site-info">

			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'beautiful_reader' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'beautiful_reader' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'beautiful_reader' ), 'beautiful_reader', '<a href="http://underscores.me/" rel="designer">James TW</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
