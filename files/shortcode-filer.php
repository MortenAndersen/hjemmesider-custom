<?php
// Accordion

add_shortcode('file', 'hjemmesider_custom_filer');
function hjemmesider_custom_filer($atts) {
    global $post;
    ob_start();

    extract(shortcode_atts(array('grid' => 'grid-1', 'number' => 999,), $atts));

if( have_rows('hc_filer_item') ):


echo '<div class="hc-filer hc-grid-con ' . $grid . '">';
$i = 1;
 	// loop through the rows of data
    while ( have_rows('hc_filer_item') && $i <= $number ) : the_row();
    	echo '<div class="hc-grid-item file-' . get_row_index() . '">';
    	echo '<a href="' . get_sub_field('hc_fil') . '" target="_blank">' . get_sub_field('hc_filnavn') . '</a>';
    	echo '</div>';
    $i++;
    endwhile;
echo '</div>';
echo "\n";
else :

    // no rows found

endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}