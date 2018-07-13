<?php

declare(strict_types=1);

use KeriganSolutions\KMAPortfolio\Portfolio;
use KeriganSolutions\KMATestimonials\Testimonial;
use KeriganSolutions\KMATeam\Team;
use KeriganSolutions\KMAContactInfo\ContactInfo;

// Register plugin helpers.
require template_path('includes/plugins/plate.php');

(new Portfolio())->use();
(new Testimonial())->menuIcon('editor-quote')->use();
(new Team())->use();
(new ContactInfo())->addField([
    'key' => 'license_number',
    'label' => 'License Number',
    'name' => 'license_number',
    'type' => 'text',
    'parent' => 'group_contact_info',
])->use();


/**
 * Registers the `build_location` taxonomy,
 * for use with 'project'.
 */
function build_location_init()
{
    register_taxonomy('build-location', array('project'), array(
        'hierarchical' => true,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => false,
        'show_ui' => true,
        'show_admin_column' => false,
        'query_var' => true,
        'rewrite' => true,
        'capabilities' => array(
            'manage_terms' => 'manage_options',
            'edit_terms' => 'manage_options',
            'delete_terms' => 'manage_options',
            'assign_terms' => 'edit_posts',
        ),
        'labels' => array(
            'name' => __('Build locations', 'YOUR-TEXTDOMAIN'),
            'singular_name' => _x('Build location', 'taxonomy general name', 'YOUR-TEXTDOMAIN'),
            'search_items' => __('Search Build locations', 'YOUR-TEXTDOMAIN'),
            'popular_items' => __('Popular Build locations', 'YOUR-TEXTDOMAIN'),
            'all_items' => __('All Build locations', 'YOUR-TEXTDOMAIN'),
            'parent_item' => __('Parent Build location', 'YOUR-TEXTDOMAIN'),
            'parent_item_colon' => __('Parent Build location:', 'YOUR-TEXTDOMAIN'),
            'edit_item' => __('Edit Build location', 'YOUR-TEXTDOMAIN'),
            'update_item' => __('Update Build location', 'YOUR-TEXTDOMAIN'),
            'view_item' => __('View Build location', 'YOUR-TEXTDOMAIN'),
            'add_new_item' => __('New Build location', 'YOUR-TEXTDOMAIN'),
            'new_item_name' => __('New Build location', 'YOUR-TEXTDOMAIN'),
            'separate_items_with_commas' => __('Separate build locations with commas', 'YOUR-TEXTDOMAIN'),
            'add_or_remove_items' => __('Add or remove build locations', 'YOUR-TEXTDOMAIN'),
            'choose_from_most_used' => __('Choose from the most used build locations', 'YOUR-TEXTDOMAIN'),
            'not_found' => __('No build locations found.', 'YOUR-TEXTDOMAIN'),
            'no_terms' => __('No build locations', 'YOUR-TEXTDOMAIN'),
            'menu_name' => __('Build locations', 'YOUR-TEXTDOMAIN'),
            'items_list_navigation' => __('Build locations list navigation', 'YOUR-TEXTDOMAIN'),
            'items_list' => __('Build locations list', 'YOUR-TEXTDOMAIN'),
            'most_used' => _x('Most Used', 'build-location', 'YOUR-TEXTDOMAIN'),
            'back_to_items' => __('&larr; Back to Build locations', 'YOUR-TEXTDOMAIN'),
        ),
        'show_in_rest' => true,
        'rest_base' => 'build-location',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ));

}
add_action('init', 'build_location_init');

/**
 * Sets the post updated messages for the `build_location` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `build_location` taxonomy.
 */
function build_location_updated_messages($messages)
{

    $messages['build-location'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => __('Build location added.', 'YOUR-TEXTDOMAIN'),
        2 => __('Build location deleted.', 'YOUR-TEXTDOMAIN'),
        3 => __('Build location updated.', 'YOUR-TEXTDOMAIN'),
        4 => __('Build location not added.', 'YOUR-TEXTDOMAIN'),
        5 => __('Build location not updated.', 'YOUR-TEXTDOMAIN'),
        6 => __('Build locations deleted.', 'YOUR-TEXTDOMAIN'),
    );

    return $messages;
}
add_filter('term_updated_messages', 'build_location_updated_messages');

/**
 * Registers the `construction_type` taxonomy,
 * for use with 'project'.
 */
function construction_type_init()
{
    register_taxonomy('construction-type', array('project'), array(
        'hierarchical' => true,
        'public' => true,
        'show_in_nav_menus' => false,
        'show_in_menu' => false,
        'show_ui' => true,
        'show_admin_column' => false,
        'query_var' => true,
        'rewrite' => true,
        'capabilities' => array(
            'manage_terms' => 'edit_posts',
            'edit_terms' => 'edit_posts',
            'delete_terms' => 'edit_posts',
            'assign_terms' => 'edit_posts',
        ),
        'labels' => array(
            'name' => __('Construction types', 'YOUR-TEXTDOMAIN'),
            'singular_name' => _x('Construction type', 'taxonomy general name', 'YOUR-TEXTDOMAIN'),
            'search_items' => __('Search Construction types', 'YOUR-TEXTDOMAIN'),
            'popular_items' => __('Popular Construction types', 'YOUR-TEXTDOMAIN'),
            'all_items' => __('All Construction types', 'YOUR-TEXTDOMAIN'),
            'parent_item' => __('Parent Construction type', 'YOUR-TEXTDOMAIN'),
            'parent_item_colon' => __('Parent Construction type:', 'YOUR-TEXTDOMAIN'),
            'edit_item' => __('Edit Construction type', 'YOUR-TEXTDOMAIN'),
            'update_item' => __('Update Construction type', 'YOUR-TEXTDOMAIN'),
            'view_item' => __('View Construction type', 'YOUR-TEXTDOMAIN'),
            'add_new_item' => __('New Construction type', 'YOUR-TEXTDOMAIN'),
            'new_item_name' => __('New Construction type', 'YOUR-TEXTDOMAIN'),
            'separate_items_with_commas' => __('Separate construction types with commas', 'YOUR-TEXTDOMAIN'),
            'add_or_remove_items' => __('Add or remove construction types', 'YOUR-TEXTDOMAIN'),
            'choose_from_most_used' => __('Choose from the most used construction types', 'YOUR-TEXTDOMAIN'),
            'not_found' => __('No construction types found.', 'YOUR-TEXTDOMAIN'),
            'no_terms' => __('No construction types', 'YOUR-TEXTDOMAIN'),
            'menu_name' => __('Construction types', 'YOUR-TEXTDOMAIN'),
            'items_list_navigation' => __('Construction types list navigation', 'YOUR-TEXTDOMAIN'),
            'items_list' => __('Construction types list', 'YOUR-TEXTDOMAIN'),
            'most_used' => _x('Most Used', 'construction-type', 'YOUR-TEXTDOMAIN'),
            'back_to_items' => __('&larr; Back to Construction types', 'YOUR-TEXTDOMAIN'),
        ),
        'show_in_rest' => true,
        'rest_base' => 'construction-type',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
    ));

}
add_action('init', 'construction_type_init');

/**
 * Sets the post updated messages for the `construction_type` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `construction_type` taxonomy.
 */
function construction_type_updated_messages($messages)
{

    $messages['construction-type'] = array(
        0 => '', // Unused. Messages start at index 1.
        1 => __('Construction type added.', 'YOUR-TEXTDOMAIN'),
        2 => __('Construction type deleted.', 'YOUR-TEXTDOMAIN'),
        3 => __('Construction type updated.', 'YOUR-TEXTDOMAIN'),
        4 => __('Construction type not added.', 'YOUR-TEXTDOMAIN'),
        5 => __('Construction type not updated.', 'YOUR-TEXTDOMAIN'),
        6 => __('Construction types deleted.', 'YOUR-TEXTDOMAIN'),
    );

    return $messages;
}
add_filter('term_updated_messages', 'construction_type_updated_messages');
//////////////////////////

$socialLinks = new KeriganSolutions\SocialMedia\SocialSettingsPage();
if (is_admin()) {
    $socialLinks->createPage();
}

new KeriganSolutions\KMASlider\KMASliderModule();

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);

    // Register navigation menus.
    register_nav_menus([
        'main-top-left'   => __('Desktop Top Left', 'wordplate'),
        'main-top-right'   => __('Desktop Top Right', 'wordplate'),
        'mobile-navigation' => __('Mobile Navigation', 'wordplate'),
        'footer-navigation' => __('Footer Navigation', 'wordplate'),
    ]);
});

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');

    wp_enqueue_style('wordplate', mix('styles/app.css'));

    wp_register_script('wordplate', mix('scripts/app.js'), '', '', true);
    wp_enqueue_script('wordplate');
});


// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

// Custom Blade Cache Path
add_filter('bladerunner/cache/path', function () {
    return '../../uploads/.cache';
});

function expand_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            width: auto;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'expand_login_logo');


// Helpers

// website menu data-only
function website_menu( $menuID ){

    $data = wp_get_nav_menu_items($menuID);
    $tempArray = [];
    $output = [];

    foreach($data as $key => $item){
        if($item->menu_item_parent == 0){
            $item->children = [];
            $tempArray[$item->ID] = $item;
        }else{
            $tempArray[$item->menu_item_parent]->children[] = $item;
        }
    }

    foreach($tempArray as $key => $item){
        $item->title = htmlspecialchars_decode($item->title);
        $item->classes = implode(' ', $item->classes);
        $output[$item->menu_order] = $item;
    }

    return json_encode($output);
}

// support page attributes
// Don't die if ACF isn't installed
if ( function_exists( 'acf_add_local_field_group' ) ) {
    add_action( 'acf/init', 'registerFields' );
}

function registerFields(){

    // ACF Group: Page Details
    acf_add_local_field_group( array (
        'key'      => 'group_page_details',
        'title'    => 'Page Details',
        'location' => array (
            array (
                array (
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'page',
                ),
                array (
                    'param'    => 'page_type',
                    'operator' => '!=',
                    'value'    => 'front_page',
                )
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
    ) );

    // Image
    acf_add_local_field( array(
        'key'           => 'header_image',
        'label'         => 'Header Image',
        'name'          => 'header_image',
        'type'          => 'image',
        'parent'        => 'group_page_details',
        'instructions'  => '',
        'required'      => 0,
        'return_format' => 'array',
        'preview_size'  => 'large',
        'library'       => 'all',
        'min_width'     => 0,
        'min_height'    => 0,
        'max_width'     => 0,
        'max_height'    => 0,
    ) );

    // Headline
    acf_add_local_field( array(
        'key'          => 'headline',
        'label'        => 'Headline',
        'name'         => 'headline',
        'type'         => 'text',
        'parent'       => 'group_page_details',
        'instructions' => '',
        'required'     => 0,
    ) );


    // ACF Group: Home Page Feature Box1
    acf_add_local_field_group( array (
        'key'      => 'group_feat_box_1',
        'title'    => 'Feature Box 1',
        'location' => array (
            array (
                array (
                    'param'    => 'page_type',
                    'operator' => '==',
                    'value'    => 'front_page',
                )
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
    ) );

    // Feature Box 1 Headline
    acf_add_local_field( array(
        'key'          => 'feat_1_headline',
        'label'        => 'Headline',
        'name'         => 'feat_1_headline',
        'type'         => 'text',
        'parent'       => 'group_feat_box_1',
        'instructions' => '',
        'required'     => 0,
    ) );

    // Feature Box 1 Content
    acf_add_local_field( array(
        'key'          => 'feat_1_text',
        'label'        => 'Content',
        'name'         => 'feat_1_text',
        'type'         => 'textarea',
        'parent'       => 'group_feat_box_1',
        'instructions' => '',
        'required'     => 0,
    ) );

    // Feature Box 1 Link
    acf_add_local_field( array(
        'key'          => 'feat_1_link',
        'label'        => 'Link',
        'name'         => 'feat_1_link',
        'type'         => 'link',
        'parent'       => 'group_feat_box_1',
        'instructions' => '',
        'required'     => 0,
    ) );


    // ACF Group: Home Page Feature Box 2
    acf_add_local_field_group( array (
        'key'      => 'group_feat_box_2',
        'title'    => 'Feature Box 2',
        'location' => array (
            array (
                array (
                    'param'    => 'page_type',
                    'operator' => '==',
                    'value'    => 'front_page',
                )
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
    ) );

    // Feature Box 1 Headline
    acf_add_local_field( array(
        'key'          => 'feat_2_headline',
        'label'        => 'Headline',
        'name'         => 'feat_2_headline',
        'type'         => 'text',
        'parent'       => 'group_feat_box_2',
        'instructions' => '',
        'required'     => 0,
    ) );

    // Feature Box 1 Content
    acf_add_local_field( array(
        'key'          => 'feat_2_text',
        'label'        => 'Content',
        'name'         => 'feat_2_text',
        'type'         => 'textarea',
        'parent'       => 'group_feat_box_2',
        'instructions' => '',
        'required'     => 0,
    ) );

    // Feature Box 1 Link
    acf_add_local_field( array(
        'key'          => 'feat_2_link',
        'label'        => 'Link',
        'name'         => 'feat_2_link',
        'type'         => 'link',
        'parent'       => 'group_feat_box_2',
        'instructions' => '',
        'required'     => 0,
    ) );
}