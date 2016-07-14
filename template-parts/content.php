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


	<?php if ( has_post_thumbnail() ): ?>
			<a class="permalink" href="<?php the_permalink(); // Get the link to this post ?>">
				<?php
						$featured_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail');
						$img_thumb_id = get_post_thumbnail_id( $post_id );
				?>
				<img src="<?php echo $featured_thumb[0]; ?>" class="post-thumbnail" alt="<?php echo $alt_text; ?>"
					<?php echo tevkori_get_srcset_string($img_thumb_id, 'thumbnail-retina' ); ?>
				/>
			</a>
	<?php endif; ?>

	<div class="post-meta">
		<?php $category = get_the_category();
		if($category[0]){
		echo '<a class="category-link" href="'.get_category_link($category[0]->term_id ).'">

			'.$category[0]->cat_name.'
		</a>';
		}
		?>
	</div>

	<a class="permalink" href="<?php the_permalink(); // Get the link to this post ?>">
		<h1 class="title">
			<?php the_title(); // Show the title of the posts as a link ?>
		</h1>
		<?php the_excerpt(); ?>
	</a>

	<div class="entry-content">
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
	</div><!-- .entry-content -->




</article><!-- #post-## -->
