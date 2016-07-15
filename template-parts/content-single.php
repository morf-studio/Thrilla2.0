<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thrilla_2.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="hero relative bg-white">
		<?php if ( has_post_thumbnail() ): ?>

				<?php
					$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'featured');
					$img_id = get_post_thumbnail_id( $post_id );
					$alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
			?>

				<div class="featured-image-hero">
				<div class="featured-image-layout">
						<img class="width-100" src="<?php echo $featured_image[0]; ?>" alt="<?php echo $alt_text; ?>"	>
				</div>
			</div>

		<?php endif; ?>

		<div class="header-content bg-black-9 cf pad-l">
			<!-- <div class="vertical-center float-center text-center white"> -->

			<div class="col col-12">
				<h6>
					<?php
				$category = get_the_category();
				if($category[0]){
				echo '<a class="category-link link--on-dark" href="'.get_category_link($category[0]->term_id ).'">
					'.$category[0]->cat_name.'
				</a>';
				}
				?>
				</h6>
				<h1 class="title white mar-0"><?php the_title(); // Display the title of the post ?></h1>

				<?php if(get_field('the_subtitle')): ?>
					<p class="h2 subtitle mar-b-s white-9"> <?php the_field('the_subtitle'); ?>	</p>
				<?php endif; ?>
			</div>
			<!-- </div> -->
			<div class="col col-12">
				<span id="date" class="caps h5 white-6"> <?php the_time('d.M.Y') ?> </span>
			</div>
		</div>



	</header>





	<div class="the-content pad-m bg-white cf">


			<div class="front-matter col col-12 xl-col-3 pad-m">
				<?php if(get_field('front_matter')): ?>
					<?php the_field('front_matter'); ?>
				<?php endif; ?>

				<?php if(get_field('distance')): ?>
					<span class="data">
						<span class="th">
							Distance
						</span>
						<span>
							<?php the_field('distance'); ?>	mi /
						</span>
						<span>
						<?
							$mile_kilometer_conversion = 1.6;
							$standard_distance =  get_field('distance');
							$metricDistance = $mile_kilometer_conversion*$standard_distance ;
							print ($metricDistance);
						?> km
						</span>
					</span>
				<?php endif; ?>

				<?php if(get_field('duration')): ?>
					<span class="data">
						<span class="th">Duration</span>
						<span><?php the_field('duration'); ?></span>
					</span>
				<?php endif; ?>

				<?php if(get_field('ascent')): ?>
					<span class="data">
						<span class="th">Ascent</span>
						<span>
						<?php the_field('ascent'); ?> ft
						</span>/
						<span>
							<?
							$foot_meter_conversion = 0.3;
							$standard_ascent =  get_field('ascent');
							$metric_ascent = $standard_ascent * $foot_meter_conversion;
								print ($metric_ascent);
							?> m
						</span>

					</span>
				<?php endif; ?>

				<?php if(get_field('descent')): ?>
					<span class="data">
						<span class="th">Descent</span>
						<span>
							<?php the_field('descent'); ?>	ft
						</span> /
						<span>
							<?
							$foot_meter_conversion = 0.3;
							$standard_descent =  get_field('descent');
							$metric_descent = $standard_descent * $foot_meter_conversion;
								print ($metric_descent);
							?> m
						</span>
					</span>
				<?php endif; ?>

				<?php if(get_field('location')): ?>
					<span class="data location">
						<span class="th"> Location </span>
						<span> <?php the_field('location'); ?> </span>
					</span>
				<?php endif; ?>

				<?php if(get_field('strava_link')): ?>
					<a class="strava-link" href=" <?php the_field('strava_link'); ?> "> View on Strava </a>
				<?php endif; ?>

				<nav id="post-header-tags" class="tags caps h6">
					<?php echo get_the_tag_list(); // Display the tags this post has, as links separated by spaces and hashtags ?>
				</nav>

			</div>


		<div class="main-content col col-12 xl-col-9 pad-m">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'thrilla2-0' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thrilla2-0' ),
					'after'  => '</div>',
				) );
			?>
		</div>


	</div><!-- the-content -->





</article><!-- #post-## -->
