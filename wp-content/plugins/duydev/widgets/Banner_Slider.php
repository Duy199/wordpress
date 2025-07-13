<?php
use Elementor\Widget_Base;

class DuyDev_Banner_Slider extends Widget_Base {
    public function get_name() { return 'duydev_banner_slider'; }
    public function get_title() { return 'DuyDev: Banner Slider'; }
    public function get_icon() { return 'eicon-slider-push'; }
    public function get_categories() { return ['duydev-cat']; }

    protected function render() {
        echo '<div style="padding:20px;background:#000;color:#fff;">🎞️ Banner slider here (fake)</div>';
    }
}
