<?php

/**
* 
*/
abstract class PJVSettingsField
{
	
	public $value;
	public $id;
	public $title;
	protected $page;
	protected $section;
	public $description;
	protected $field_name;


	function __construct($page, $section, $id, $title, $value, $description = '')
	{	
		$this->id			= $id;
		$this->title		= $title;
		$this->page			= $page;
		$this->section		= $section;
		$this->description	= $description;
		$this->value		= $value;
		
		$this->field_name	 = $this->section.'['.$this->id.']';
				
	}

	// This function generates the HTML fo the field, should be implemented in subclass
	abstract function field_callback_function();
	
}

?>