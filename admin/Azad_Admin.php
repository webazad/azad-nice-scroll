<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-nice-scroll
* :: @version 0.0.0.1
*-------------------------------------------------------------------------------------------------
*/
defined('ABSPATH') || exit;

if(! class_exists('Azad_Admin')){
    class Azad_Admin{
        public static $instance = null;
        public function __construct(){
            add_action('admin_menu',array($this,'azad_nices_croll_admin_menu'));
            add_action('admin_init',array($this,'azad_nice_scroll_register_settings'));
        }
        public function azad_nices_croll_admin_menu(){
            add_theme_page('Azad Nice Scroll','Azad Nice Scroll', 'manage_options', 'azad_options', array($this,'azad_nice_scroll_display'));
        }
        public function azad_nice_scroll_register_settings(){
            register_setting(
                'azad_nice_scroll_settings',
                'azad_nice_scroll_plugin_settings',
                'azad_nice_scroll_plugin_settings_validate'
            );
            add_settings_section(
                'azad_nice_scroll_general_settings',
                'You can cuztomize evrything here...',
                '__return_false',
                'azad_nice_scroll_settings_page'
            );
            add_settings_field(
                'azad_nice_scroll_color',
                esc_html('Cursor Color :','azad-nice-scroll'),
                array($this,'azad_nice_scroll_color_field'),
                'azad_nice_scroll_settings_page',
                'azad_nice_scroll_general_settings'
            );
            add_settings_field(
                'azad_nice_scroll_bg_color',
                esc_html('Background Color :','azad-nice-scroll'),
                array($this,'azad_nice_scroll_bg_color_field'),
                'azad_nice_scroll_settings_page',
                'azad_nice_scroll_general_settings'
            );
            add_settings_field(
                'azad_nice_scroll_cursor_width',
                esc_html('Cursor Width :','azad-nice-scroll'),
                array($this,'azad_nice_scroll_cursor_width_field'),
                'azad_nice_scroll_settings_page',
                'azad_nice_scroll_general_settings'
            );
            add_settings_field(
                'azad_nice_scroll_cursor_border_radius',
                esc_html('Cursor Border Radius :','azad-nice-scroll'),
                array($this,'azad_nice_scroll_cursor_border_radius_field'),
                'azad_nice_scroll_settings_page',
                'azad_nice_scroll_general_settings'
            );
            // add_settings_field(
            //     'azad_nice_scroll_hide_cursor_delay',
            //     esc_html('Hide Cursor Delay :','azad-nice-scroll'),
            //     array($this,'azad_nice_scroll_hide_cursor_delay_field'),
            //     'azad_nice_scroll_settings_page',
            //     'azad_nice_scroll_general_settings'
            // );
        }
        public function azad_nice_scroll_default_settings(){ 
            $default_settings = array(
                'cursor_color'          => '#8224e3',
                'cursor_width'          => '6',
                'cursor_border_radius'  => '5',
                //'scroll_speed'          => 40,
                //'auto_hide_mode'        => true,
                'bg_color'              => '#1e73be',
                //'hide_cursor_delay'     => 400,
                //'cursor_fixed_height'   => false,
                //'cursor_min_height'     => 20,
                //'enable_keyboard'       => true,
                //'horizrailenabled'      => true,
                //'bounce_scroll'         => false,
                //'smooth_scroll'         => true,
                //'iframe_auto_resize'    => true,
                //'touch_behavior'        => false
            );
            return apply_filters('azad_nice_scroll_default_settings', $default_settings);
        }
        public function azad_nice_scroll_get_plugin_settings($option = ''){ 
            $settings = get_option('azad_nice_scroll_plugin_settings',$this->azad_nice_scroll_default_settings());
            return  $settings[$option];
        }
        public function azad_nice_scroll_color_field(){ 
            $settings = $this->azad_nice_scroll_get_plugin_settings('cursor_color');
        ?>
            <input class="azad_color" type="text" name="azad_nice_scroll_plugin_settings[cursor_color]" value="<?php echo $settings; ?>"/>
        <?php }
        public function azad_nice_scroll_bg_color_field(){ 
            $settings = $this->azad_nice_scroll_get_plugin_settings('bg_color');
        ?>
            <input class="azad_color" type="text" name="azad_nice_scroll_plugin_settings[bg_color]" value="<?php echo $settings; ?>"/>
        <?php }
        public function azad_nice_scroll_cursor_width_field(){ 
            $settings = $this->azad_nice_scroll_get_plugin_settings('cursor_width');
        ?>
            <input class="" type="number" min="1" step="1" max="10" name="azad_nice_scroll_plugin_settings[cursor_width]" value="<?php echo $settings; ?>"/>
        <?php }
        public function azad_nice_scroll_hide_cursor_delay_field(){ 
            $settings = $this->azad_nice_scroll_get_plugin_settings('cursor_widthd');
        ?>
            <input class="" type="number" min="1" step="1" max="10" name="azad_nice_scroll_plugin_settings[cursor_widthasd]" value="<?php echo $settings; ?>"/>
        <?php }
        public function azad_nice_scroll_cursor_border_radius_field(){ 
            $settings = $this->azad_nice_scroll_get_plugin_settings('cursor_border_radius');
        ?>
            <input class="" type="number" min="1" step="1" max="6" name="azad_nice_scroll_plugin_settings[cursor_border_radius]" value="<?php echo $settings; ?>"/>
        <?php }

        public function azad_nice_scroll_display(){
            require_once(plugin_dir_path(__FILE__).'/Azad_Display.php');
        }        
        public function azad_nice_scroll_plugin_settings_validate($settings){
            return $settings;
        }
        public static function _get_instance(){
            if(is_null(self::$instance) && ! isset(self::$instance) && ! (self::$instance instanceof self)){
                self::$instance = new self();            
            }
            return self::$instance;
        }
        public function __destruct(){}
    }
}
if(! function_exists('load_azad_admin')){
    function load_azad_admin(){
        return Azad_Admin::_get_instance();
    }
}
$GLOBALS['azad_admin'] = load_azad_admin();
