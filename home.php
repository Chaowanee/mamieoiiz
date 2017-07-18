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
	<div class="container">
	<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
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
				while ( have_posts() ) : the_post(); ?>
					<div class="col-md-12 single-post"><div>
					<div class="img-heading"> <?php /*

					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */

					echo get_the_post_thumbnail( null, 'post-thumbnail', '' ); ?></div> 
					<hr class="hr-category">
					<p class="category"> 
					<?php
					$posttags = get_the_tags();
					if ($posttags) {
					  foreach($posttags as $tag) {
					    echo $tag->name . ' '; 
					  }
					}
					?>  | <?php the_time('F j Y') ?></p>
					<?php get_template_part( 'template-parts/content', get_post_format());
					?> <p> <?php $excerpt = get_the_excerpt();  
					echo $excerpt ?> </p> <a href="" class="btn">Read more</a></div></div> <?php
				endwhile;
				/* Start the Loop */
					
				the_posts_navigation();

				else :
					get_template_part( 'template-parts/content', 'none' );
				endif; ?>
			</div>
		</div>
	</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
