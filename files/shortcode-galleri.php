<?php
// Billedgalleri

add_shortcode('hc-gallery', 'hjemmesider_custom_galleri');
function hjemmesider_custom_galleri($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'grid-3', 'size' => 'thumbnail', 'type' => 'default', 'group' => 'default'), $atts));

$images = get_field('hc_billedgalleri');

// Image size (thumbnail, medium, large, full)

if( $images ):
  if( $type != 'banner' ){


    echo '<div class="hc-galleri hc-grid-con ' . $grid . '">';
          foreach( $images as $image):

            // Images in same GROUP (title)
            if ( $image['title'] == $group ) {
              echo '<div class="hc-grid-item">';
                  echo '<a href="' . $image['url'] . '" data-lightbox="' . $group . '" data-title="' . $image['caption'] . '">';
                    echo wp_get_attachment_image( $image['ID'], $size );
                  echo '</a>';
                  if ( $image['caption'] ){
                  echo '<div class="hc-img-caption hc-small-font">' . $image['caption'] . '</div>';
                  };
              echo '</div>';
            }

            // Images not in a GROUP (no title)
            if (  empty($image['title']) && $group === 'default') {
              echo '<div class="hc-grid-item">';
                  echo '<a href="' . $image['url'] . '" data-lightbox="' . $group . '" data-title="' . $image['caption'] . '">';
                    echo wp_get_attachment_image( $image['ID'], $size );
                  echo '</a>';
                  if ( $image['caption'] ){
                  echo '<div class="hc-img-caption hc-small-font">' . $image['caption'] . '</div>';
                  };
              echo '</div>';
            }
          endforeach;
    echo '</div>';

  }

        // Banner

  else {

    echo '<div class="hc-galleri hc-grid-con ' . $type . '">';
          foreach( $images as $image ):

            // Images in same GROUP (title)
            if ( $image['title'] == $group) {
              echo '<div class="hc-grid-item">';
                    echo wp_get_attachment_image( $image['ID'], 'full' );
                    if ( $image['caption'] ){
                    echo '<div class="hc-banner-txt hc-small-font">' . $image['caption'] . '</div>';
                    };
              echo '</div>';
            }

            // Images not in a GROUP (no title)
            if ( empty($image['title']) && $group === 'default') {
              echo '<div class="hc-grid-item">';
                    echo wp_get_attachment_image( $image['ID'], 'full' );
                    if ( $image['caption'] ){
                    echo '<div class="hc-banner-txt hc-small-font">' . $image['caption'] . '</div>';
                    };
              echo '</div>';
            }

          endforeach;
    echo '</div>';
  }

endif;

	$myvariable = ob_get_clean();
  return $myvariable;
}