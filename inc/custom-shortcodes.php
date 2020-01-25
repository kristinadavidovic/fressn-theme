<?php
/*
 * Custom shortcode for displaying
 * all partners in a grid formation
 * [partners]
 */

function partners_shortcode_function($atts) {

    $args = array(
        'post_type' => 'partners',
        'posts_per_page' => '-1',
        // 'orderby' => 'meta_value_num',
        // 'order' => 'ASC',
        // 'meta_query' => array(
        //     array(
        //         'key' => 'vrstni_red',
        //     ),
        // ),
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        $output = '<div class="container">';
            $output .= '<div class="partners partners-grid">';

            while ($loop->have_posts()): $loop->the_post();
                global $post;
                $partnerLogoUrl = get_the_post_thumbnail_url();
                $partnerWebsiteUrl = get_field('partner_website');
                $partnerName = get_the_title();

                if ($partnerLogoUrl) {
                    $output .= '<div class="partners__item">';
                        $output .= '<a href="' . $partnerWebsiteUrl . '" target="_blank" class="partners__item-link">';
                            $output .= '<img src="' . $partnerLogoUrl . '" />';
                            $output .= '<div class="partners__item-title">';
                                $output .= $partnerName;
                            $output .= '</div>';
                        $output .= '</a>';
                    $output .= '</div>';
                }

            endwhile;

            $output .= '</div><!-- .partners -->';
        $output .= '</div><!-- .container -->';

    } else {
        $output = __('Parnerje dogodka razkrijemo kmalu!', 'freesn');
    }

    wp_reset_postdata();

    // wp_reset_query();

    return $output;
}

add_shortcode('partners', 'partners_shortcode_function');
