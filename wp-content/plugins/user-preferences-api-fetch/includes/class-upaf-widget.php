<?php
class UPAF_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'upaf_widget',
            __('User Data Widget', 'upaf'),
            array('description' => __('Displays data based on user preferences.', 'upaf'))
        );
    }
    // Placeholder for actual widget content
    public function widget($args, $instance) {
        if (!is_user_logged_in()) {
            echo '<p>' . __('Please log in to view this widget.', 'upaf') . '</p>';
            return;
        }

        $user = wp_get_current_user();
        $user_id = get_current_user_id();
        $preferences = get_user_meta($user_id, '_upaf_preferences', true);

        if (!$preferences) {
            echo $args['before_widget'] . $args['before_title'] . __('No preferences set', 'upaf') . $args['after_title'] . $args['after_widget'];
            return;
        }

        $output = '';

        foreach ($preferences as $preference) {
            $output .= $this->fetch_data_from_api($preference);
        }

        // Placeholder for actual widget content
        echo $args['before_widget'];
        echo $args['before_title'] . __('User Preferences', 'upaf') . $args['after_title'];
        echo $output;
        echo $args['after_widget'];
    }

    private function fetch_data_from_api($preference) {
        // If preference is 'username', 'email', or 'nickname', fetch from user data
        $user_id = get_current_user_id();
        $user_info = get_userdata($user_id);

        switch ($preference) {
            case 'username':
                return '<p>' . __('Username: ', 'upaf') . esc_html($user_info->user_login) . '</p>';

            case 'email':
                return '<p>' . __('Email: ', 'upaf') . esc_html($user_info->user_email) . '</p>';

            case 'nickname':
                return '<p>' . __('Nickname: ', 'upaf') . esc_html($user_info->nickname) . '</p>';

            default:
                return '<p>' . esc_html($preference) . ': ' . __('Preference not recognized', 'upaf') . '</p>';
        }
    }
}
