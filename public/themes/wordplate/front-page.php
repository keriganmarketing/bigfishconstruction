<?php

bladerunner('views.pages.front', [
        'socialLinks' => (new \KeriganSolutions\SocialMedia\SocialSettingsPage())->getSocialLinks(),
        'mainNav' => wp_nav_menu([
                    'theme_location'  => 'main-navigation',
                    'container_class' => 'collapse navbar-collapse',
                    'menu_class'      => 'navbar-nav ml-auto',
                    'echo'            => false
                ])
        ]
);