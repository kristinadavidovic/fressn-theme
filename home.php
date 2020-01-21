<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package freesn
 */

get_header(); ?>

<div class="container">
	<p>
		Ker nam kreativa teče po žilah. Kreativa utripa v srcu. Kreativa je
		živa. Je povsod in nikjer. Je čudovita zmešnjava, romantičen upornik
		ali otroški raziskovalec. Skriva se v nas in se izraža skozi naše
		čute. Je ljubezen in je jeza. Je vsa čustva, ki nas navdihnejo in
		ustvarjajo umetnine znotraj nas. Izklopi um in vklopi svoje čute. Poišči tisto, kar prižiga tvoje srce.
		Prereži popkovino, ki te veže na udobje in zaživi s čist “frišnim”
		pogledom na življenje. Viva Kreativa!
	</p>
	<p>
		<strong>Za podrobnosti o samem natečaju ter pravilih in pogojih sodelovanja kliknite »več informacij«.</strong>
	</p>
	<h2>FREEŠN NATEČAJ</h2>
</div>

<div class="container">
	<div class="row move-down flex contest-categories">
		<!-- FOTOGRAIJA-->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="/natecaj-fotografija#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_kamera.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">FOTOGRAFIJA</div>
		</div>

		<!-- EVENT MANAGEMENT-->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="/natecaj-event-manegment#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_event_manegmant.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">EVENT MANAGEMENT</div>
		</div>

		<!-- VIRAL/VIDEO PRODUKCIJA -->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="video-produkcija#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_video.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">VIRAL/VIDEO PRODUKCIJA</div>
		</div>

		<!-- GRAFIČNO OBLIKOVANJET-->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="/natecaj-oblikovanje#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_oblikovanje.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">GRAFIČNO OBLIKOVANJE</div>
		</div>

		<!-- TEKSTOPISJE -->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="/tekstopisje-2#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_tekst.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">TEKSTOPISJE</div>
		</div>

		<!-- GLASBENI NATEČAJ -->
		<div class="contest-category">
			<div class="contest-category-img">
				<a href="/natecaj-glasba#naslov">
					<img src="/wp-content/uploads/2019/02/ikona_glasba.png" class="grow">
				</a>
			</div>
			<div class="contest-category-title">GLASBENI NATEČAJ</div>
		</div>
	</div>

	<div class="more-info">
		<a href="/natecaj#natecaj" class="packa">
			Več informacij
		</a>
	</div>
</div> <!-- </div>/container -->

<div class="container move-down">
	<div class="section-title">
		<h2>DELAVNICE KREATIVNIH VEŠČIN</h2>
	</div>
	<div>
		<p></p>
		Skozi celoten marec so poleg natečaja potekale tudi brezplačne delavnice kreativnih veščin, ki ne samo, da so vsem prijavljenim na natečaj olajšale pripravo zmagovalnega izdelka, ampak so ponudile tudi svež pogled na kreativnost. Delavnice so potekale na različne teme, vodili pa so jih strokovnjaki na svojih področjih.
		<br><br>
		<strong>Klikni »več informacij« za podrobnosti o programu in samih delavnicah.</strong>
	</div>

	<div class="more-info">
		<a href="/delavnice#program" class="packa">
			Več informacij
		</a>
	</div>
</div>

<div class="container move-down">
	<div class="section-title move-down">
		<h2>O PROJEKTU</h2>
	</div>
	<p></p>
	<div class="ossprss-text">
		<p class="text-14">
		freeŠn je projekt, ki je nastal zaradi želje in potrebe po kreativnem izražanju. Študentom omogoča izpopolnjevanje kreativnih veščin in tekmovanje na natečaju, ki prinaša privlačne nagrade. Organizira ga ŠS PRSS – Študentska sekcija Slovenskega društva za odnose z javnostmi, ki, kot neprofitno društvo združuje študente komunikologije, odnosov z javnostmi in drugih povezanih smeri. <br><br>
		<strong>Več informacij o projektu in samem društvu si lahko preberete na spodnji povezavi.</strong>
		</p>
	</div>
	<div class="more-info">
		<a href="/projekt#projekt" class="packa">
		Več informacij
		</a>
	</div>
</div>

<br><br>

<div class="container">
	<div class="section-title">
		<h2>PARTNERJI</h2>
		<hr>
		<p>Zahvaljujemo se vsem partnerjem, ki prispevajo k freeŠnu 2019.</p>
	</div>
	<div class="slider-partnerji">
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
			}
		?>
	</div>
</div>

<br><br>
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
