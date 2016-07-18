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

	<div class="media bg-white cf">

		<div class="float-r col-12 m-col-4 pad-m">
			<?php get_template_part('template-parts/module','thumbnail') ?>
		</div>

		<div class="col col-12 m-col-8 pad-m relative">
			<div class="post-meta h5 absolute top-0 left-0">
				<span class="category caps">
					<?php $category = get_the_category();
					if($category[0]){
					echo '<a class="category-link bg-black-8 link--white pad-y-xs pad-x-m mar-r-m" href="'.get_category_link($category[0]->term_id ).'">

						'.$category[0]->cat_name.'
					</a>';
					}
					?>
				</span>
				<span class="post-date caps mar-r-m"> <?php the_time('d.M.y'); ?> </span>

			</div>

			<a class="permalink" href="<?php the_permalink(); ?>">
				<h2 class="title mar-t-l">
					<?php the_title(); // Show the title of the posts as a link ?>
				</h2>
				<?php the_excerpt(); ?>
			</a>
			<a class="link-border" href="<?php the_permalink(); ?>">
				<p class="h5 bold caps--tracked"> READ MORE &rarr; </p>
			</a>

		</div>

	</div>
</article><!-- #post-## -->
