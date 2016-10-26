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



				<article id="post-<?php the_ID(); ?>" <?php post_class('grid_6 push_1 alpha'); ?>>




					<?php the_post_thumbnail('book-preview', array('class' => 'feature'));?>
				<div class="preview <?php echo $author; ?>">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<h4><?php echo get_post_meta($post->ID, 'wpcf-subtitle', true) ; ?><br />
					 by <?php echo $authorname; ?></h4>

					 <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,50); ?></p>


					<?php
					$sample = get_post_meta($post->ID, 'wpcf-sample', true);
					if ($sample != "") {
						echo '<a href="'.$sample.'">Read the first chapter</a>';
					}
					?>
				</div>


					<div class="entry-content">

						<?php
						$content = get_the_content();
						$content = apply_filters('the_content', $content);
						$content = str_replace(']]>', ']]&gt;', $content);
						echo remove_leading_quote($content);
						?>

						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>



				 </div><!-- .entry-content -->







					<?php









					$type = 'tr';
					$name = "Trade paperback";
					include "details.php";


					$type = 'hc';
					$name = "Hardcover";
					include "details.php";


					$type = 'mm';
					$name = "Mass Market";
					include "details.php";

					$type = 'eb';
					$name = "eBook";
					include "details.php";

					$type = 'ab';
					$name = "Audiobook";
					include "details.php";


				?>









				<?php // Output other titles in the same series.

				// First, get all series attached to the post
				$series_terms = get_the_terms( 0, 'series' );

				if ( $series_terms ) :

					foreach ( $series_terms as $series_term)  :

						if ( 'featured' !== $series_term->slug ) :
							$title = $series_term->name;
							$slug = $series_term->slug;

							$args = array(
								'post_type' => 'books',
								'order' => 'ASC',
								'posts_per_page' => -1,
								'tax_query' => array(array('taxonomy' => 'series', 'field' => 'slug', 'terms' => $slug))
							);

							$current_post = the_title('','',false);
							$my_query = new WP_Query(); $my_query->query($args); ?>

							<h3>Other books in <a href="/series/<?php echo $slug; ?>"><?php echo $title; ?></a></h3>
							<ul>
								<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<?php if ($current_post != the_title('','',false)): ?>
										<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
									<?php endif;
								endwhile;
								wp_reset_postdata(); ?>
							</ul>


						<?php
						endif;
					endforeach;
				endif;
				?>
				</article><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
