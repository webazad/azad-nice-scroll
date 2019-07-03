<?php
/* 
Plugin Name: Azad Nice Scroll
Description: Description will go here...
Plugin URi: gittechs.com/plugin/azad-nice-scroll
Author: Md. Abul Kalam Azad
Author URI: gittechs.com/author
Author Email: webdevazad@gmail.com
Version: 0.0.0.1
Text Domain: azad-nice-scroll
*/ 
// DENY IF DIRECTLY ACCESSED
defined('ABSPATH') || exit;

if(! class_exists('Azad_Nice_Scroll')){
    final class Azad_Nice_Scroll{
        public static $instance = null;
        public function __construct(){
            add_action('plugins_loaded',array($this,'constants'),1);
            add_action('plugins_loaded',array($this,'i18n'),2);
            add_action('plugins_loaded',array($this,'includes'),3);
            add_action('plugins_loaded',array($this,'azad_admin'),4);
            add_action('admin_enqueue_scripts',array($this,'azad_admin_acripts'),5);
            add_action('wp_enqueue_scripts',array($this,'azad_public_scripts'),6);
            add_action('wp_footer',array($this,'azad_public'),7);            
        }
        public function constants(){}
        public function i18n(){}
        public function includes(){
            require_once(plugin_dir_path(__FILE__).'/admin/Azad_Admin.php');
            require_once(plugin_dir_path(__FILE__).'/public/Azad_Public.php');
        }
        public function azad_admin(){}
        public function azad_admin_acripts(){
            wp_register_style('azad-nice-scroll-admin',plugins_url('admin/css/azad-nice-scroll-admin.css',dirname(__FILE__)),array('wp-color-picker'),'0.0.0.1','all');
            wp_enqueue_style('azad-nice-scroll-admin');
            
            wp_register_script( 'azad-nice-scroll-color', plugins_url( 'admin/js/azad_color.js', __FILE__ ), array('wp-color-picker'), 1.0, true );
            wp_enqueue_script('azad-nice-scroll-color');
        }
        public function azad_public(){ 
            $instance = call_user_func(array(get_class($GLOBALS['azad_public']),'_get_instance'));
            $instance->azad_footer();
        }
        public function azad_public_scripts(){
            wp_enqueue_script('jquery');

            wp_register_script( 'azad-nice-scroll', plugins_url( 'public/js/jquery.nicescroll.min.js', __FILE__ ), 'jquery', 1.0, true );
            wp_enqueue_script('azad-nice-scroll');
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
if(! function_exists('load_azad_nice_scroll')){
    function load_azad_nice_scroll(){
        return Azad_Nice_Scroll::_get_instance();
    }
}
$GLOBALS['azad_nice_scroll'] = load_azad_nice_scroll();
