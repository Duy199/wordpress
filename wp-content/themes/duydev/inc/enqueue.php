<?php
function duy_enqueue_scripts() {
    // CSS
    wp_enqueue_style(
        'duy-theme-style',
        get_template_directory_uri() . '/assets/css/custom.min.css',
        [],
        filemtime(get_template_directory() . '/assets/css/custom.min.css') // version theo file
    );

    // JS
    wp_enqueue_script(
        'duy-theme-script',
        get_template_directory_uri() . '/assets/build/bundle.min.js',
        [],
        filemtime(get_template_directory() . '/assets/build/bundle.min.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'duy_enqueue_scripts');