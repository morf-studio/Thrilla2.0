<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Thrilla_2.0
 */

get_header(); ?>

		<div class="col col-12 l-col-9 m-pad-m">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :?>
					<div class="bg-white pad-l mar-t-s">
						<?php  comments_template(); ?>
					</div>
			<?php
				endif;
			?>

			<footer class="col col-12 cf">
				<!-- pagination -->
				<div class="pagination text-center flex flex-row">
					<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>

								 <?php
										$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $prev_post->ID ), 'featured');
										$img_id = get_post_thumbnail_id( $prev_post_id );
										$alt_text = get_post_meta($prev_post->ID, '_wp_attachment_image_alt', true);
								 ?>
								<div class="previous-post flex-auto bg-cover overflow-hidden" style="background-image:url(<?php echo $featured_image[0]; ?>);">
									<a href=" <?php echo get_permalink( $prev_post->ID ); ?> " class="block pad-y-xl pad-x-l bg-black-2 height-fill link link--white" >
											<h6 class="caps"> Previous </h6>
											<h2> <?php echo $prev_post->post_title; ?> </h2>
									</a>
								</div>
					<?php endif; ?>

					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>

								<?php
									 $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $next_post->ID ), 'featured');
									 $img_id = get_post_thumbnail_id( $next_post_id );
									 $alt_text = get_post_meta($next_post->ID, '_wp_attachment_image_alt', true);
								?>
								<div class="next-post flex-auto bg-cover overflow-hidden" style="background-image:url(<?php echo $featured_image[0]; ?>);">
									<a href="<?php echo get_permalink( $next_post->ID ); ?>" class="block pad-y-xl pad-x-l bg-black-2 height-fill link link--white" >
										<h6 class="caps"> Next </h6>
										<h2> <?php echo $next_post->post_title; ?> </h2>
									</a>
							</div>
					<?php endif; ?>

				</div><!-- pagination -->
			</footer>


		</div>

		<div class="col col-12 l-col-3 pad-m">
			<?php get_sidebar(); ?>
		</div>


		<?php endwhile; // End of the loop. ?>

<?php
get_footer();
