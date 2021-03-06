<?php
/**
 *  Template Name: Archive Loop
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main-archive-loop" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title-loops">', '</h1>' );
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
          <h2>Quote Authors</h2>
            <div class="loop-content">
              <?php foreach($blog_posts as $post): setup_postdata ($post); ?>
              <a href="<?php the_permalink()?>">
                  <p><?php the_title() ?></p>
                </a> 
                    
              <?php endforeach; ?>
              <?php  wp_reset_postdata(); ?>
            </div>
          </div> 	<!-- author-loop -->

          <div class="category-loop" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <h2>Categories</h2>
            <div class="loop-content">
              <?php  $categories = get_categories();
                  foreach ($categories as $cat) {
                    $category_link = get_category_link($cat->cat_ID);
                    echo '<a href="'.esc_url( $category_link ).'" title="'.esc_attr($cat->name).'">'.$cat->name.'</a>';
                  } ?>
            <div class="loop-content">
           </div> 	<!-- category-loop -->

    
          <div class="tag-loop">
          <h2>Tags</h2>
            <div class="loop-content">
              <?php 
              $wptc = wp_tag_cloud('smallest=1&largest=1&unit=rem&orderby=count&order=DESC&format=array&echo=0'); 
              foreach( $wptc as $wpt ) echo "<p>" . $wpt . "</p>\n"; 
              ?>

             </div> <!-- tag-loop -->



		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
