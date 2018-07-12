<?php

bladerunner('views.pages.front', [
    'locations' => json_encode(get_terms([
        'taxonomy' => 'build-location',
    ])),
    'types' => json_encode(get_terms([
        'taxonomy' => 'construction-type',
    ]))
]);