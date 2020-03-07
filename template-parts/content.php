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
			<h2 class="cit-title"><?php the_title(); ?></h2>
		 		<?php if( get_post_meta('_qod_quote_source_url') ): ?>
				<a href="<?php get_post_meta('_qod_quote_source_url');?>">
				<?php endif; ?>	
		 		<p><?php get_post_meta('_qod_quote_source'); ?></p></a>
	
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->