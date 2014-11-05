<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<title><?php wp_title(); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
  <!-- load @font-face fonts -->
  <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/fonts/prociono/stylesheet.css" />
  <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/fonts/cartogothic/stylesheet.css" />
  <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/fonts/laportenia/stylesheet.css" />
  
  
  <!-- Load cssSandpaper scripts for better ie support --> 
  <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/EventHelpers.js"></script>
  <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/cssQuery-p.js"></script>
  <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/sylvester.js"></script>
  <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/cssSandpaper.js"></script>
  <script type="text/javascript" src="<?php bloginfo( 'template_directory' ); ?>/js/selectivizr-min.js"></script>
  
    
  
  
  <!-- icons & favicons (for more: http://themble.com/support/adding-icons-favicons/) -->
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
  
  
  <!-- 960 stylesheet -->
  <link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/960/960.css" />

		
		
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
		
?>
				<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />





	</head>
	<body <?php body_class(); ?>>
	<div class="container_12">
	
			<nav id="access" role="navigation" class="grid_12">
		  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'boilerplate' ); ?>"><?php _e( 'Skip to content', 'boilerplate' ); ?></a>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #access -->
		
			<header role="banner" class="grid_7">
			<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p><?php bloginfo( 'description' ); ?></p>
		</header>

		
		
		
		<section id="content" role="main" class="grid_8">
