<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>


       				
		<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6 push_1 alpha'); ?>>
	
  		<!-- DATE AND COMMENTS "STAMP" -->
  		<div class="entry-meta">
  		<div class="entry-month"><?php echo get_the_date(F); ?></div>
  		<div class="entry-day"><?php echo get_the_date(j); ?></div>
  		 <?php comments_popup_link( __( 'Leave a comment', 'boilerplate' ), __( '1 Comment', 'boilerplate' ), __( '% Comments', 'boilerplate' ) ); ?> 
  		</div><!-- .entry-meta -->
  
  		
        <!-- POST TITLE -->
        <div class="title-box">
  			<h2 class="entry-title"><?php the_title(); ?></h2>
  			</div><!-- .title-box -->
  					
  			
  			<!-- POST TAGS/CATEGORIES -->		
  			<div class="entry-details"><?php boilerplate_posted_in(); ?>
  			<?php
  			$tags_list = get_the_tag_list( '', ', ' );
  			if ( $tags_list ):
  		?>
  			<?php printf( __( 'Tagged %2$s', 'boilerplate' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
  			|
  		<?php endif; ?>
  			</div><!-- .entry-details -->
  			
  					
  
      <!-- POST CONTENT -->
      <div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
					</div><!-- .entry-content -->
					
				</article><!-- #post-## -->
				
				
				<!-- LOWER NAVIGATION -->
				<nav id="nav-below" class="navigation grid_6 push_1 alpha">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'boilerplate' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'boilerplate' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->
				
				
				<!-- COMMENTS -->
				<div class="grid_6 push_1 alpha omega clearfix comments">
				
				
				<?php comments_template( '', true ); ?>
				</div>

<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
