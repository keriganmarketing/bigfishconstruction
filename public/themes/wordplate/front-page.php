<?php

bladerunner('views.pages.front', [
    'locations' => json_encode(get_terms([
        'taxonomy' => 'build-location',
    ])),
    'types' => json_encode(get_terms([
        'taxonomy' => 'construction-type',
    ])),
    'featureBox1' => [
        'title' => get_field('feat_1_headline'),
        'text' => get_field('feat_1_text'),
        'link' => get_field('feat_1_link')
    ],
    'featureBox2' => [
        'title' => get_field('feat_2_headline'),
        'text' => get_field('feat_2_text'),
        'link' => get_field('feat_2_link')
    ],
    'projectsHeader' => get_field('projects_header')
]);