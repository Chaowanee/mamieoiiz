<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mamieoiiz
 */

if ( ( !is_front_page() && !is_home() ) ) : 
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		return;
	}
	?>
	<aside id="secondary" class="widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary -->
<?php	
else : ?>
	<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- #secondary --> 

	<div class="clearfix"></div></div> <?php 
endif; ?>


