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
		<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
		<div class="footer-menu-social">
			Spremljaj nas na: <a href="https://www.instagram.com/cistfreesn/" target="_blank">
				<i class="fab fa-instagram fa-2x"></i>
			</a>
			 in <a href="https://www.facebook.com/freesn.natecaj/" target="_blank">
			 <i class="fab fa-facebook-square fa-2x"></i>
			 </a>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>
