<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Thrilla_2.0
 */

get_header(); ?>

		<div class="col col-12 m-col-8 l-col-9 pad-m">
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'single' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>
		</div>

		<div class="col col-12 m-col-4 l-col-3 pad-m">
			<?php get_sidebar(); ?>
		</div>

		<footer class="col col-12 cf border-top border-bottom pad-y-l">
			<!-- pagination -->
			<div class="pagination text-center flex flex-row">

				<?php
				$prev_post = get_previous_post();
				if (!empty( $prev_post )): ?>
					<div class="previous-post float-center">
						<h6 class="caps--tracked"> Previous </h6>
							<h2>
								<a class="link" href="<?php echo get_permalink( $prev_post->ID ); ?>">
									<?php echo $prev_post->post_title; ?>
								</a>
							</h2>
						</div>
				<?php endif; ?>

				<?php
				$next_post = get_next_post();
				if (!empty( $next_post )): ?>
					<div class="next-post float-center">
						<h6 class="caps--tracked"> Next </h6>
							<h2>
								<a class="link" href="<?php echo get_permalink( $next_post->ID ); ?>">
									<?php echo $next_post->post_title; ?>
								</a>
							</h2>
						</div>
				<?php endif; ?>

			</div><!-- pagination -->
		</footer>

		<?php endwhile; // End of the loop. ?>

<?php
get_footer();
