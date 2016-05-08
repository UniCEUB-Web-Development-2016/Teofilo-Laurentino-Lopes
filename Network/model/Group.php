<?php 

class Group
{

	private $group_name;
	private $owner;
	private $number_participants;
	private $category;

	public function __construct($group_name, $owner, $number_participants, $category)
	{
		$this->set_groupName($group_name);
		$this->set_owner($owner);
		$this->set_numberParticipants($number_participants);
		$this->set_category($category);
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
	
	private function set_numberParticipants($number_participants)
	{
		$this->number_participants = $number_participants;
	}

	public function get_numberParticipants()
	{
		return $this->number_participants;
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