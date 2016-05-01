<?php

include_once "model/Request.php";
include_once "model/Group.php";
include_once "database/DatabaseConnector.php";

class GroupController
{
    public function register($request)
    {
        $params = $request->get_params();
        $group = new Group($params["id_group"],
            $params["group_name"],
            $params["owner"]);

        $db = new DatabaseConnector("localhost", "facebook", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($group));
    }
    private function generateInsertQuery($group)
    {
        $query =  "INSERT INTO group (id_group, group_name, owner) VALUES ('".
            $group-> get_idGroup()."','".
            $group->get_groupName()."','".
            $group->get_owner()."')";
        return $query;
    }
}

