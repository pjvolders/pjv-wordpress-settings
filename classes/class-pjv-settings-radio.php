<?php

class PJVSettingsRadio extends PJVSettingsField
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
			<?php foreach ($this->options as $o_val => $o_text): ?>
				<label title="<?php echo $o_val; ?>">
					<input 
						type="radio" 
						name="<?php echo $this->field_name ?>"
						value="<?php echo $o_val; ?>"
						<?php checked($this->value, $o_val)?>>&nbsp;
						<span><?php echo $o_text; ?></span>
				</label><br />
			<?php endforeach; ?>
			<p class="description"><?php echo $this->description; ?></p>
		<?php
	}
}

?>