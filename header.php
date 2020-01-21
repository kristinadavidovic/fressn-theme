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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

<!-- Latest compiled and minified JavaScript -->
<script async type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'freesn' ); ?></a>
	<div class="container">
		<div class="navbar-logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php bloginfo('template_directory');?>/img/logo.png">
			</a>
		</div>
		<div class="navbar-header">
			<header role="banner">
				<nav id="site-navigation" class="main-navigation" role="navigation">

					<button class="menu-toggle"><i class="fas fa-bars"></i></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav>
			</header>
		</div><!--/.navbar-header -->
	</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

				<div class="bg-image">
					<img src="/wp-content/uploads/2019/02/Cover_spletna_stran.jpg">
				</div>
