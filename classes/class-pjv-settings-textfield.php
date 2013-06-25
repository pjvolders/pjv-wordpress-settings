<?php

/**
* 
*/
class PJVSettingsTextfield extends PJVSettingsField
{
	
	function field_callback_function()
	{
		?>
			<input 
				name="<?php echo $this->field_name ?>"
				id="<?php echo $this->id ?>"
				type="text"
				value="<?php echo $this->value ?>" />
			<br />
			<p class="description"><?php echo $this->description; ?></p>
		<?php
	}
}

?>