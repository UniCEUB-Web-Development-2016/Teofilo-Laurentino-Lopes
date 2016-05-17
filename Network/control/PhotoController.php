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

	public function update($request)
	{
		if(!empty($_GET["id"]) && !empty($_GET["owner"]) && !empty($_GET["name_album"]) && !empty($_GET["description"])) {

			$owner = addslashes(trim($_GET["owner"]));
			$nameAlbum = addslashes(trim($_GET["name_album"]));
			$description = addslashes(trim($_GET["description"]));
            $id = addslashes(trim($_GET["id"]));

			$params = $request->get_params();
			$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
			$conn = $db->getConnection();
			$result = $conn->prepare("UPDATE photo SET owner=:owner, name_album=:nameAlbum, description=:description WHERE id=:id");
			$result->bindValue(":owner", $owner);
			$result->bindValue(":nameAlbum", $nameAlbum);
			$result->bindValue(":description", $description);
			$result->bindValue(":id", $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Foto alterada com sucesso!";
			} else {
				echo "Foto não atualizada";
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
			$result = $conn->prepare("DELETE FROM photo WHERE id = ?");
			$result->bindValue(1, $id);
			$result->execute();
			if ($result->rowCount() > 0){
				echo "Foto deletada com sucesso!";
			} else {
				echo "Foto não deletada";
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

