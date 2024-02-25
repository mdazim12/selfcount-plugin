<?php
/*
Plugin Name: Self Count
Plugin URL: https://www.fiverr.com/users/azim2580/seller_dashboard
Description: This is plugin for count post word
Version: 1.0
Author: azim
Author URL: https://www.fiverr.com/users/azim2580/seller_dashboard
License: GPLv2 or latter
Text Domain: selfcount
Domain Path: /languages/ 
*/

// function selfcount_activaton(){
//     echo 'plugin Activated succesfully';
// }
// register_activation_hook(__FILE__,'selfcount_activaton');

// function selfcount_deactivation(){
//     echo 'plugin deactivated';
// }
// register_deactivation_hook(__FILE__,'selfcount_deactivation');


function selfcount_text_domain(){
    load_plugin_textdomain('selfcount',false,dirname(__FILE__).'/languages');
}
add_action('plugins_loaded','selfcount_text_domain' );



function selfcount_word_count($content){
    $stripped_text = strip_tags($content);
    $word_number  =str_word_count($stripped_text);
    $label         = __('TOTAL NUMBER OF WORD','selfcount');
    $content       =sprintf('<h2>%s: %s</h2>',$label,$word_number);
    return $content;
}
add_filter('the_content','selfcount_word_count');
