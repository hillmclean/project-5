<?php
/**
 *  Template Name: Archive Loop
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <?php
	$args = array( 
    'field' => 'slug',
	);
	$products = new WP_Query($args);
	?>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
      </header><!-- .page-header -->
      
      <?php 
      $args = array(
        'post-type'=> 'post',
      );
      $quotes = get_posts ($args); ?> 

<ol>
  <?php 
  $wptc = wp_tag_cloud('smallest=12&largest=12&orderby=count&order=DESC&format=array&unit=px&echo=0'); 
  foreach( $wptc as $wpt ) echo "<li>" . $wpt . "</li>\n"; 
  ?>
</ol>



      <?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					get_template_part( 'template-parts/content' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
