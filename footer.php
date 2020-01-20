<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package freesn
 */
?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="footer-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		<div class="footer-menu-social">
			Spremljaj nas na: <a href="https://www.instagram.com/cistfreesn/" target="_blank">
				<i class="fab fa-instagram fa-2x"></i>
			</a>
			 in <a href="https://www.facebook.com/freesn.natecaj/" target="_blank">
			 <i class="fab fa-facebook-square fa-2x"></i>
			 </a>
		</div>
	</div>
<!-- 	<div class="footer-info">
		<div class="col-md-3">
			Copyright © ŠSPRSS 2017
		</div>
		<div class="col-md-3" style="float: right;">

			<span style="font-size:14px;">Design: <a href="https://www.linkedin.com/in/denis-romozi-376181121/" target="_blank"> Denis Romozi</a></span>
			<span style="font-size:14px;">Izdelava: <a href="https://www.linkedin.com/in/kristina-davidovi%C4%8D-74828196" target="_blank"> Kristina Davidovic</a></span>
		</div>
	</div> -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>
