<?php
use Elementor\Widget_Base;

class DuyDev_CTA_Box extends Widget_Base {
    public function get_name() { return 'duydev_cta_box'; }
    public function get_title() { return 'DuyDev: CTA Box'; }
    public function get_icon() { return 'eicon-button'; }
    public function get_categories() { return ['duydev-cat']; }

    protected function render() {
        echo '<div style="padding:20px;border:2px solid #f90;">📢 Call to Action: Let’s GO!</div>';
    }
}
