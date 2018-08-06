<?php
// WP LOOP

// Oder by date - desc / asc
// By post_type - type=post
// By category - cat=5
// Number of post - number=3
// Offset post - offset=2
// Design none / clean / normal - design=clean


add_shortcode('hc-loop', 'hjemmesider_custom_loop');
function hjemmesider_custom_loop($atts) {
    global $post;
    ob_start();

    extract(shortcode_atts(array('order' => 'order','number' => - 1, 'type' => 'post', 'offset' => 'offset', 'design' => 'design', 'cat' => 'cat', 'id' => 'id'  ), $atts));



$loop = new WP_Query( array( 'post_type' => $type, 'posts_per_page' => $number, 'order' => $order, 'orderby' => 'date', 'offset' => $offset, 'cat' => array($cat) ));

if ( $loop->have_posts() ) {
echo '<ul class="hc-wp-loop hc-list">';


if ( $design == 'clean') {
    while ( $loop->have_posts() ) : $loop->the_post();
        echo '<li><h6><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6></li>';
    endwhile; wp_reset_query();
}

elseif ( $design =='normal') {
    while ( $loop->have_posts() ) : $loop->the_post();
        echo '<li><h6><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6><p class="hc-the-excerpt">' . get_the_excerpt() . '</p></li>';
    endwhile; wp_reset_query();
}

else {
    while ( $loop->have_posts() ) : $loop->the_post();
        echo '<li>';
            if ( has_post_thumbnail() ) {
                echo '<div class="hc-loop-img"><a href="' . get_the_permalink() . '">';
                the_post_thumbnail( 'medium' );
                echo '</a></div>';
            }
        echo '<div class="hc-loop-content"><h6><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h6>';
        echo '<span class="hc-date hc-small-font db">' . get_the_date() . '</span>';
        echo '<p class="the-excerpt">' . get_the_excerpt() . '</p></div></li>';
    endwhile; wp_reset_query();
}

echo '</ul>';
}

	$myvariable = ob_get_clean();
  return $myvariable;
}