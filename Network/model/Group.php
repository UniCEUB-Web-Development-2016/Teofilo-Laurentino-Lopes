<?php 

class Group
{

	private $id_group;
	private $group_name;
	private $owner;


	public function __construct($id_group, $group_name, $owner)
	{
		$this->set_idGroup($id_group);
		$this->set_groupName($group_name);
		$this->set_owner($owner);
	}


	private function set_idGroup($id_group)
	{
		$this->id_group = $id_group;
	}

	public function get_idGroup()
	{
		return $this->id_group;
	}

	private function set_groupName($group_name)
	{
		$this->group_name = $group_name;
	}

	public function get_groupName()
	{
		return $this->group_name;
	}

	private function set_owner($owner)
	{
		$this->owner = $owner;
	}

	public function get_owner()
	{
		return $this->owner;
	}
}