<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
</div>
<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mamieoiiz
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					// the_archive_description( '<div class="archive-description">', '</div>' );
					$tags = get_tags();
					$html = '<ul class="nav nav-tabs">';
					$html .= "<li class='active'><a href='#overall' data-toggle='tab' title='overall Tag' class='overall'> Overall </a></li>";
					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );
						$html .= "<li><a href='#{$tag->slug}' data-toggle='tab' title='{$tag->name} Tag' class='{$tag->slug}'>";
						$html .= "{$tag->name}</a></li>";
					}
					$html .= '</ul>';
					echo $html;
				?>
			</header><!-- .page-header -->
			<div class="blog-feed">
				<div class="container">
					<div class="row tab-content"> <?php 
					echo '<div id="overall" class="tab-pane fade in active">';
					while ( have_posts() ) : the_post(); ?>
						<div class="col-md-4 single-post"><div>
						<div class="img-heading"> <?php /*

						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						echo get_the_post_thumbnail( null, 'post-thumbnail', '' ); ?></div> 
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
						?> <a href="" class="btn">Read more</a></div></div> <?php
					endwhile;
					echo '</div>';
					$tags = get_tags();
					$html = '';

					foreach ( $tags as $tag ) {
						$tag_link = get_tag_link( $tag->term_id );
						echo "<div id='{$tag->slug}' class='tab-pane fade'>";
						$original_query = $wp_query;
						$wp_query = null;
						$args=array('posts_per_page'=>10, 'tag' => $tag->slug);
						$wp_query = new WP_Query( $args );
						if ( have_posts() ) :
							while ( have_posts() ) : the_post(); ?>
								<div class="col-md-4 single-post"><div>
								<div class="img-heading"> <?php /*

								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */

								echo get_the_post_thumbnail( null, 'post-thumbnail', '' ); ?></div> 
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
								?> <a href="" class="btn">Read more</a></div></div> <?php
							endwhile;
						endif;
						$wp_query = null;
						$wp_query = $original_query;
						echo "</div>";
						wp_reset_postdata();
					}
					/* Start the Loop */
					
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
		</div>
		</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
