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
			$params["birthday"],
			$params["email"],			
		    $params["login"],
			$params["password"]);

        $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

        $conn = $db->getConnection();

        return $conn->query($this->generateInsertQuery($user));
    }

    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (firstName, lastName, age, country, birthday, email, login, password)
						VALUES ('".$user->get_firstNameUser()."','".
            $user->get_lastNameUser()."','".
            $user->get_ageUser()."','".
            $user->get_countryUser()."','".
            $user->get_birthdayUser()."','".
			$user->get_emailUser()."'.'".
			$user->get_loginUser()."','".
            $user->get_passwordUser()."')";

		return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT firstName, lastName, age, country, birthday, email, login, password FROM user WHERE ".$crit);
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
