<?php
// Event dato

add_shortcode('hc-event-date', 'hjemmeisder_custom_event_date');
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

add_shortcode('hc-event', 'hjemmeisder_custom_event_list');
function hjemmeisder_custom_event_list($atts) {
    global $post;
    ob_start();

// define attributes and their defaults
    extract(shortcode_atts(array('number' => -1, 'type' => 'new'), $atts));

// find date time now
$date_now = date('Y-m-d H:i:s');


// OLD or NEW events
if ($type === 'old')  {

	$type = '<=';
	$sort = 'DESC';

} else {

	$type = '>=';
	$sort ='ASC';

};


// query events
$posts = get_posts(array(
	'posts_per_page'	=> $number,
	'post_type'			=> 'hjemmesider_event',
	'meta_query' 		=> array(

		array(
	        'key'			=> 'hc_event_end',
	        'compare'		=> $type,
	        'value'			=> $date_now,
	        'type'			=> 'DATETIME'
	    )

    ),
	'order'				=> $sort,
	'orderby'			=> 'meta_value',
	'meta_key'			=> 'hc_event_start',
	'meta_type'			=> 'DATETIME'
));




if( $posts ):



	echo '<ul id="events">';
		foreach( $posts as $posts ):
			$date = get_field('hc_event_start', $posts->ID);
			echo '<li>';
				echo '<strong>' . $posts->post_title . '</strong>: <div class=date">';
				echo get_field('hc_event_start', $posts->ID);
				echo " - ";
				echo  get_field('hc_event_end', $posts->ID) . '</class>';
				echo '<p><a href="' . get_permalink($posts->ID) . '">' . esc_html__( 'Read more', 'hc-text-domain' ) . '</a></p>';
			echo '</li>';
		 endforeach;
	echo '</ul>';

endif;

	$myvariable = ob_get_clean();
  return $myvariable;
}