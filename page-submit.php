<?php
/**
 * Template Name: Submit Quote Page
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <form class="submit-form">

        <label>Author of Quote
          <br>
          <input class="author-field" type="text" name="author" placeholder=" " />
          <br>
        </label>

        <label>Quote
          <br>
          <textarea class="quote-field" type="text" name="quote" cols="5" rows="5">
          </textarea>
          <br>
        </label>

        <label>Where did you find this quote? (e.g. book name)
          <br>
          <input class="reference-field" type="text" name="reference" placeholder=" " />
          <br>
        </label>

        <label>Provide the URL of the quote source, if available.
          <br>
          <input class="url-field" type="text" name="quote-url" placeholder=" " />
          <br>
        </label>

          <input class="form-submit" type="submit" value="Submit Quote" />
      </form>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>