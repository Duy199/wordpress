<?php
// functions.php

// Load scripts & styles
require_once get_template_directory() . '/inc/enqueue.php';

// Register menu
register_nav_menus([
    'primary' => __('Main Menu', 'nightlife'),
]);

// Load ACF fields
// require_once get_template_directory() . '/inc/acf-fields.php';

// Shortcode support
// require_once get_template_directory() . '/inc/shortcodes.php';

// Enable featured image
add_theme_support('post-thumbnails');



