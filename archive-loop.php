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

      <ul>
        <?php
      $our_title = get_title() ;
      foreach  ($our_title as $title)  echo '<li>'. $title->slug .'</li>';
      ?>
      </ul>

     
      <ul>
        <?php  $categories =  get_categories();
          foreach  ($categories as $category)  echo '<li>'. $category->cat_name .'</li>';
          ?>
      </ul>
      

      <ul>
        <?php 
        $wptc = wp_tag_cloud('smallest=12&largest=12&orderby=count&order=DESC&format=array&unit=px&echo=0'); 
        foreach( $wptc as $wpt ) echo "<li>" . $wpt . "</li>\n"; 
        ?>
      </ul>





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
