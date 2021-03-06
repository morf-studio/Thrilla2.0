<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thrilla_2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="content">

	<div class="media bg-white pad-m">
		<div class="col col-12 m-col-8 pad-r-l">
			<div class="post-meta h5">
				<span class="post-date caps mar-r-m"> <?php the_time('d.M.y'); ?> </span>
				<span class="category caps">
					<?php $category = get_the_category();
					if($category[0]){
					echo '<a class="category-link" href="'.get_category_link($category[0]->term_id ).'">

						'.$category[0]->cat_name.'
					</a>';
					}
					?>
				</span>
			</div>

			<a class="permalink" href="<?php the_permalink(); ?>">
				<h2 class="title">
					<?php the_title(); // Show the title of the posts as a link ?>
				</h2>
			</a>

		</div>

	</div>
</article><!-- #post-## -->
