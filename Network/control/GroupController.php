<?php

include_once "model/Request.php";
include_once "model/Group.php";
include_once "database/DatabaseConnector.php";

class GroupController
{
    public function register($request)
    {
        $params = $request->get_params();
        $group = new Group($params["group_name"],
            $params["owner"],
			$params["number_participants"],
			$params["category"]);

        $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($group));
    }
    
	private function generateInsertQuery($group)
    {
        $query =  "INSERT INTO group (groupName, owner, numberParticipants, category) VALUES ('".
            $group->get_groupName()."','".
            $group->get_owner()."','".
			$group->get_numberParticipants()."','".
			$group->get_category()."')";
        return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT group_name, owner, numberParticipants, category FROM group WHERE ".$crit);
		//foreach($result as $row) 
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	private function generateCriteria($params) 
	{
		$criteria = "";
		foreach($params as $key => $value)
		{
			$criteria = $criteria.$key." LIKE '%".$value."%' OR ";
		}
		return substr($criteria, 0, -4);	
	}	
}

