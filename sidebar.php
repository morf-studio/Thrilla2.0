<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Thrilla_2.0
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<section class="widget">
		<form role="search" method="get" class="search-form relative" action="http://thrillderness.co/">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Seek and Enjoy" value="" name="s">
			</label>
			<button type="submit" class="search-submit" value="" >
				<svg class="icon-compass"> <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-compass"> </use>  </svg>
			</button>
		</form>
	</section>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
