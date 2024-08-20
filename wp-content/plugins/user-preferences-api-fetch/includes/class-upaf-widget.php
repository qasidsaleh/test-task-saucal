<?php
class UPAF_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'upaf_widget',
            __('User Data Widget', 'upaf'),
            array('description' => __('Displays data based on user preferences.', 'upaf'))
        );
    }
    public function widget($args, $instance) {
        echo '<p>' . __('Widget is functional.', 'upaf') . '</p>';
    }
}
