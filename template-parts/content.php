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

			<?php 
			$meta_quote_src = get_post_meta( get_the_ID(), '_qod_quote_source', true );
			$meta_quote_src_url = get_post_meta( get_the_ID(), '_qod_quote_source_url', true ); ?>

			<p class='quote-author'> — <?php the_title(); ?><span class='quote-src-link'><a href="<?php echo $meta_quote_src_url ?>" target="_blank"><?php echo $meta_quote_src ?></a></span></p>
			
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-## -->