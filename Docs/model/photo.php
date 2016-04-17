<?php 

class Photo
{

	private $id_photo;
	private $name_photo;
	private $name_album;


	public function __construct($id_photo, $name_photo, $name_album)
	{
		$this->set_idPhoto($id_photo);
		$this->set_namePhoto($name_photo);
		$this->set_nameAlbum($name_album);
	}


	private function set_idPhoto($id_photo)
	{
		$this->id_photo = $id_photo;
	}

	public function get_idPhoto()
	{
		return $this->id_photo;
	}

	private function set_namePhoto($name_photo)
	{
		$this->name_photo = $name_photo;
	}

	public function get_namePhoto()
	{
		return $this->name_photo;
	}

	private function set_nameAlbum($name_album)
	{
		$this->name_album = $name_album;
	}

	public function get_nameAlbum()
	{
		return $this->name_album;
	}
}