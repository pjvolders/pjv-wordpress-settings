<?php

/**
* 
*/
class PJVSettingsTextarea extends PJVSettingsField
{
	
	function field_callback_function()
	{
		?>
			<textarea
				rows="10" cols="40" 
				name="<?php echo $this->field_name ?>"
				id="<?php echo $this->id ?>"
				class="large-text" ><?php echo $this->value ?></textarea><br />
			<p class="description"><?php echo $this->description; ?></p>
		<?php
	}
}

?>