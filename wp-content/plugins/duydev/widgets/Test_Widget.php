<?php
use Elementor\Widget_Base;

class DuyDev_Test_Widget extends Widget_Base {
    public function get_name() { return 'duydev_test_widget'; }
    public function get_title() { return 'DuyDev: Test'; }
    public function get_icon() { return 'eicon-code'; }
    public function get_categories() { return ['duydev-cat']; }

    protected function render() {
        echo '<div style="padding:20px;background:#f1f1f1;">🧪 This is Test Widget</div>';
    }
}
