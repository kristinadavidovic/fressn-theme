<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freesn
 */

get_header();
?>
	<div class="container archive-partners">
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1>
					<?php _e('Partnerji', 'freesn');?>
				</h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<div class="archive-partners__content">

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					the_posts_navigation();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
			</div>
	</div>

<?php
// get_sidebar();
get_footer();
