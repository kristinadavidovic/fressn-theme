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

/*
 * Custom shortcode for displaying
 * all workshops in a grid formation
 * [workshops]
 */

function workshops_shortcode_function($atts) {

    $args = array(
        'post_type' => 'workshops',
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
        $output .= '<div class="workshops workshops-grid width100-70--center">';

        while ($loop->have_posts()): $loop->the_post();
            global $post;

            $whId = get_the_id();
            $whTitle = get_the_title();
            $whDesc = get_the_content();
            $whInstructorName = get_field('instructor');
            $whInstructorImg = get_field('instructor_image');
            $whInstructorInfo = get_field('instructor_info');
            $whLocation = get_field('workshop_location');
            $whDateTime = new DateTime(get_field('workshop_date_time', false, false));
            $whSignupLink = get_field('workshop_sign_up_link');

            $output .= '<div class="workshops__item">';
                // date
                $output .= '<div class="workshops__datetime">';
                    $output .= '<span class="workshops__date">' . $whDateTime->format('j M') . '</span>';
                    $output .= '<span class="workshops__time">' . $whDateTime->format('H:i') . '</span>';
                $output .= '</div>';

                $output .= '<div class="workshops__content-wrapper">';
                    // location
                    $output .= '<div class="workshops__location">';
                        $output .= '<i class="fas fa-map-marker-alt"></i>';
                        $output .= $whLocation ? $whLocation : 'Sporočimo naknadno';
                    $output .= '</div>';

                    // title
                    $output .= '<h2 class="workshops__item-title">';
                        $output .= $whTitle;
                    $output .= '</h2>';

                    // instructor name
                    $output .= '<div class="workshops__instructor-name">';
                        $output .= '<i class="fas fa-user-tie"></i>';
                        $output .= $whInstructorName ? $whInstructorName : 'Sporočimo kmalu';
                    $output .= '</div>';

                    $output .= '<div class="button workshops__item-link">';
                        $output .= '<a href="#" class="modal-trigger" data-toggle="modal" data-target="simpleModal_' . $whId . '">';
                            $output .= 'Več info';
                        $output .= '</a>';
                        $output .= '<a href="' . $whSignupLink . '" target="_blank">';
                            $output .= 'Prijava';
                        $output .= '</a>';
                    $output .= '</div>';

                $output .= '</div>';
            $output .= '</div>';

            $output .= '<div class="modal" id="simpleModal_' . $whId . '">';
                $output .= '<div class="workshop__modal">';
                    $output .= '<div class="workshop__modal-top">';

                        $output .= '<div class="workshop__modal-left">';
                            $output .= '<div class="workshops__datetime">';
                                $output .= '<span class="workshops__date"><i class="fas fa-calendar-day"></i>' . $whDateTime->format('j M') . '</span>';
                                $output .= '<span class="workshops__time"><i class="fas fa-clock"></i>' . $whDateTime->format('H:i') . '</span>';
                            $output .= '</div>';

                            $output .= '<div class="workshops__location">';
                                $output .= '<i class="fas fa-map-marker-alt"></i>';
                                $output .= $whLocation ? $whLocation : 'Sporočimo naknadno';
                            $output .= '</div>';

                            $output .= '<h1 class="workshops__item-title">';
                            $output .= $whTitle;
                            $output .= '</h1>';

                        $output .= '</div>';

                        $output .= '<div class="workshop__modal-right">';
                            $output .= $whDesc;
                        $output .= '</div>';

                    $output .= '</div>';

                    $output .= '<div class="workshop__modal-bottom">';

                        $output .= '<div class="workshop__modal-left">';
                            $output .= $whInstructorInfo;
                        $output .= '</div>';

                        $output .= '<div class="workshop__modal-right">';
                            $output .= '<img src="' . $whInstructorImg . '" />';
                        $output .= '</div>';

                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';

        endwhile;

        $output .= '</div><!-- .workshops -->';

    } else {
        $output = __('Letošnje delavnice razkrijemo kmalu!', 'freesn');
    }

    // wp_reset_postdata();

    wp_reset_query();

    return $output;
}

add_shortcode('workshops', 'workshops_shortcode_function');
