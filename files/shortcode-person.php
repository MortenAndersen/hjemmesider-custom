<?php
// Personer Shortcode

add_shortcode('personer', 'hjemmesider_personer');
function hjemmesider_personer($atts) {
    global $post;
    ob_start();

    // define attributes and their defaults
    extract(shortcode_atts(array('cat' => 'cat', 'grid' => 'grid-3'), $atts));

    // define query parameters based on attributes
    $options = array('post_type' => 'person', 'orderby' => 'menu_order', 'order' => 'ASC', 'posts_per_page' => - 1, 'cat' => array($cat), 'grid' => array($grid) );
    $query = new WP_Query($options);

    // run the loop based on the query
    if ($query->have_posts()) {

echo '<div class="hc-personer hc-grid-con ' . $grid . '">';


    while ($query->have_posts()):
            $query->the_post(); ?>
<div class="hc-person hc-grid-item <?php
$title = get_the_title();
$loweredTitle = strtolower($title);
echo str_replace(array(" ", 'æ', 'Æ', 'ø', 'Ø', 'å', 'Å', 'ü', 'Ü', 'ö', 'Ö', '.'), array('__', 'ae', 'ae', 'oe', 'oe', 'aa', 'aa', 'u', 'u', 'o', 'o'. ''), $loweredTitle);
?>">
<?php
the_post_thumbnail('medium'); echo "\n"; ?>
<h4><?php the_title(); ?> <?php if( get_field('hc_titel_2') ): ?>- <span class="data-titel-2"><?php the_field('hc_titel_2'); ?></span><?php endif; ?></h4>
<?php if (class_exists('acf')): ?>
<?php if( get_field('hc_titel') || get_field('hc_telefon') || get_field('hc_email') ): ?>
<div class="person-data">
<?php if( get_field('hc_titel') ): ?><div class="data-titel"><?php the_field('hc_titel'); ?></div><?php endif; ?>
<?php if( get_field('hc_telefon') ): ?><div class="data-telefon"><?php the_field('hc_telefon'); ?></div><?php endif; ?>
<?php if( get_field('hc_email') ): ?><div class="data-email"><a href="mailto:<?php the_field('hc_email'); ?>"><?php the_field('hc_email'); ?></a></div><?php endif; ?>

   <?php if( get_field('hc_linkedin') || get_field('hc_skypename') ) { ?>
  <div class="person-social">
    <?php if( get_field('hc_linkedin') ): ?><span class="person-data-social data-linkedin"><a href="<?php the_field('hc_linkedin'); ?>" target="_blank">Linkedin</a></span><?php endif; ?>
  <?php if( get_field('hc_skypename') ): ?><span class="person-data-social data-skype"><a href="skype:<?php the_field('hc_skypename'); ?>?call">Skype</a></span><?php endif; ?>
  </div>
  <?php } ?>
</div>
<?php endif; ?>
<?php endif; ?>

<?php
    the_content(); ?>
    <?php edit_post_link('<span>Rediger</span> PERSON', '<p class="edit__content">', '</p>'); ?>
</div>

<?php
    endwhile;
        wp_reset_postdata(); ?>
</div>
    <?php
        $myvariable = ob_get_clean();
        return $myvariable;
    }
}