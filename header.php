<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package freesn
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php bloginfo('template_directory');?>/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,700|PT+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->
<script async type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div class="maintenence-mode">
	<div class="text">
		Spletna stran je v pripravi.
	</div>
</div>
	<a class="skip-link screen-reader-text" href="#content">
		<?php _e( 'Skip to content', 'freesn' ); ?>
	</a>
	<div class="navbar-header">
		<header role="banner" class="header">
			<div class="navbar-logo">
				<?php
					if (function_exists('the_custom_logo')) the_custom_logo();
				?>
			</div>
			<nav id="site-navigation" class="main-navigation menu" role="navigation" >
				<input type="checkbox" id="menu-toggle-trigger" class="menu-toggle__input" />
				<label class="menu-toggle" for="menu-toggle-trigger">
					<span></span>
					<span></span>
					<span></span>
				</label>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
		</header>
	</div><!--/.navbar-header -->
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
