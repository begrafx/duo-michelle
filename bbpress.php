<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6 push_1 alpha'); ?>>
				
				

					
					<div class="entry-content">
						<?php the_content(); ?>
						<?php //wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						<?php //edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						
						<div id="forum_register">
						<?php 
						if (! is_user_logged_in() ) {
							wp_loginout($_SERVER['REQUEST_URI']);
							wp_register(__(' or '));
						}
						?>
						</div>
						
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
								
				
<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>