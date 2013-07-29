<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the class=container div and all content after
 *
 * @package required+ Foundation
 * @since required+ Foundation 0.1.0
 */
?>

<?php do_action('required_after_content'); ?>
		<?php
			/*
				A sidebar in the footer? Yep. You can can customize
				your footer with three columns of widgets.
			*/
			if ( ! is_404() )
				get_sidebar( 'footer' );
		?>
		
		<?php do_action('required_before_footer'); ?>
		
		<footer id="footer" class="row">
			<div class="large-12 columns">
				<hr />
			</div>
			<div class="large-4 columns">
				<?php do_action( 'required_credits' ); ?>
				<p><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'requiredfoundation' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'requiredfoundation' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'requiredfoundation' ), 'WordPress' ); ?></a></p>
			</div>
			<div class="large-8 columns">
				<?php wp_nav_menu( array(
					'theme_location' => 'secondary',
					'container' => false,
					'menu_class' => 'inline-list right',
					'fallback_cb' => false
				) ); ?>
			</div>
		</footer>
		
		<?php do_action('required_after_footer'); ?>
	
	<?php wp_footer(); ?>
</body>
</html>