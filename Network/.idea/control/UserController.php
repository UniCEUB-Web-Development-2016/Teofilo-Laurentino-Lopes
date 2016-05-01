<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";

class UserController
{
    public function register($request)
    {
        $params = $request->get_params();
        $user = new User($params["firstName"],
            $params["lastName"],
            $params["age"],
            $params["country"],
            $params["login"],
            $params["birthday"],
            $params["password"]);

        $db = new DatabaseConnector("localhost", "bd_network", "mysql", "", "root", "");

        $conn = $db->getConnection();


        return $conn->query($this->generateInsertQuery($user));
    }

    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (firstName, lastName, age, country, login, birthday, password)
						VALUES ('".$user->get_firstNameUser()."','".
            $user->get_lastNameUser()."','".
            $user->get_ageUser()."','".
            $user->get_countryUser()."','".
            $user->get_loginUser()."','".
            $user->get_birthdayUser()."','".
            $user->get_passwordUser()."')";
        return $query;
    }
}
