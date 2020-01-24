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
	<div class="container">
		<div class="footer-menu">
			<div class="footer-menu__menu">
				<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
			</div>
			<div class="footer-menu__social">
				<a href="https://www.instagram.com/cistfreesn/"
					target="_blank"
					class="footer-menu__social-link social-link-instagram">
					<i class="fab fa-instagram"></i>
				</a>
				<a href="https://www.facebook.com/freesn.natecaj/"
					target="_blank"
					class="footer-menu__social-link social-link-facebook">
					<i class="fab fa-facebook"></i>
				</a>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php global $template; echo basename($template); ?>

<?php wp_footer(); ?>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://kit.fontawesome.com/d35379714b.js" crossorigin="anonymous"></script>
</body>
</html>
