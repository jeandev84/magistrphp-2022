<?php
class News{

	public $id;
	public $title;
	public $description;
	public $datetime;

	function __construct($id, $title, $description, $datetime){
		$this->id=$id;
		$this->title=$title;		
		$this->description=$description;
		$this->datetime=$datetime;
	}


}

?>