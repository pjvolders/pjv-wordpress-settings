<?php
/*
Plugin Name: Wordpress settings framework
Description: 
Version: 1.0
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

// custom action that can be used by plugin writers
add_action( 'init', 'load_pjv_settings_modules' );
function load_pjv_settings_modules() {
	do_action('pjv-settings-loaded');
}

function eg_settings_api_init() {

	$tmp1 = new PJVSettingsPage('custom-settings-page', 'Eigen instellingen', 'Berschijving');
	$sect = $tmp1->new_section('custom-settings-section', 'Mooie sectie');
	$sect->new_setting('test_optie', 'Test optie', 'textfield', 'Wat een zever', 'Mooie beschrijving');
	$sect->new_setting('test_optie_2', 'Klik voor shit', 'checkbox');
	$sect->new_setting('test_optie_3', 'blabla', 'media');
	$sect->new_setting('test_optie_4', 'Mooi zo', 'media', '', 'Beschrijving');
	$sect->new_setting('optie_5', 'Kies maar iets', 'dropdown', null, '', array('aaa' => 'ja', 'bbb' => 'nee') );
	$sect->new_setting('optie_7', 'Kies maar iets', 'radio', 'bbb', 'Haha leuk he', array('aaa' => 'ja', 'bbb' => 'nee') );
	$sect->new_setting('optie_8', 'Grote optie', 'textarea', null, 'Mooie beschrijving');
	
}// eg_settings_api_init()
add_action('pjv-settings-loaded', 'eg_settings_api_init');





?>