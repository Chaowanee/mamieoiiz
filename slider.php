<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mamieoiiz
 */

get_header(); ?>
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content">
			<div class="slider"></div>
			<article class="container">
				<div class="row">
					<div class="blog-feed">
						<div class="row">
							<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) : ?>
									<article class="col-md-6 single-post">

									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
									</article>	
								<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) : the_post(); ?>
									
									<article class="col-md-6 single-post">				
									<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
									</article>	

								<?php endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>

						</div>
					</div>
				</div>
			</article>
		</div>
		

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
