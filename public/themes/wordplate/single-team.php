<?php

$headerImageData = get_field('header_image');

bladerunner('views.pages.bio', [
    'team' => [
        'image' => get_field('image'),
        'email' => get_field('email'),
        'phone' => get_field('phone'),
        'facebook' => get_field('facebook'),
        'linkedin' => get_field('linkedin'),
        'instagram' => get_field('instagram'),
        'twitter' => get_field('twitter')
    ],
    'headerImage' => $headerImageData['url'],
    'headline'    => get_field('headline')
]);