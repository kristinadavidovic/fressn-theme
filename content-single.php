<?php
/**
 * @package freesn
 */
?>

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<header class="entry-header">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							<div class="entry-meta">
								<?php freesn_posted_on(); ?>
							</div><!-- .entry-meta -->
						</header><!-- .entry-header -->
						<div class="entry-content">
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'freesn' ),
									'after'  => '</div>',
								) );
							?>
						</div><!-- .entry-content -->
