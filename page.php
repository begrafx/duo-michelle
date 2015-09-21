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


				<?php if ( is_front_page() ) {
				  remove_filter ('the_content', 'wpautop');
				?>

				<?php } else { ?>
					<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php } ?>




   <?php if (is_page('bibliography')) { ?>

  <?php // let's list all the series

  $args = array( 'taxonomy' => 'series', 'exclude' => '34' );
  //$terms = get_terms('series', $args);
  $terms = apply_filters( 'taxonomy-images-get-terms', null, $args);
  //print_r($terms);
    foreach ($terms as $term) {
        $image_url = wp_get_attachment_image_src($term->image_id, 'book-preview');
        $description = $term->description;
    	  echo '<article class="grid_6 alpha">
                  	 <a href="/series/'.$term->slug.'" title="' . sprintf(__('%s', 'my_localization_domain'), $term->name) . '">
                  	 <img class="feature" src="'. $image_url[0].'"/></a>
    	               <div class="preview'. $author.'">
    	               <h2><a href="/series/'.$term->slug.'" title="' . sprintf(__('Books in the %s series', 'my_localization_domain'), $term->name) . '">'.$term->name.'</a></h2>
                    ';

    // and books in the series, too!
      $args = array(
      'numberposts' => -1,
      'order' => 'ASC',
      'post_type' => 'books',
      'series' => $term->slug,
      'post_status' => 'publish'
      );
      $books = get_posts ($args);
      // print_r($books);
      foreach ($books as $book) { ?>
        	<li><a href="/books/<?php echo $book->post_name; ?>"><?php echo $book->post_title; ?></a></li>

      <?php } ?>

      </div></article>

      <?php } ?>


   <?php } ?>






					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						<?php //edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->



				<?php if ( is_front_page() ) { ?>

				<?php // get featured book
      		$args = array(
         'numberposts' => 1,
         'post_type' => 'books',
         'series' => 'featured',
         'post_status' => 'publish'
        );
          $show_book = get_posts ($args);
            foreach ($show_book as $post) :  setup_postdata($post);
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

			<div class="grid_6 push_1 alpha">
		  <?php the_post_thumbnail('book-preview', array('class' => 'feature'));?>
        <div class="preview <?php echo $author; ?>">
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <h4><?php echo get_post_meta($post->ID, 'wpcf-subtitle', true) ; ?><br />
          by <?php echo $authorname; ?></h4>
           <p><?php $excerpt = get_the_excerpt(); echo string_limit_words($excerpt,50); ?></p>
        </div>
      <?php endforeach; ?>
      </div>

				  <div class="home-widget grid_7 alpha">
				  <ul><?php dynamic_sidebar( 'homepage-widget-area' ); ?></ul>
				  </div>

				  <div class="grid_8 push_1 alpha">
<?php
$args = array( 'taxonomy' => 'series', 'exclude' => '34' );
//$terms = get_terms('series', $args);
$terms = apply_filters( 'taxonomy-images-get-terms', null, $args);
//print_r($terms);
$count = count($terms); $i=0;
if ($count > 0) {
    foreach ($terms as $term) {
        $i++;
        $image_url = wp_get_attachment_image( $term->image_id, 'series-list' );
    	$term_list .= '<div class="series alignleft"><a href="/series/' . $term->slug . '" title="' . sprintf(__('%s', 'my_localization_domain'), $term->name) . '">'. $image_url.'</a><p><a href="/series/' . $term->slug . '" title="' . sprintf(__('Books in the %s series', 'my_localization_domain'), $term->name) . '">' . $term->name . '</a></p></div>';
    }
    echo $term_list;
}
?>
    </div>









				<?php } else { ?>
				<div class="grid_6 push_1 clearfix">
				  <?php comments_template( '', true ); ?>
				  </div>
				<?php } ?>


<?php endwhile; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
