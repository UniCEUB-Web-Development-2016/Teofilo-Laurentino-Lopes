<?php

include_once "model/Request.php";
include_once "model/Group.php";
include_once "database/DatabaseConnector.php";

class GroupController
{
	private $requiredParameters = array('groupName', 'owner', 'numberParticipants', 'category');

    public function register($request)
    {
        $params = $request->get_params();
		if ($this->isValid($params)) {
        $group = new Group($params["groupName"],
            $params["owner"],
			$params["numberParticipants"],
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
        $query =  "INSERT INTO group (groupName, owner, numberParticipants, category) VALUES ('".
            $group->get_groupName()."','".
            $group->get_ownerGroup()."','".
			$group->get_numberParticipantsGroup()."','".
			$group->get_categoryGroup()."')";
        // var_dump($query);
        return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT groupName, owner, numberParticipants, category FROM group WHERE ".$crit);
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
		if(!empty($_GET["id"]) && !empty($_GET["groupName"]) && !empty($_GET["owner"]) && !empty($_GET["numberParticipants"]) && !empty($_GET["category"])) {

			$group = addslashes(trim($_GET["groupName"]));
			$owner = addslashes(trim($_GET["owner"]));
			$participants = addslashes(trim($_GET["numberParticipants"]));
			$category = addslashes(trim($_GET["category"]));
			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE group SET groupName=:group, owner=:owner, numberParticipants=:participants, category=:category WHERE id=:id");
			$result->bindValue(":group", $group);
			$result->bindValue(":owner", $owner);
			$result->bindValue(":participants", $participants);
			$result->bindValue(":category", $category);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Grupo alterado com sucesso!";
			} else {
				echo "Grupo não atualizado";
			}
		}
	}

	public function delete($request)
	{
		if (!empty($_GET["id"])){

			$id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("DELETE FROM group WHERE id = ?");
			$result->bindValue(1, $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Grupo deletado com sucesso!";
			} else {
				echo "Grupo não deletado";
			}
		}
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

