<?php
/**
 *  Template Name: Archive Loop
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
      </header><!-- .page-header -->

      <?php
        $args = array( 
          'post_type' => 'post',
          'posts_per_page'	=> -1
        );
        $blog_posts = get_posts( $args ); 
        $categories =  get_categories( $args);
      ?>
      
      <div class="author-loop" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php foreach($blog_posts as $post): setup_postdata ($post); ?>
        <a href="<?php the_permalink()?>">
						<h2><?php the_title() ?></h2>
              </a>
                   
			<?php endforeach; ?>
			<?php  wp_reset_postdata(); ?>
      </div> 	<!-- journal-grid -->

      <div class="category-loop" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <?php foreach($categories as $category): setup_postdata ($category); ?>
      <a class="button-text" href="<?php echo get_category_link($category); ?>">
        <li><?php echo $category->cat_name ?></li>
              </a>
                   
			<?php endforeach; ?>
			<?php  wp_reset_postdata(); ?>
      </div> 	<!-- journal-grid -->
      


      <ul>
        <?php 
        $wptc = wp_tag_cloud('smallest=12&largest=12&orderby=count&order=DESC&format=array&unit=px&echo=0'); 
        foreach( $wptc as $wpt ) echo "<li>" . $wpt . "</li>\n"; 
        ?>
      </ul>



		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
