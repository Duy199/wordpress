<?php
/**
 * Plugin Name: DuyDev Plugin
 * Description: Elementor widget & custom plugin for DuyDev theme.
 * Version: 1.0.0
 * Author: Duy Tran
 * Text Domain: duydev
 */

defined('ABSPATH') || exit;

class DuyDev {
    private static $_instance = null;

    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        define('DUYDEV_PLUGIN_URL', plugin_dir_url(__FILE__));
        define('DUYDEV_PLUGIN_PATH', plugin_dir_path(__FILE__));
        define('DUYDEV_IMG', DUYDEV_PLUGIN_URL . 'assets/images/');

        add_action('plugins_loaded', [$this, 'init']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('elementor/frontend/after_register_scripts', [$this, 'widget_scripts']);
        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
    }

    public function init() {
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_elementor']);
            return;
        }

        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets']);
    }

    public function admin_notice_missing_elementor() {
        if (isset($_GET['activate'])) unset($_GET['activate']);
        echo '<div class="notice notice-warning is-dismissible"><p><strong>DuyDev Plugin</strong> requires <strong>Elementor</strong> to be installed and activated.</p></div>';
    }

    public function add_elementor_widget_categories($elements_manager) {
        $elements_manager->add_category(
            'duydev-cat',
            [
                'title' => __('DuyDev Widgets', 'duydev'),
                'icon'  => 'fa fa-star',
            ]
        );
    }

    public function register_widgets() {
        foreach (glob(DUYDEV_PLUGIN_PATH . 'widgets/*.php') as $file) {
            require_once $file;
            $class_name = 'DuyDev_' . str_replace('.php', '', basename($file));
            if (class_exists($class_name)) {
                \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new $class_name());
            }
        }
    }

    public function register_scripts() {
        wp_enqueue_script('jquery');

        wp_register_style('duydev-style', DUYDEV_PLUGIN_URL . 'assets/build/style.min.css');
        wp_register_script('duydev-script', DUYDEV_PLUGIN_URL . 'assets/build/js/custom.min.js', ['jquery'], false, true);

        wp_localize_script('duydev-script', 'duydev_data', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('duydev_nonce'),
        ]);
    }


    public function widget_scripts() {
        wp_enqueue_style('duydev-style');
        wp_enqueue_script('duydev-script');
    }
}

// Boot it
DuyDev::instance();
