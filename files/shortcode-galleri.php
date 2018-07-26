<?php
// Billedgalleri

add_shortcode('billedgalleri', 'hjemmesider_custom_galleri');
function hjemmesider_custom_galleri($atts) {
    global $post;
    ob_start();

$images = get_field('hc_billedgalleri');

// Image size
$size = get_field('hc_thumbnail_size'); // (thumbnail, medium, large, full)


if( $images ):
    echo '<ul class="hc-galleri hc-grid-con ' . get_field('hc_gal_grid') . '">';
         foreach( $images as $image ):
            echo '<li class="hc-grid-item">';
                echo '<a href="' . $image['url'] . '" data-lightbox="Gallery" data-title="' . $image['caption'] . '">';
                  echo wp_get_attachment_image( $image['ID'], $size );
                echo '</a>';
                if ( $image['caption'] ){
                echo '<div class="hc-img-caption hc-small-font">' . $image['caption'] . '</div>';
            };
            echo '</li>';
         endforeach;
    echo '</ul>';
 endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}