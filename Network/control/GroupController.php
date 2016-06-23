<?php

include_once "model/Request.php";
include_once "model/Group.php";
include_once "database/DatabaseConnector.php";

class GroupController
{
	private $requiredParameters = array('groupName', 'owner', 'category');

    public function register($request)
    {
        $params = $request->get_params();
		if ($this->isValid($params)) {
        $group = new Group($params["groupName"],
            $params["owner"],
			$params["category"]);

        $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

        $conn = $db->getConnection();

		return $conn->query($this->generateInsertQuery($group));

		} else {
			echo "Error 400: Bad Request";
		}
    }
    
	private function generateInsertQuery($group)
    {
        $query = "INSERT INTO group_friends (groupName, owner, category) VALUES ('".
            $group->get_groupName()."','".
            $group->get_owner()."','".
			$group->get_category()."')";
        // var_dump($query);
		// die();
        return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT id, groupName, owner, category FROM group_friends WHERE ".$crit);
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

	public function update($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		return $conn->query($this->generateUpdateQuery($params));
	}

	private function generateUpdateQuery($params)
	{
		$crit = $this->generateUpdateCriteria($params);
		return "UPDATE group_friends SET " . $crit . " WHERE groupName = '" . $params["groupName"] . "'OR owner = '".$params['owner']. "'OR category = '".$params['category']."'";
	}

	private function generateUpdateCriteria($params)
	{
		$criteria = "";
		foreach ($params as $key => $value) {
			$criteria = $criteria . $key . " = '" . $value . "' ,";
		}
		return substr($criteria, 0, -2);
	}

	public function delete($request)
	{
		$params = $request->get_params();
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("DELETE FROM group_friends WHERE id = ".$params["id"]);
		//foreach($result as $row)
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	private function isValid($parameters)
	{
		$keys = array_keys($parameters);
		$diff1 = array_diff($keys, $this->requiredParameters);
		$diff2 = array_diff($this->requiredParameters, $keys);
		if (empty($diff2) && empty($diff1))
			return true;
		return false;
	}
}