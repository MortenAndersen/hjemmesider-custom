<?php
// Billedgalleri

add_shortcode('billedgalleri', 'hjemmesider_custom_galleri');
function hjemmesider_custom_galleri($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'grid-3'), $atts));

$images = get_field('hc_billedgalleri');

// Image size
$size = get_field('hc_thumbnail_size'); // (thumbnail, medium, large, full)


if( $images ):
    echo '<div class="hc-galleri hc-grid-con ' . $grid . '">';
         foreach( $images as $image ):

          if( $grid != 'banner' ){

            echo '<div class="hc-grid-item">';
                echo '<a href="' . $image['url'] . '" data-lightbox="Gallery" data-title="' . $image['caption'] . '">';
                  echo wp_get_attachment_image( $image['ID'], $size );
                echo '</a>';
                if ( $image['caption'] ){
                echo '<div class="hc-img-caption hc-small-font">' . $image['caption'] . '</div>';
                };
            echo '</div>';

          } else {
            echo '<div class="hc-grid-item">';
                  echo wp_get_attachment_image( $image['ID'], 'full' );
                  if ( $image['caption'] ){
                  echo '<div class="hc-banner-txt hc-small-font">' . $image['caption'] . '</div>';
                  };
            echo '</div>';

          }

         endforeach;
    echo '</div>';
 endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}