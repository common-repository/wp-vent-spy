<?php
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
//|        __        __  .     __     .  __               __        __     - 0 -|
//| *     /\ \     ./\ \   *  /\ \      /\ \     *       /\ \  .   /\ \     / \ |
//|      /::\ \*   /::\ \    /::\ \  . /::\ \      .__  /::\ \    /: | |  .     |
//|    */:/\:\ \  /:/\:\ \  /:/\:\ \  /:/\:\ \     /\_\/:/\:\ \  /: :| |   _    |
//|    /:/ /\:\ \/:/ /\:\ \/::\ \:\ \ \:\ \:\ \   _\/_/:/ /\:\ \/:/|:| |  /\_\  |
//|   /:/_/  \:\_\/_/ *\:| |/\:\_\:\_\_\:\ \:\_\ /\_\/:/_/ _\:\_\/ |:| | /:/ /  |
//|   \:\ \. /:/ /\ \  /:/ /\ \/_/\/_/\ \:\ \/_//:/ /\:\ \/\ \/_/ /|:| |/:/ /   |
//|    \:\ \/:/ /\:\ \/:/ /\:\ \     \:\ \:\_\//:/ /  \:\ \:\_\/_/ |:| /:/ /    |
//|     \:\/:/ /  \:\/:/ /  \:\_\     \:\/:/ //:/ /    \:\/:/_/    |:|/:/ /     |
//|      \::/ /  . \::/ /    \/_/   *  \::/ //:/ /   .  \::/ /   * |:::/ /   .  |
//|    .  \/_/      ~~~~                \/_/ \/_/  .     \/_/      |__/_/       |
//|                                                                             |
//|                Hand coded web software by Onykage Designs                   |
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
/*
  Plugin Name: Wordpress Ventrilo Spy
  Plugin URI: http://superscriptz.net/onykage/wordpress/wp-ventrilo-status-monitor/
  Description: Ventrilo Status Monitor for Wordpress
  Author: Onykage
  Version: 1.2.3
  Author URI: http://www.superscriptz.net
*/
//|
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|
//|                                                                             |
//|  Change Log                                                                 |
//|-----------------------------------------------------------------------------|
//|2009-05-29 >> Initial start.                                                 |
//|-----------------------------------------------------------------------------|
//|2009-07-15 >> Update                                                         |
//|                                                                             |
//|>>  added ajax refresh option                                                |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-08-07 >> Update                                                         |
//|                                                                             |
//|>>  cleaned up the php                                                       |
//|>>  fixed the status file location bug                                       |
//|>>  added the wp-extremespy plugin to the widget.                            |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-09-30 >> Update                                                         |
//|                                                                             |
//|>>  fixed the version mishap(script just reached 1.0 status.)                |
//|>>  added options page                                                       |
//|>>  added hosted option                                                      |
//|>>  change widget control to dynamic insertion                               |      
//|>>  added file permissions test option for the managed section.              |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-10-03 >> Update                                                         |
//|                                                                             |
//|>> fixed display delay for hosted option                                     |
//|>> added hosted.php file(jQuery work around for Post())                      |
//|>> added loading.gif                                                         |
//|>> added loading sequence in ajax to increase page load speeds               |
//|>> added fancy graphics to display                                           |
//|>> updated screenshots                                                       |
//|>> added width options                                                       |
//|>> added fancy/plain toggle                                                  |
//|>> added custom colors                                                       |
//|>> added hex color data to buildTable                                        |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-10-27 >> Update                                                         |
//|                                                                             |
//|>> replaced file_get_content with cURL.  for a php.ini workaround.           |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-12-01 >> Update                                                         |
//|                                                                             |
//|>> fixed several precurser parse and instant errors.                         |
//|>> added some security fixes                                                 |
//|>> added some statitical resorce information to help with debugging.         |
//|>> fixed fancy toggle and color options                                      |
//|                                                                             |  
//|-----------------------------------------------------------------------------|
//|2009-12-02 >> Update                                                         |
//|                                                                             |  
//|>> fixed no jQuery issue                                                     |
//|>> more code cleanup                                                         |
//|>> changed options page header to be dynamic                                 |
//|>> added ad into the hosted option                                           |
//|>> fixed type errros in readme                                               |
//|>> included the ability to set width and height and overflow styling         |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-12-03 >> Update                                                         |
//|                                                                             |  
//|>> added Instant Ventrilo Sponsorship info and banner to options page        |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2009-12-29 >> Update                                                         |
//|                                                                             |  
//|>> added Donation Authorization Option                                       |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2010-01-05 >> Update                                                         |
//|                                                                             |  
//|>> fixed multiple security issues with donation system.                      |
//|>> changed loader.gif to ajax-loader.gif                                     |
//|>> changed loading div to align center, and be the width of the sidebar      |
//|>> adjustments made for changing the loader image tutorial                   |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2010-01-11 >> Update                                                         |
//|                                                                             |
//|>> moved ajax were it belongs (in the head).                                 |
//|>> optimized ajax for smoother operation (now 40% faster process time)       |
//|>> removed loading image                                                     |
//|>> added ventrilo logo to the title bar                                      |
//|>> reorganised the options page to a more logical easy to use page           |
//|>> added ajax based refresh effect                                           |
//|>> added toggle based menu to extremespy utility                             |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2010-01-22 >> Update                                                         |
//|                                                                             |
//|>> removed auto refresh for chmod fix on the base program                    |
//|>> added additional plugin upgrade info area                                 |
//|>> added additional settings link to plugin base                             |
//|                                                                             |
//|-----------------------------------------------------------------------------|
//|2010-02-12 >> Update                                                         |
//|                                                                             |
//|>> Fixed bug with the validation button showing up on managed interface      |
//|>> added toggle for the menubar in the managed status window                 |
//|>> added toggle for Ventrilo Logo in titlebar                                |
//|                                                                             |
//|-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-|
//|                            GPL & MIT LICENSE                                |
//|-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-|
//| Copyright 2009 - 2010  Onykage  (email : design@onykage.com)                |
//| Copyright 2009  Stefan Petre (website : www.eyecon.ro) (colorpicker.js)     |
//|                                                        (colorpicker.css)    |
//|                                                                             |
//| This program is free software; you can redistribute it and/or modify        |
//| it under the terms of the GNU General Public License as published by        |
//| the Free Software Foundation; either version 2 of the License, or           |
//| (at your option) any later version.                                         |
//|                                                                             |
//| This program is distributed in the hope that it will be useful,             |
//| but WITHOUT ANY WARRANTY; without even the implied warranty of              |
//| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the               |
//| GNU General Public License for more details.                                |
//|                                                                             |
//| You should have received a copy of the GNU General Public License           |
//| along with this program; if not, write to the Free Software                 |
//| Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA  |
//|                                                                             |
//|-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-+-|

// Globals
$plugin_url = defined('WP_PLUGIN_URL') ? trailingslashit(WP_PLUGIN_URL . '/' . dirname(plugin_basename(__FILE__))) : trailingslashit(get_bloginfo('wpurl')) . PLUGINDIR . '/' . dirname(plugin_basename(__FILE__)); 

add_action('admin_menu', 'vspy_add_pages');
add_action('admin_head', 'vspy_options_tools');
//add_action('after_plugin_row', 'add_plugin_update_row', 10, 2);
add_filter('plugin_action_links', 'add_plugin_options_link', 10, 2);

function vspy_add_pages() {
    add_options_page('WP Vent Spy', 'WP Vent Spy', 'administrator', 'VentSpy Options', 'vspy_options_page');
}
/* for future use
function add_plugin_update_row($links, $file) {
    static $this_plugin;
    global $wp_version;
    if (!$this_plugin){
        $this_plugin = plugin_basename(__FILE__);
    }
    
    //if ($file == $this_plugin ){
        $current = get_option('update_plugins');
        if (!isset($current->response[$file])) {
            return false;
        }
        
        $columns = substr($wp_version, 0, 3) >= "2.8" ? 3 : 5;
        $url = "http://superscriptz.net/wp-vent-spy/upgrade.txt";
        $update = wp_remote_fopen($url);
        echo '<td colspan="'.$columns.'">';
        echo $update;
        echo '</td>';
        echo 'test';
    //}
}
*/
function add_plugin_options_link($links, $file) {
    static $this_plugin;
    if (!$this_plugin) $this_plugin = plugin_basename(__FILE__);
    
    if ($file == $this_plugin ){
        $settings_link = "<a href=\"".get_bloginfo('url')."/wp-admin/options-general.php?page=VentSpy Options\">Settings</a>";
        array_unshift($links, $settings_link);
    }
    return $links;
}

function vspy_options_tools() {
    global $plugin_url;
    ?>
    <link rel="stylesheet" href="<?php echo $plugin_url; ?>includes/css/colorpicker.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo $plugin_url; ?>includes/css/options.css" type="text/css" />
    <?php include dirname(__FILE__)."/includes/buildin/build_colorpicker_css.inc"; ?>
    <?php include dirname(__FILE__)."/includes/buildin/build_options_css.inc"; ?>
    <script type="text/javascript" src="<?php echo $plugin_url; ?>includes/js/options.js"></script>
    <script type="text/javascript" src="<?php echo $plugin_url; ?>includes/js/colorpicker.js"></script>
    <?php include dirname(__FILE__)."/includes/buildin/build_colorpicker_js.inc"; ?>
    <?php include dirname(__FILE__)."/includes/buildin/build_options_js.inc"; ?>
<?php }

function vspy_options_page() {
    include 'includes/options.php';
}


//error_reporting(E_ALL);
add_action("widgets_init", 'load_vspy_widget');
add_action('wp_head', create_function('', "wp_enqueue_script('jquery');"), 7);
add_action('wp_head', 'vspy_init');

    function vspy_init(){
        global $plugin_url;
?>
        <!-- Get Ventrilo Channel -->
        <script language='JavaScript' type='text/javascript'>
            function startUpdate(){
                if (!jQuery('#vspy .content').length){
                    jQuery("<div class='content' />").appendTo("#vspy").css({'position' : 'relative', 'top' : '0px', 'left' : '0px'});
                }
                if (!jQuery('#vspy-server').length){
                    jQuery('<div id="vspy-server"></div>').appendTo("#vspy").css({'position' : 'relative', 'top' : '0px', 'left' : '0px'});
                }
            }
            function loadVspystatus(){
                startUpdate();
                jQuery.ajax({
                    type: "POST",
                    url: "<?php echo $plugin_url; ?>includes/status.php",
                    data: {vaddy: "<?php echo get_option('vaddy'); ?>", vport: "<?php echo get_option('vport'); ?>", vpass: "<?php echo get_option('vpass'); ?>", vsname: "<?php echo get_option('vsname'); ?>", hosted: "<?php echo get_option('hosted'); ?>", fancy: "<?php echo get_option('fancytog'); ?>", chcolor: "<?php echo get_option('chcolor'); ?>", adcolor: "<?php echo get_option('adcolor'); ?>", phcolor: "<?php echo get_option('phcolor'); ?>", uscolor: "<?php echo get_option('uscolor'); ?>",donateid: "<?php echo get_option('valid'); ?>", thispage: "<?php echo get_bloginfo('url');?>", usemenu: "<?php echo get_option('showmenu');?>"},
                    success: function(data){
                        jQuery('#vspy-server').show().slideUp(500).html(data).slideDown(500);
                    }
                });
            }
            jQuery("#vspy-refresh").live("click",function(){
                loadVspystatus();
                return false;
            });
            jQuery("#vspy-change").live("click",function(){
                jQuery('#vspy-server').empty();                          
                loadVspystatus();                             
            });
        </script>
<?php 
    }   

    function vspy_widget($args){
        global $plugin_url;
        $refresh = get_option('refresh');
        if(empty($refresh)){
            $refresh = '120';
        }
        $hosted = get_option('hosted');
        echo $args['before_widget'];
        echo $args['before_title']."<table border='0' cellpadding='0' cellspacing='0'><tr><td style='padding-right: 5px;'>";
        if(get_option('showlogo') != ""){echo "<img src='".$plugin_url."includes/images/ventlogo.gif' atl='WP Ventrilo Spy'/>";}
        echo "</td><td>".get_option('winame')."</td></tr></table>".$args['after_title'];

        echo "<script type=\"text/javascript\">jQuery(document).ready(loadVspystatus);</script>\n";
        
        echo "<div id=\"vspy\" style=\"position: relative; display: block; ";
        if(get_option('wigheight') != ""){echo "height: ".get_option('wigheight')."px; "; }
        if(get_option('wigwidth') != ""){echo "width: ".get_option('wigwidth')."px; "; }
        if(get_option('overflow') == "1"){echo "overflow: auto; ";}
        if(get_option('transbg') == "" && get_option('hosted') == "FALSE"){echo "background: #".get_option('bgcolor')."; "; }
        echo "\"></div>\n";
        
        echo $args['after_widget'];
    }
    function load_vspy_widget(){
        wp_register_sidebar_widget( 'vspy1', 'WP Vent Spy', 'vspy_widget', array('description' => __('A simple Ventrilo server status monitor for Wordpress.')) );
    }
?>