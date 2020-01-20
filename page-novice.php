<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package freesn
 */

get_header(); ?>

			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="section-title"><a id="novice">NOVICE</a></h1>
						<?php
							// The Query
							query_posts(  'posts_per_page=3'  );
							// The Loop
							while ( have_posts() ):
								the_post();
								echo '<div class="row text-justify">';
								echo '<div class="col-md-2">';
								echo '<div class="post-date-month">' . get_the_date('M') . '</div>';
								echo '<div class="post-date-num">' . get_the_date('d') . '<br></div>';
								echo '</div>';
								// the_title();
								echo '<div class="col-md-10">';
								echo '<div class="post-content text-14">';
								the_excerpt_max_charlength( 270, get_permalink() );
								echo '</div></div></div>';
							endwhile;
							// Reset Query
							wp_reset_query();
						?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
