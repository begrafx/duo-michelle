<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		<footer role="contentinfo" class="grid_6 push_1">
<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

		&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> &nbsp; | &nbsp; Website by <a href="http://triggersandsparks.com">Triggers &amp; Sparks</a>
					</footer><!-- footer -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>





   <script>
     jQuery(document).ready(function(){
         // remove jetpack-created padding on subscribe box
         jQuery("#subscribe-field").css({'width': '', 'padding': ''});
     });    
   </script>
   
  
  

  </div><!-- end container div-->
	</body>
</html>