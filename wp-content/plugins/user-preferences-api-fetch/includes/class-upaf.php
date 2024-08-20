<?php
class UPAF_User_Preferences_API_Fetch {
    public function __construct() {
        add_action('init', array($this, 'add_rewrite_endpoint'));
        add_action('woocommerce_account_upaf_preferences_endpoint', array($this, 'upaf_preferences_page'));
    }
    public function add_rewrite_endpoint() {
        add_rewrite_endpoint('upaf_preferences', EP_ROOT | EP_PAGES);
    }
    // Display user preferences in WooCommerce My Account
    public function upaf_preferences_page() {
        if (!is_user_logged_in()) {
            return;
        }
    
        $user_id = get_current_user_id();
        $preferences = get_user_meta($user_id, '_upaf_preferences', true);
        $preference_values = is_array($preferences) ? implode(',', $preferences) : '';
    
        ?>
        <div class="upaf-preferences-container">
            <h3><?php _e('User Preferences', 'upaf'); ?></h3>
            <form method="post" action="">
                <?php wp_nonce_field('upaf_save_preferences'); ?>
                <label for="preferences"><?php _e('Enter your preferences (comma-separated)', 'upaf'); ?></label>
                <input type="text" name="preferences" value="<?php echo esc_attr($preference_values); ?>" />
                <input type="submit" name="upaf_save_preferences" value="<?php _e('Save Preferences', 'upaf'); ?>" />
            </form>
        </div>
        <?php
    }
}
