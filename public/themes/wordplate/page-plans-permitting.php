<?php
$headerImageData = get_field('image');

bladerunner('views.pages.planspermitting', [
    'headerImage' => $headerImageData['url'],
    'headline'        => get_field('headline')
]);