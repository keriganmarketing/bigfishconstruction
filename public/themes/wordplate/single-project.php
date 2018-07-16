<?php

bladerunner('views.pages.project', [
    'project' => [
        'id' => $post->ID,
        'photo' => get_field('image'),
        'gallery' => get_field('gallery'),
        'link'    => get_permalink($post->ID),
        'build_location' => get_the_terms($post->ID, 'build-location'),
        'construciton_type' => get_the_terms($post->ID, 'construction-type')
    ]
]);