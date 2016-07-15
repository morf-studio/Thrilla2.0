<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Thrilla_2.0
 */

get_header(); ?>


		<?php
		if ( have_posts() ) : ?>

			<header class="page-header cf pad-l">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="col col-12 m-col-8 l-col-9 pad-m">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */

				  get_template_part( 'template-parts/archive', 'content' );


				endwhile;
					the_posts_navigation(); ?>

				</div>

	<?php else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>

<div class="col col-12 m-col-4 l-col-3 pad-m">
	<?php get_sidebar(); ?>
</div>

<?php
get_footer();
