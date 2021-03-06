<?php
/**
 * The template for displaying the footer.
 *
 * @package QOD_Starter_Theme
 */

?>
<div class="quote-icon-box">
<i class="fas fa-quote-right quote-icon"></i>
</div>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer" role="contentinfo">

				<nav id="site-navigation" class="main-navigation" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu') ); ?>
				</nav><!-- #site-navigation -->

				<div class="site-info">
					<a href="<?php echo esc_url( 'https://wordpress.org/' ); ?>"><?php printf( esc_html( 'Brought to you by %s' ), '<span class="site-creator">Hillary</span>' ); ?></a>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>
