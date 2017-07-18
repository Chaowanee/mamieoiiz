<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mamieoiiz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.theme.css" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<!-- .skip the content -->
	<header id="masthead" class="site-header" role="banner">
		<!-- .site-branding -->
		<div class="top-banner text-center">
			<div class="opacity">
			<div class="logo">
				<h1 class="heading-font uppercase">MAMIEO</h1>
				<h3 class="uppercase font-18">Journey | Lifestyle | Stay | Dialy</h3>
			</div>	
			</div>
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="main-header">
				<div class="container">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->


	<?php
	if ( is_front_page() && is_home() ) : ?>
	<?php endif; ?>
	<div id="content" class="site-content">
