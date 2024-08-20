<?php
class UPAF_User_Preferences_API_Fetch {
    public function __construct() {
        add_action('init', array($this, 'add_rewrite_endpoint'));
    }
    public function add_rewrite_endpoint() {
        add_rewrite_endpoint('upaf_preferences', EP_ROOT | EP_PAGES);
    }
}
