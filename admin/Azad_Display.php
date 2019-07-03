<div class="wrap">
    <h2><?php esc_html_e('Azad Nice Scroll Settings','azad-nice-scroll')?></h2>
    <div id="poststuff">
        <div id="post-body" class="azad-scroll-top-settings metabox-holder columns-2">
            <div id="post-body-content">
                <form method="post" action="options.php">
                    <?php settings_fields('azad_nice_scroll_settings'); ?>
                    <?php do_settings_sections('azad_nice_scroll_settings_page'); ?>
                    <?php submit_button(esc_html__('Save Settings','ast'),'primary large'); ?>
                </form>
            </div>
            <div id="postbox-container-1" class="postbox-container">
                <div>
                    <div class="postbox">
                        <h3 class="hndle"><span><?php esc_html_e('Plugin Author','ast'); ?></span><h3>                                
                        <div class="inside">
                            <p>You need help with your website to fix an issue or to redesign it because you do not have to do it yourself. Great! i can help you. I am the plugin author and experienced WEB UI designer and WordPress developer with over six years of experience. I am the perfect freelancer for your project! Don't hesitate to <a href="https://www.gittechs.com/author" target="_blank">Contact Me</a>!</p>
                        </div>
                    </div>
                    <div class="postbox">
                        <h3 class="hndle"><span><?php esc_html_e('Plugin Info','ast'); ?></span><h3>
                        <div class="inside">
                            <ul class="ul-square">
                                <li><a href="https://www.gittechs.com/rate" target="_blank"><?php esc_html_e('Author','ast')?></a></li>
                                <li><a href="https://www.gittechs.com/rate" target="_blank"><?php esc_html_e('Support','ast')?></a></li>
                                <li><a href="https://www.gittechs.com/rate" target="_blank"><?php esc_html_e('Please rate the plugin','ast')?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br class="clear" />
    </div>
</div>