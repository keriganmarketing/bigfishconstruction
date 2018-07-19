<?php

bladerunner('views.pages.index',[
    'headerImageData' => get_field('header_image'),
    'headline'        => get_field('headline')
]);