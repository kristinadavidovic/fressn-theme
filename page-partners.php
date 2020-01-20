<?php /* Template Name: Partnerji */

get_header(); ?>

<div id="primary" class="content-area partnerji">
	<main id="main" class="site-main" role="main">
		<div class="container">

			<h1><a id="partnerji"></a><?php echo get_the_title() ?></h1>

			Zahvaljujemo se vsem sodelujočim partnerjem.

			<div class="partners row move-down space-after">

				<?php
		// The Query
				$args = array( 'post_type' => 'partners', 'posts_per_page'   => -1 );
				$the_query = new WP_Query( $args );

		// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<div class="partnerji col-md-3">';
						echo '<a href="' . get_field('spletna_stran') . '" target="_blank" rel="noopener">';
						echo '<img class="alignnone size-medium wp-image-360 bandw border-partner" src="' . get_field('logotip') . '" alt="" width="300" height="269" />';
						echo '</a>';
						echo '</div>';
					}
					/* Restore original Post Data */
					wp_reset_postdata();

				} else {
		// no posts found
					echo '<div>Trenutno ni nobenega objavljenega partnerja. </div>';
				}

				?>
			</div><!-- .calendar-workshops -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
