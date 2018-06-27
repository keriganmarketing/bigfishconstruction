<?php

bladerunner('views.pages.front', ['socialLinks' => (new \KeriganSolutions\SocialMedia\SocialSettingsPage())->getSocialLinks()]);