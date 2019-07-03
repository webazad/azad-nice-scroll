<?php
/**
*-------------------------------------------------------------------------------------------------
* :: @package azad-nice-scroll
* :: @version 0.0.0.1
*-------------------------------------------------------------------------------------------------
*/
defined('ABSPATH') || exit;

if(! class_exists('Azad_Public')){
    class Azad_Public{
        public static $instance = null;
        public function __construct(){
            //add_action('wp_footer',array($this,'azad_footer'),7);
        }
        public function azad_footer(){ 
            $instance = call_user_func(array(get_class($GLOBALS['azad_admin']),'_get_instance'));

            $color = $instance->azad_nice_scroll_get_plugin_settings('color');
            $cursor_width = $instance->azad_nice_scroll_get_plugin_settings('cursor_width');
            $background = $instance->azad_nice_scroll_get_plugin_settings('bg_color');
            $scroll_speed = $instance->azad_nice_scroll_get_plugin_settings('background');
        ?>
            <script type="text/javascript">
                (function($){
                    $(document).ready(
                        function(){
                            $("html").niceScroll({
                                cursorcolor: '<?php echo $color; ?>',
                                cursorwidth: '<?php echo $cursor_width; ?>px',
                                cursorborderradius: "5px",
                                scrollspeed: 40,
                                autohidemode: true,
                                background: '<?php echo $background; ?>',
                                hidecursordelay: '400',
                                cursorfixedheight: false,
                                cursorminheight: '20',
                                enablekeyboard: 'true',
                                horizrailenabled: 'true',
                                bouncescroll: 'false',
                                smoothscroll: 'true',
                                iframeautoresize: 'true',
                                touchbehavior: false,
                            });
                        }
                    );
                })(jQuery);
            </script>
<?php   }
        public static function _get_instance(){
            if(is_null(self::$instance) && ! isset(self::$instance) && ! (self::$instance instanceof self)){
                self::$instance = new self();            
            }
            return self::$instance;
        }
        public function __destruct(){}
    }
}
if(! function_exists('load_azad_public')){
    function load_azad_public(){
        return Azad_Public::_get_instance();
    }
}
$GLOBALS['azad_public'] = load_azad_public();
