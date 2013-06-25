<?php

/**
 * Settings Sections are the groups of settings you see on WordPress settings pages with a shared heading. In your plugin you can add new sections to existing settings pages rather than creating a whole new page. This makes your plugin simpler to maintain and creates fewer new pages for users to learn. You just tell them to change your setting on the relevant existing page.
 */
class PJVSettingsSection
{
	protected $page;
	protected $id;
	protected $title;
	protected $description;
	protected $fields = array();
	protected $settings = array();
	
	/**
	 * 
	 * @param string $page 
	 * 
	 */
	function __construct($page, $id, $title = '', $description = '')
	{
		$this->page = $page;
		$this->id = $id;
		$this->title = $title;
		$this->description = $description;
		
		if (!$this->settings = get_option($this->id)) {
			$this->settings = array();
		}
		
		add_action('admin_menu', array(&$this, 'register_section'));
	}
	
	function register_section()
	{
		// register the setting, settings are stored per section
		register_setting($this->id, $this->id);
		add_settings_section( $this->id, $this->title, array($this, 'section_callback_function'), $this->page );
		
		foreach ($this->fields as $id => $field) {
			add_settings_field( $field->id, $field->title, array($field, 'field_callback_function'), $this->page, $this->id );
		}
	}
	
	/**
	 * 
	 * Add a new setting to this section
	 * 
	 * @param string $id Name of the setting, we will use this later to optain the values
	 * @param string $title
	 * @param string $type
	 * @param string $value
	 * @param string $default_value
	 * @param string $description
	 * @param array $options
	 */
	function new_setting($id, $title, $type, $default_value = '', $description = '', $options = array())
	{
		$new_field; 
		$new_value;
		
		if ( !isset($this->settings[$id]) ) {
			// the option doesn't exist yet
			$value = $default_value;
			$this->settings[$id] = $value;
			update_option( $this->id, $this->settings );
		} else {
			$value = $this->settings[$id];
		}
				
		switch ($type) {
			case 'checkbox':
				$new_field = new PJVSettingsCheckbox($this->page, $this->id, $id, $title, $value, $description);
				break;
			
			case 'media':
				$new_field = new PJVSettingsMedia($this->page, $this->id, $id, $title, $value, $description);
				break;	
			
			case 'select': // select and dropdown is the same thing
			case 'dropdown':
				$new_field = new PJVSettingsDropdown($this->page, $this->id, $id, $title, $value, $options, $description);
				break;
			
			case 'radio':
				$new_field = new PJVSettingsRadio($this->page, $this->id, $id, $title, $value, $options, $description);
				break;

			case 'textarea':
				$new_field = new PJVSettingsTextarea($this->page, $this->id, $id, $title, $value, $description);
				break;
				
			default:
				$new_field = new PJVSettingsTextfield($this->page, $this->id, $id, $title, $value, $description);
				break;
		}
		
		$this->fields[$id] = $new_field;
		//($page, $section, $id, $title, $value, $default_value = '', $description = '')
	}
	
	/*
	* 
	*/
	function section_callback_function()
	{
		?>
			<p><?php echo $this->description; ?></p>
			<?php settings_fields($this->id); ?>
		<?php
	}
	
	function get_setting($id)
	{
		if ( isset($this->fields[$id]) ) {
			return $this->fields[$id]->value;
		}
		return false;
	}

}

?>