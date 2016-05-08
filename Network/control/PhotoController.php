<?php

include_once "model/Request.php";
include_once "model/Photo.php";
include_once "database/DatabaseConnector.php";

class PhotoController
{
    public function register($request)
    {
        $params = $request->get_params();
        $photo = new Photo($params["owner"],
            $params["name_album"],
			$params["description"]);

        $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($photo));
    }
    private function generateInsertQuery($photo)
    {
        $query =  "INSERT INTO photo (owner, name_album, description) VALUES ('".
            $photo->get_ownerPhoto()."','".
            $photo->get_nameAlbum()."','".
            $photo->get_descriptionPhoto()."')";
        return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT owner, name_album, description FROM photo WHERE ".$crit);
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

