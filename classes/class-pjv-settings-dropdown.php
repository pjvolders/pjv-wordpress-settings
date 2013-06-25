<?php

class PJVSettingsDropdown extends PJVSettingsField
{
	public $options = array();
	
	/**
	 * 
	 * @param unknown $page
	 * @param unknown $section
	 * @param unknown $id
	 * @param unknown $title
	 * @param unknown $value
	 * @param array $options Possible choises as array( value => 'option text', ... )
	 * @param string $description
	 */
	function __construct($page, $section, $id, $title, $value, $options, $description = '')
	{
		parent::__construct($page, $section, $id, $title, $value, $description);
		
		if (is_array($options)) {
			$this->options = $options;
		}
	}
	
	function field_callback_function()
	{
		?>
			<select 
				name="<?php echo $this->field_name ?>"
				id="<?php echo $this->id ?>" >
				<?php foreach ($this->options as $o_val => $o_text): ?>
					<option value="<?php echo $o_val; ?>" <?php selected($this->value, $o_val)?>><?php echo $o_text; ?></option>
				<?php endforeach; ?>
			</select>
			<p class="description"><?php echo $this->description; ?></p>
		<?php
	}
}

?>