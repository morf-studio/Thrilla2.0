<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thrilla_2.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<title>
	<?php bloginfo('name'); // show the blog name, from settings ?> |
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
</title>

<script src="//use.typekit.net/jlv0gcd.js"></script>
<script>try{Typekit.load();}catch(e){}</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php include_once("icons/thrillderness.svg"); ?>

<div id="page" class="site max-width-xxxl float-center">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'thrilla2-0' ); ?></a>
	<header id="masthead" class="site-header pad-y-m m-pad-m cf" role="banner">
		<div class="site-branding float-l">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" id="logo" class="black">
				<svg class="icon-thrillderness bg-gradient--icon-thrill"> <use xlink:href="#icon-thrillderness"> </use>
					<defs>
						<linearGradient id="Gradient1" x1="0" x2="100%" y1="0" y2="0" gradientUnits="userSpaceOnUse" >
							<stop class="stop1" offset="0%"/>
							<stop class="stop2" offset="100%"/>
						</linearGradient>
					</defs>
				</svg>
			</a>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation float-r" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'thrilla2-0' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content m-pad-m" role="main">
