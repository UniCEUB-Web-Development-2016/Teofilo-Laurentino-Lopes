<?php

include_once "model/Request.php";
include_once "model/Photo.php";
include_once "database/DatabaseConnector.php";

class PhotoController
{
    public function register($request)
    {
        $params = $request->get_params();
        $photo = new Photo($params["id_photo"],
            $params["name_photo"],
            $params["name_album"]);

        $db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($photo));
    }
    private function generateInsertQuery($photo)
    {
        $query =  "INSERT INTO photo (id_photo, name_photo, name_album) VALUES ('".
            $photo->get_idPhoto()."','".
            $photo->get_namePhoto()."','".
            $photo->get_nameAlbum()."')";
        return $query;
    }
}

