<?php
// News frontpage Shortcode

add_shortcode('box', 'hjemmeisder_custom_box');
function hjemmeisder_custom_box($atts) {
    global $post;
    ob_start();

// var
    $box_type = get_field('hc_slider');

if( have_rows('box') ):

if( $box_type == 'none' ) { echo '<div class="hc-box-con hc-grid-con ' . get_field('grid') . '">'; };
if( $box_type == 'fader' ) { echo '<div class="hc-box-con hc-grid-con hc-fader">'; };

echo "\n";
 	// loop through the rows of data
    while ( have_rows('box') ) : the_row();

    	if( get_sub_field('text_color') && get_sub_field('background') ):
echo '<div class="hc-box-item hc-grid-item box-' . get_row_index() . ' ' . get_sub_field('design') . '" style="color:' . get_sub_field('text_color') . ';' . 'background:' . get_sub_field('background') . '">';
echo "\n";
elseif( get_sub_field('text_color') ) :
	echo '<div class="hc-box-item hc-grid-item box-' . get_row_index() . ' ' . get_sub_field('design') . '" style="color:' . get_sub_field('text_color') .'">';
	echo "\n";
elseif( get_sub_field('background') ) :
	echo '<div class="hc-box-item hc-grid-item box-' . get_row_index() . ' ' . get_sub_field('design') . '" style="background:' . get_sub_field('background') .'">';
	echo "\n";
else :
	echo '<div class="hc-box-item hc-grid-item box-' . get_row_index() . ' ' . get_sub_field('design') . '">';
	echo "\n";
	endif;

	if( get_sub_field('link') ) :
		echo '<a href="' . get_sub_field('link') . '" target="' . get_sub_field('target') . '">';
			include 'loop-content.php';
		echo '</a>';
	 else :
	 	include 'loop-content.php';
	endif ;


echo "</div>\n";
echo "\n";
    endwhile;
echo '</div>';
echo "\n";
else :

    // no rows found

endif;

	$myvariable = ob_get_clean();
  return $myvariable;
}