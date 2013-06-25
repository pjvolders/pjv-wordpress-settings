<?php

class PJVSettingsMedia extends PJVSettingsField
{
	
	function __construct($page, $section, $id, $title, $value, $description = '')
	{
		parent::__construct($page, $section, $id, $title, $value, $description);
		
		// enqueue javascript at enqueue_plugin_scripts hook
		add_action('admin_enqueue_scripts', array($this, 'enqueue_plugin_scripts'));
	}
	
	/**
	 * 
	 * Enqueue javascript for the media upload box
	 * Function should be run at admin_enqueue_scripts hook
	 * 
	 */
	function enqueue_plugin_scripts()
	{
		wp_enqueue_media();
		wp_enqueue_script( 'pjv-settings-media', plugins_url('/js/pjv-settings-media.js', dirname(__FILE__)) );
	}
	
	function field_callback_function()
	{
		?>
			<!-- Image Thumbnail -->
			<img 
				class="custom_media_image" 
				src="<?php echo $this->value ?>" 
				style="max-width:100px; float:left; margin: 0px 10px 0px 0px; display:inline-block;" />

			<!-- Upload button and text field -->
			<input 
				name="<?php echo $this->field_name ?>"
				id="<?php echo $this->id ?>"
				type="text"
				style="margin-bottom:0px;
				clear:right;"
				value="<?php echo $this->value ?>" />
			<a href="#" class="button pjv_settings_media_upload">Upload</a>
			<p class="description"><?php echo $this->description; ?></p>
		<?php
	}
}

?>