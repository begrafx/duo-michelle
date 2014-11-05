<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
							<article id="post-0" role="main" class="post error404 not-found grid_6 push_1 alpha">

        <h1 class="entry-title">404: Page not found</h1>	
				
				<p>The page you are looking for appears to have gone missing.</p>
				<p>Don't worry, it&rsquo;s probably still here somewhere. Try a search, perhaps?</p>
				<?php get_search_form(); ?>
				<script>
					// focus on search field after it has loaded
					document.getElementById('s') && document.getElementById('s').focus();
				</script>
			</article>
<?php get_footer(); ?>
