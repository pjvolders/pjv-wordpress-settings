<?php

/**
* Does not display an editable field but useful for reporting status messages 
* on the settings page
*/
class PJVSettingsInfo extends PJVSettingsField
{
	
	function field_callback_function()
	{
		?>
			<p class="description"><?php echo $this->value; ?></p>
		<?php
	}
}

?>