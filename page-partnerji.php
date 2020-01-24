<?php /* Template Name: Partnerji */

get_header(); ?>

<div id="primary" class="content-area partnerji">
	<main id="main" class="site-main" role="main">
		<div class="container">

			<h1>
				<?php echo get_the_title() ?>
			</h1>

			<div class="page-partners">
				<div class="page-partners-description">
					<?php echo the_content(); ?>
				</div>

				<?php
				// The Query
				$args = array(
					'post_type'      => 'partners',
					'hide_empty'     => 1,
					'depth'          => 1,
					'posts_per_page' => -1
				);
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						echo '<div class="partners__item">';
						echo '<a href="' . get_field('partner_website') . '" target="_blank" rel="noopener">';
						echo '<img class="" src="' . get_the_post_thumbnail_url() . '" />';
						echo '</a>';
						echo '</div>';
					}
					/* Restore original Post Data */
					wp_reset_postdata();

				} else {
					// no posts found
					echo '<div>Trenutno ni nobenega objavljenega partnerja.</div>';
				}

				?>
			</div><!-- .calendar-workshops -->
		</div><!-- .container -->
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
