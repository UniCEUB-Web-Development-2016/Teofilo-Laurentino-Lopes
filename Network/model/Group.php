<?php 

class Group
{

	private $groupName;
	private $owner;
	private $numberParticipants;
	private $category;

	public function __construct($groupName, $owner, $numberParticipants, $category)
	{
		$this->set_groupName($groupName);
		$this->set_owner($owner);
		$this->set_numberParticipants($numberParticipants);
		$this->set_category($category);
	}

	private function set_groupName($groupName)
	{
		$this->groupName = $groupName;
	}

	public function get_groupName()
	{
		return $this->groupName;
	}

	private function set_owner($owner)
	{
		$this->owner = $owner;
	}

	public function get_owner()
	{
		return $this->owner;
	}
	
	private function set_numberParticipants($numberParticipants)
	{
		$this->numberParticipants = $numberParticipants;
	}

	public function get_numberParticipants()
	{
		return $this->numberParticipants;
	}
	
	private function set_category($category)
	{
		$this->category = $category;
	}

	public function get_category()
	{
		return $this->category;
	}
}