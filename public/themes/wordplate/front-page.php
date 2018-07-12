<?php

bladerunner('views.pages.front', [
    'locations' => json_encode(get_terms([
        'taxonomy' => 'build-location',
        'hide_empty' => false
    ])),
    'types' => json_encode(get_terms([
        'taxonomy' => 'construction-type',
        'hide_empty' => false
    ]))
]);