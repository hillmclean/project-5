<?php
/**
 * Template Name: Submit Quote Page
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

    <?php
global $post;
if ( ! is_user_logged_in() ) {
    ?>
    <p>
    Sorry, you must be logged in to submit a quote!
    </p>
    <a href="<?php admin_url() ?>">Click here to login.</a>
    <?php
} else { 
    ?>

      <form id="post-form" name="post-form" class="submit-form">

        <label for="title">Author of Quote
          <br>
          <input class="author-field" type="text" name="title" />
          <br>
        </label>

        <label for="content">Quote
          <br>
          <textarea class="quote-field" type="text" name="content" cols="5" rows="5">
          </textarea>
          <br>
        </label>

        <label for="source">Where did you find this quote? (e.g. book name)
          <br>
          <input class="reference-field" type="text" name="source" />
          <br>
        </label>

        <label for="url">Provide the URL of the quote source, if available.
          <br>
          <input class="url-field" type="url" name="quote-url" />
          <br>
        </label>

          <input class="form-submit" type="submit" name="submit" value="Submit Quote" />
      </form>

      <?php } ?>

		</main><!-- #main -->
  </div><!-- #primary -->
  

<?php get_footer(); ?>