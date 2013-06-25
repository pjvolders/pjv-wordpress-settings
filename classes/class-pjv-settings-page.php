<?php

/**
* Creating custom options panels in WordPress is relatively easy.
*/
class PJVSettingsPage
{
	protected $parent_slug;
	protected $title;
	protected $capability;
	protected $id;
	protected $sections = array();
	protected $description;

	function __construct($id, $title, $description = '', $parent_slug = 'tools.php', $capability = 'manage_options')
	{
		$this->parent_slug	= $parent_slug;
		$this->title		= $title;
		$this->capability	= $capability;
		$this->id			= $id;
		$this->description	= $description;

		add_action('admin_menu', array($this, 'register_submenu_page'));
	}
	
	function register_submenu_page()
	{
		add_submenu_page( $this->parent_slug, $this->title, $this->title, $this->capability, $this->id, array(&$this, 'page_callback_function') );
	}
	
	/*
	* Callback function generates HTML for the settings page
	*/
	function page_callback_function()
	{
		?>

			<div class="wrap">
				<?php screen_icon(); ?>
				<h2><?php echo $this->title; ?></h2>
				<p>
					<?php echo $this->description; ?>
				</p>
				<form method="post" action="options.php"> 
					<?php do_settings_sections($this->id); ?>
					<?php submit_button(); ?>
				</form>
			</div>

		<?php
	}
	
	/**
	 * 
	 * Adds a new section to this page
	 * 
	 * @param string $section_id
	 * @param string $section_title
	 * @param string $section_description
	 * @return PJVSettingsSection The new section
	 */
	public function new_section($section_id, $section_title = '', $section_description = '')
	{
		$new_section = new PJVSettingsSection($this->id, $section_id, $section_title, $section_description);

		array_push($this->sections, $new_section);

		return $new_section;
	}

}

?>