<?php
// Event dato

add_shortcode('event-date', 'hjemmeisder_custom_event_date');
function hjemmeisder_custom_event_date($atts) {
    global $post;
    ob_start();

// Henter ACF dato felter
$date = get_field('hc_event_start', false, false);
$date_end = get_field('hc_event_end', false, false);


// ACF dato til objekt
$date = new DateTime($date);
$date_end = new DateTime($date_end);

// Print ACF dato felter
if ( is_singular('hjemmesider_event') ) {
 echo '<span class="hjemmesider-custom-date start-date">' . $date->format('j M Y H:i') . '</span>';
 echo ' - ';
 echo '<span class="hjemmesider-custom-date end-date">' . $date_end->format('j M Y H:i') . '</span>';
}


	$myvariable = ob_get_clean();
  return $myvariable;
}

/* ---------------------------------- */

// Event list

add_shortcode('event-list', 'hjemmeisder_custom_event_list');
function hjemmeisder_custom_event_list($atts) {
    global $post;
    ob_start();



// find date time now
$date_now = date('Y-m-d H:i:s');



// query events
$posts = get_posts(array(
	'posts_per_page'	=> -1,
	'post_type'			=> 'hjemmesider_event',
	'meta_query' 		=> array(



		array(
	        'key'			=> 'hc_event_end',
	        'compare'		=> '>=',
	        'value'			=> $date_now,
	        'type'			=> 'DATETIME'
	    )



    ),
	'order'				=> 'ASC',
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'hc_event_start',
	'meta_type'			=> 'DATETIME'
));

if( $posts ):


	echo '<ul id="events">';
		foreach( $posts as $p ):
			echo '<li>';
				echo '<strong>' . $p->post_title . '</strong>:' .  get_field('hc_event_start', $p->ID) . ' - ' .  get_field('hc_event_end', $p->ID);
			echo '</li>';
		 endforeach;
	echo '</ul>';

endif;




	$myvariable = ob_get_clean();
  return $myvariable;
}