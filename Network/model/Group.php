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
		$this->set_ownerGroup($owner);
		$this->set_numberParticipantsGroup($numberParticipants);
		$this->set_categoryGroup($category);
	}

	private function set_groupName($groupName)
	{
		$this->groupName = $groupName;
	}

	public function get_groupName()
	{
		return $this->groupName;
	}

	private function set_ownerGroup($owner)
	{
		$this->owner = $owner;
	}

	public function get_ownerGroup()
	{
		return $this->owner;
	}
	
	private function set_numberParticipantsGroup($numberParticipants)
	{
		$this->numberParticipants = $numberParticipants;
	}

	public function get_numberParticipantsGroup()
	{
		return $this->numberParticipants;
	}
	
	private function set_categoryGroup($category)
	{
		$this->category = $category;
	}

	public function get_categoryGroup()
	{
		return $this->category;
	}
}