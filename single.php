<?php
/**
 * The template single post page
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

			<article class="quote-box">

			<?php get_template_part( 'template-parts/content', 'single' ); ?>
			

			<!-- <?php the_post_navigation(); ?> -->

		<?php endwhile; // End of the loop. ?>

		</article>

		<button type="button" id="another-quote">Another Quote</button>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
