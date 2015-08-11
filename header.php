<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package playground
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/global.css ?> ">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="container hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'playground' ); ?></a>

		<header id="masthead" class="site-header" role="banner">

			
			<button class="menu toggle-nav">
				<span class="menu-global menu-top"></span>
				<span class="menu-global menu-middle"></span>
				<span class="menu-global menu-bottom"></span>
			</button>

			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<nav id="site-navigation" class="main-navigation overlay" role="navigation">

			<a href="#" class="overlay-close">&times;</a>

			<?php    /**
				* Displays a navigation menu
				* @param array $args Arguments
				*/
				$args = array(
					'theme_location' => 'primary',
					'menu' => '',
					'container' => false,
					'menu_class' => 'site-menu',
					'menu_id' => '',
					'echo' => true,
					'fallback_cb' => 'wp_page_menu',
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
					'depth' => 0,
					'walker' => ''
					);

					wp_nav_menu( $args ); ?>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->

			<div id="content" class="site-content">
