<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Thrilla_2.0
 */

get_header(); ?>


		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		?>

			<footer>
				<!-- pagination -->
				<div class="pagination">

					<?php
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<div class="previous-post">
							<h6> Previous </h6>
								<a href="<?php echo get_permalink( $prev_post->ID ); ?>">
									<?php echo $prev_post->post_title; ?>
								</a>
							</div>
					<?php endif; ?>


					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
						<div class="next-post">
							<h6> Next </h6>
								<a href="<?php echo get_permalink( $next_post->ID ); ?>">
									<?php echo $next_post->post_title; ?>
								</a>
							</div>
					<?php endif; ?>

				</div><!-- pagination -->
			</footer>

		<?php endwhile; // End of the loop. ?>


<?php
get_sidebar();
get_footer();
