<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thrilla_2.0
 */

get_header(); ?>

<section class="col col-12 m-col-8 l-col-9 m-pad-m">
	<?php query_posts(array( 'post__in' => get_option( 'sticky_posts' ) ) ); ?>

		<?php if (have_posts()): ?>
		<header class="index hero relative cf mar-b-m">
			<div class="absolute top-0 left-0 z1 pad-y-s pad-x-m bg-black">
				<span class="caps h5 white-6">Features</span>
			</div>
			<div class="slider">
					<?php while (have_posts()) : the_post(); ?>
					<div>
						<div class="slide">

							<?php if ( has_post_thumbnail() ): ?>
									<?php
										$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured');
										$img_id = get_post_thumbnail_id( $post_id );
										$alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
								?>

								<div class="featured-image-hero">
									<div class="featured-image-layout">
										<a class="permalink" href="<?php the_permalink(); // Get the link to this post ?>">
												<img src="<?php echo $featured_image[0]; ?>" alt="<?php echo $alt_text; ?>" >
										</a>
									</div>
								</div>

							<?php endif; ?>


							<div class="header-content absolute top-0 left-0 bottom-0 right-0 flex">
									<div class="header-content-inner mar-y-auto mar-x-auto text-center pad-l">
										<h6>
											<?php $category = get_the_category();
										if($category[0]){
										echo '<a class="category-link link--white border pad-y-s pad-x-m" href="'.get_category_link($category[0]->term_id ).'">

											'.$category[0]->cat_name.'
										</a>';
										}
										?>
										</h6>
									<h1 class="title">
										<a class="permalink link--white" href="<?php the_permalink(); // Get the link to this post ?>">
											<?php the_title(); // Show the title of the posts as a link ?>
										</a>
									</h1>
								</div>
							</div>

						</div>
					</div>
				<?php endwhile; ?>
			</div>
	</header>
	<?php endif; ?>

	<?php wp_reset_query(); ?>


	<?php query_posts( array( 'post__not_in' => get_option( 'sticky_posts' ) )); ?>

			<?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/index', 'content' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

	<?php wp_reset_query(); ?>

</section>

<section class="col col-12 m-col-4 l-col-3 pad-m">
	<?php get_sidebar(); ?>
</section>

<?php get_footer();
