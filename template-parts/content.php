<?php
/**
 * Template part for displaying posts.
 *
 * @package QOD_Starter_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<p><?php the_excerpt(); ?></p>
		<div class="citation">
		 <?php the_title( sprintf( '<h2 class="entry-title">—</h2>' )); ?>
		 <?php get_post_meta('_qod_quote_source'); ?>
		 <?php get_post_meta('_qod_quote_source_url'); ?>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
