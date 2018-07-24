<?php
// Accordion

add_shortcode('filer', 'hjemmesider_custom_filer');
function hjemmesider_custom_filer($atts) {
    global $post;
    ob_start();

if( have_rows('hc_filer_item') ):


echo '<ul class="hc-filer hc-list">';

 	// loop through the rows of data
    while ( have_rows('hc_filer_item') ) : the_row();
    	echo '<li class="file-' . get_row_index() . '">';
    	echo '<a href="' . get_sub_field('hc_fil') . '" target="_blank">' . get_sub_field('hc_filnavn') . '</a>';
    	echo '</li>';
    endwhile;
echo '</ul>';
echo "\n";
else :

    // no rows found

endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}