<?php /* Template Name: Program */

get_header(); ?>

<div id="primary" class="content-area delavnice">
	<main id="main" class="site-main" role="main">
		<div class="container">

			<h1><?php echo get_the_title() ?></h1>

			<div class="calendar-workshops-month">



<!-- <h2 class="calendar-workshops-month-name">Marec</h2> -->

</div>

<div class="calendar-workshops row">
<!-- <div data-masonry='{ "itemSelector": ".calendar-workshop", "columnWidth": ".col-md-4" }' class="calendar-workshops row"> -->

	<?php
		// The Query
	$args = array( 'post_type' => 'workshops', 'order' => 'ASC' , 'orderby' => 'menu_order', 'posts_per_page'   => -1  );
	$the_query = new WP_Query( $args );


		// The Loop
	if ( $the_query->have_posts() ) {
		$i = 1;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			echo '<div class="calendar-workshop">';
				echo '<div><span class="calendar-workshop-date">' . get_field('datum_delavnice') . '</span></div>';
				echo '<h3>' . get_the_title() . '</h3>';
				echo '<div class="workshop-dude">Predavatelj: ' . get_field('ime_predavatelja') . '</div>';
				echo '<div class="workshop-links">';
					echo '<a class="vec" data-target="demo' . $i .'">več</a>';
					echo '<a class="btn-prijava prijava-packa" href="' . get_field('prijava') . '">Prijava</a>';
				echo '</div>';
			echo '</div>';

			echo '<div class="calendar-workshop-more demo' . $i .' col-md-12">';
				echo '<div class="row">';

				echo '<div class="col-md-12">';
				echo '<h3 class="info-title">' . get_the_title() . '</h3>';
				echo '<div class="info"><strong>';
					echo get_field('lokacija') . ' || ' . get_field('cas_delavnice') . '</strong><br><br>';
					echo '<a class="btn-prijava" href="' . get_field('prijava') . '">Prijava</a>';
				echo '</div>';
			echo '</div>';

			echo '<div class="workshop-desc col-md-12">' . get_field('opis_delavnice') . '</div>';
			echo '<hr>';
			echo '<div class="row">';
				echo '<div class="col-md-6">';
					echo '<img src="' . get_field('slika_predavatelja') . '"/>';
				echo '</div>';
				echo '<div class="col-md-6">';
					echo '<div class="workshop-dude-more">' . get_field('opis_predavatelja') . '</div>';
				echo '</div>';
			echo '</div>';
			echo '</div>';
			echo '</div>';
			$i++;
		}
		/* Restore original Post Data */
		wp_reset_postdata();

	} else {
		// no posts found
		echo '<div>Trenutno ni objavljenjih nobenih delavnic. Oglasi se kasneje. :)</div>';
	}

	?>
</div><!-- .calendar-workshops -->
</div><!-- .container -->
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
