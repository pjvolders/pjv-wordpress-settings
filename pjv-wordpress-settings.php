<?php
/*
Plugin Name: Wordpress settings framework
Description: 
Version: 1.1
Author: PJVolders
*/

// load the required classes
require_once 'classes/class-pjv-settings-page.php';
require_once 'classes/class-pjv-settings-section.php';
require_once 'classes/class-pjv-settings-field.php';
require_once 'classes/class-pjv-settings-textfield.php';
require_once 'classes/class-pjv-settings-checkbox.php';
require_once 'classes/class-pjv-settings-media.php';
require_once 'classes/class-pjv-settings-dropdown.php';
require_once 'classes/class-pjv-settings-radio.php';
require_once 'classes/class-pjv-settings-textarea.php';
require_once 'classes/class-pjv-settings-info.php';

// custom action that can be used by plugin writers
add_action( 'init', 'load_pjv_settings_modules' );
function load_pjv_settings_modules() {
	do_action('pjv-settings-loaded');
}

?>