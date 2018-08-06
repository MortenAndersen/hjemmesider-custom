<?php
// Accordion

add_shortcode('hc-accordion', 'hjemmesider_custom_accordion');
function hjemmesider_custom_accordion($atts) {
    global $post;
    ob_start();

if( have_rows('hc_accordion_item') ):


echo '<div class="hc-accordion">';

 	// loop through the rows of data
    while ( have_rows('hc_accordion_item') ) : the_row();

    	echo '<h3>' . get_sub_field('hc_acc_overskrift') . '</h3>';
    	echo '<div class="hc-accordion-body">' .get_sub_field('hc_acc_body') . '</div>';

    endwhile;
echo '</div>';
echo "\n";
else :

    // no rows found

endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}