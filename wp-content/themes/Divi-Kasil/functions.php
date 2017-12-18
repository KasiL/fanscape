<?php

// Kasil-Divi functions file

/**
 * Enqueue the Forms & Reports JS scripts
 *
 * @author kaz 
 */
function kasil_styles() {

    $parent = get_template();
    $parent = wp_get_theme( $parent );

    // Enqueue the parent stylesheet
    wp_enqueue_style( 'divi-style', get_template_directory_uri() . '/style.css', [], $parent[ 'Version' ], 'all' );

    // Font Awesome
    wp_enqueue_style( 'font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', 'divi-style' );

    if ( ! is_admin() ) {
        wp_enqueue_style( 'layout', get_stylesheet_directory_uri() . '/css/layout.css', 'divi-style' );
        wp_enqueue_style( 'default', get_stylesheet_directory_uri() . '/css/default.css', 'divi-style' );
    }

    // Custom JS
    wp_enqueue_script( 'kasil', get_stylesheet_directory_uri() . '/js/kasil.js', [
        'jquery',
        'et-builder-modules-script',
    ], '', TRUE );
    // wp_enqueue_script( 'kasil-et-builder-modules-global-functions-script', get_stylesheet_directory_uri() . '/includes/builder/scripts/frontend-builder-global-functions.js', ['jquery'], '1.0', TRUE );
    // wp_enqueue_script( 'kasil-et-builder-modules-script', get_stylesheet_directory_uri() . '/includes/builder/scripts/frontend-builder-scripts.js', ['jquery', 'et-builder-modules-script'], '1.0', TRUE );
}

add_action( 'wp_enqueue_scripts', 'kasil_styles' );
