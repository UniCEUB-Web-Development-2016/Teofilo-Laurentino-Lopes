<?php

include_once "model/Request.php";
include_once "model/Message.php";
include_once "database/DatabaseConnector.php";

class MessageController
{
    private $requiredParameters = array('description', 'user');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
            $message = new Message($params["description"],
                $params["user"]);

            $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

            $conn = $db->getConnection();

            return $conn->query($this->generateInsertQuery($message));

        } else {
            echo "Error 400: Bad Request";
        }
    }

    private function generateInsertQuery($message)
    {
        $query = "INSERT INTO message (description, user) VALUES ('".
            $message->get_descriptionMessage(). "','" .
            $message->get_userMessage(). "')";

        return $query;
    }

    public function search($request)
    {
        $params = $request->get_params();
        $crit = $this->generateCriteria($params);
        $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
        $conn = $db->getConnection();
        $result = $conn->query("SELECT id, description, user FROM message WHERE ".$crit);
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
        return "UPDATE message SET " . $crit . " WHERE description = '" . $params["description"] . "'OR user = '".$params['user']."'";
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
        $result = $conn->query("DELETE FROM message WHERE id = ".$params["id"]);
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