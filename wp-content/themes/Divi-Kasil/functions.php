<?php

// adds class to body for easier styling
function kasil_body_classes($classes)
{
    $classes[] = 'kasil';
        if (is_404()) {
        $classes[] = 'et_pb_gutters' . et_get_option( 'gutter_width', '3' );
    }
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
?>