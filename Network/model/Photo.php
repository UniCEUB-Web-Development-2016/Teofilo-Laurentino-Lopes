<?php 

class Photo
{

	private $owner;
	private $name_album;
	private $description;


	public function __construct($owner, $name_album, $description)
	{
		$this->set_ownerPhoto($owner);
		$this->set_nameAlbum($name_album);
		$this->set_descriptionPhoto($description);
	}

	private function set_ownerPhoto($owner)
	{
		$this->owner = $owner;
	}

	public function get_ownerPhoto()
	{
		return $this->owner;
	}

	private function set_nameAlbum($name_album)
	{
		$this->name_album = $name_album;
	}

	public function get_nameAlbum()
	{
		return $this->name_album;
	}
	
	private function set_descriptionPhoto($description)
	{
		$this->description = $description;
	}

	public function get_descriptionPhoto()
	{
		return $this->description;
	}
}