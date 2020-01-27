<?php /* Template Name: Content container */

get_header(); ?>
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
	</div><!-- .container -->
<?php get_footer();
