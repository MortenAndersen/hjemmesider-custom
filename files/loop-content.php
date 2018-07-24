<?php
// var
	$image_top = get_sub_field('image_-_top');
	$image_bottom = get_sub_field('image_-_bottom');

        // display a sub field value


        if( get_sub_field('title') ) {
        	echo '<h4 class="hc-box-title">' . get_sub_field('title') . '</h4>';
      	};

        // Top Image
        if( $image_top ) {
        echo "\n";
        echo '<img class="hc-box-top-img" src="' . $image_top['url'] . '" alt="' . $image_top['alt'] . '" />';
        	if ( $image_top['caption'] ) {
          echo "\n";
	        echo '<p class="image-caption">' . $image_top['caption'] . '</p>';
	      	};
      	};

        if( get_sub_field('body') || get_sub_field('klik_tekst')) {
          echo '<div class="hc-box-body">' . get_sub_field('body');
            if( get_sub_field('klik_tekst')) { echo '<p class="hc-link-text">' . get_sub_field('klik_tekst') . '</p>'; };
          echo'</div>';
        ;}

        // Bottom Image
        if( $image_bottom ) {
        echo "\n";
        echo '<img class="hc-box-bottom-img" src="' . $image_bottom['url'] . '" alt="' . $image_bottom['alt'] . '" />';
	        if ( $image_bottom['caption'] ) {
          echo "\n";
	        echo '<p class="hc-image-caption">' . $image_bottom['caption'] . '</p>';
	      	};
      	};
        ?>