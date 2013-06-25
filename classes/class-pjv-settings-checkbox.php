<?php

/**
* 
*/
class PJVSettingsCheckbox extends PJVSettingsField
{
	
	function field_callback_function()
	{
		?>
			<input 
				name="<?php echo $this->field_name ?>"
				id="<?php echo $this->id ?>"
				type="checkbox"
				value="yes"
				<?php checked( 'yes', $this->value ); ?>
			/> <?php echo $this->description; ?>
		<?php
	}
}

?>