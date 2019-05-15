<?php
include_once(get_stylesheet_directory() . '/custom-divi-modules/custom-text-icon.php');

if(!function_exists('array_merge_recursive_ex')) {
    function array_merge_recursive_ex(array & $array1, array & $array2)
    {
        $merged = $array1;

        foreach ($array2 as $key => & $value)
        {
            if (is_array($value) && isset($merged[$key]) && is_array($merged[$key]))
            {
                $merged[$key] = array_merge_recursive_ex($merged[$key], $value);
            } else if (is_numeric($key))
            {
               if (!in_array($value, $merged))
                $merged[] = $value;
            } else {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }
}

function divich_enqueue_scripts() {

	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);

    wp_enqueue_script( 'divich-site', '', array(), '1.0.0', true );
    wp_enqueue_script( 'divich-site', get_stylesheet_directory_uri() . '/site.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'divich_enqueue_scripts' );

function divich_theme_setup() {
    add_image_size( 'full-hd-cropped', 1920, 1080, ['center', 'center'] );
    add_image_size( 'full-hd-scaled', 1920, 1080, false );
}
add_action( 'after_setup_theme', 'divich_theme_setup' );


function divich_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'full-hd-cropped' => __( 'Full HD Cropped' ),
        'full-hd-scaled' => __( 'Full HD Scaled' ),
    ) );
}
add_filter( 'image_size_names_choose', 'divich_custom_sizes' );

// Hide projects custom post type
function divich_et_project_posttype_args( $args ) {
    return array_merge( $args, array(
        'public'              => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => false,
        'show_in_nav_menus'   => false,
        'show_ui'             => false
    ));
}
add_filter( 'et_project_posttype_args', 'divich_et_project_posttype_args', 10, 1 );

// Custom admin script
function divich_load_custom_wp_admin_style() {
        wp_enqueue_script('divich-site-admin', get_stylesheet_directory_uri() . '/admin.js', array(), '1.0.0', true);
}
add_action( 'admin_enqueue_scripts', 'divich_load_custom_wp_admin_style' );