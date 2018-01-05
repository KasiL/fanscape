<?php

// adds class to body for easier styling
function kasil_body_classes($classes)
{
    $classes[] = 'kasil';
    return $classes;
}

add_filter( 'body_class','kasil_body_classes' );

//enqueue's the child theme styles to overwrite the parent's styles

function my_theme_enqueue_styles() {

    $parent_style = 'Divi-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// Custom JS
function kasil_custom_scripts () {
    wp_enqueue_script( 
        'custom', 
        get_stylesheet_directory_uri() . '/src/js/custom.js', 
        array(
            'jquery',
            'jquery-ui-draggable'
        ),
        false,
        true
        // false, 
        // TRUE
    );
}
add_action ('wp_enqueue_scripts', 'kasil_custom_scripts');
// wp_enqueue_script( 'orbit-et-builder-modules-global-functions-script', get_stylesheet_directory_uri() . '/includes/builder/scripts/frontend-builder-global-functions.js', ['jquery'], '1.0', TRUE );
// wp_enqueue_script( 'orbit-et-builder-modules-script', get_stylesheet_directory_uri() . '/includes/builder/scripts/frontend-builder-scripts.js', ['jquery', 'et-builder-modules-script'], '1.0', TRUE );
?>