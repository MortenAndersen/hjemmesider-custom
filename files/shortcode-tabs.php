<?php
// Accordion

add_shortcode('hc-tab', 'hjemmesider_custom_tabs');
function hjemmesider_custom_tabs($atts) {
    global $post;
    ob_start();

if( have_rows('hc_tab_item') ):

echo '<div class="hc-tabs">';

$my_fields = get_field_object('hc_tab_item');
	$count = (count($my_fields['value']));


$counter = 1;

	echo '<style>';

while ( $counter < $count ) {
	echo '#tab' . $counter . ':checked ~ #content' . $counter . ', ';

$counter++;

}
echo '#tab' . $count . ':checked ~ #content' . $count . '{';
echo 'display: block;} </style>';

$counter = 1;
$first_time = 0;



 	// loop through the rows of data
    while ( have_rows('hc_tab_item') ) : the_row();

    	echo ' <input id="tab' . $counter . '" type="radio" name="tabs"';
    	if ($first_time == 0){ echo 'checked'; }
    	echo '>';
    	echo '<label for="tab' . $counter . '">' . get_sub_field('hc_tab_overskrift') . '</label>';

    	$counter++;
    	$first_time++;

    endwhile;

		$counter = 1;

    while ( have_rows('hc_tab_item') ) : the_row();

    	echo '<section id="content' . $counter . '" class="hc-tab-body">' .get_sub_field('hc_tab_body') . '</section>';

    	$counter++;

    endwhile;



echo '</div>';
echo "\n";
else :

    // no rows found

endif;


	$myvariable = ob_get_clean();
  return $myvariable;
}