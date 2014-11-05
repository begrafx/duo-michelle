<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>



<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'boilerplate' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'boilerplate' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php while ( have_posts() ) : the_post(); ?>




	         <?php
	          // determine which author is being used!
            $author = get_post_meta($post->ID, 'wpcf-author', true);
            if ($author == "1") {
              $author = "sagara";
              $authorname = "<span class=\"sagara\">Michelle Sagara</span>";
            } elseif ($author == "2") {
              $author = "west";
              $authorname = "<span class=\"west\">Michelle West</span>";
            } elseif ($author == "3") {
              $author = "sagarawest";
              $authorname = "Michelle Sagara West";
            } 
	          ?>
	
	
	
				
				<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6 alpha'); ?>>
					

					
					
					<?php the_post_thumbnail('book-preview', array('class' => 'feature'));?>
        <div class="preview <?php echo $author; ?>">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <h4><?php echo get_post_meta($post->ID, 'wpcf-subtitle', true) ; ?>
          <br />by <?php echo $authorname; ?></h4>
           <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,50); ?></p>
        </div>	       
					
					
					
					
				</article><!-- #post-## -->





<?php endwhile; // End the loop. Whew. ?>

