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
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script> -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script async type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script async src="<?php bloginfo('template_url'); ?>/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


<?php wp_head(); ?>
<!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-92049519-1', 'auto');
  ga('send', 'pageview');

</script> -->
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
				<!--<div class="main-caption">Študentski natečaj kreativnega komuniciranja</div>-->
