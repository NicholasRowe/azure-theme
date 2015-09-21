<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rs
 */
?>

</div><!-- #content -->



<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="site-info">
		<a class="wp"  href="<?php echo esc_url( __( 'http://wordpress.org/', 'rs' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'rs' ), 'WordPress' );?></a>
		<?php printf( __( 'Theme: %1$s by %2$s.', 'rs' ), 'Azure', '<a href="http://rootshift.com/" rel="designer">Rootshift</a>' ); ?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
