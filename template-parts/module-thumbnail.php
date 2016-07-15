<?php if ( has_post_thumbnail() ): ?>
    <a class="permalink block" href="<?php the_permalink(); // Get the link to this post ?>">
      <?php
          $featured_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail');
          $img_thumb_id = get_post_thumbnail_id( $post_id );
      ?>
      <img src="<?php echo $featured_thumb[0]; ?>" class="post-thumbnail" alt="<?php echo $alt_text; ?>"
        <?php echo tevkori_get_srcset_string($img_thumb_id, 'thumbnail-retina' ); ?>
      />
    </a>
<?php endif; ?>
