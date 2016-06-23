<?php

include_once "model/Request.php";
include_once "model/Photo.php";
include_once "database/DatabaseConnector.php";

class PhotoController
{
	private $requiredParameters = array('owner', 'name_album', 'description');

	public function register($request)
	{
		$params = $request->get_params();
		if ($this->isValid($params)) {
			$photo = new Photo($params["owner"],
				$params["name_album"],
				$params["description"]);

			$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

			$conn = $db->getConnection();

			return $conn->query($this->generateInsertQuery($photo));

		} else {
			echo "Error 400: Bad Request";
		}
	}

	private function generateInsertQuery($photo)
	{
		$query = "INSERT INTO photo (owner, name_album, description) VALUES ('" .
			$photo->get_ownerPhoto() . "','" .
			$photo->get_nameAlbum() . "','" .
			$photo->get_descriptionPhoto() . "')";
		return $query;
	}

	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT id, owner, name_album, description FROM photo WHERE " . $crit);
		//foreach($result as $row) 
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	private function generateCriteria($params)
	{
		$criteria = "";
		foreach ($params as $key => $value) {
			$criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
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
		return "UPDATE photo SET " . $crit . " WHERE owner = '" . $params["owner"] ."'OR name_album = '".$params['name_album']."'OR description = '".$params['description']."'";
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
		$result = $conn->query("DELETE FROM photo WHERE id = ".$params["id"]);
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

