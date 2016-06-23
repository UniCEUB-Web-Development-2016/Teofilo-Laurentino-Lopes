<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";

class UserController
{
    private $requiredParameters = array('firstName', 'lastName', 'country', 'birthday', 'email', 'password');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
            $user = new User($params["firstName"],
                $params["lastName"],
                $params["country"],
                $params["birthday"],
                $params["email"],
                $params["password"]);

            $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");

            $conn = $db->getConnection();

            return $conn->query($this->generateInsertQuery($user));
        } else {
            echo "Error 400: Bad Request";
        }
    }

    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (firstName, lastName, country, birthday, email, password) VALUES ('".
            $user->get_firstNameUser()."','".
            $user->get_lastNameUser()."','".
            $user->get_countryUser()."','".
            $user->get_birthdayUser()."','".
			$user->get_emailUser()."','".
          	$user->get_passwordUser()."')";
		// var_dump($query);
		return $query;
    }
	
	public function search($request)
	{
		$params = $request->get_params();
		$crit = $this->generateCriteria($params);
		$db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
		$conn = $db->getConnection();
		$result = $conn->query("SELECT id, firstName, lastName, country, birthday, email, password FROM user WHERE ".$crit);
		//foreach($result as $row) 
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	private function generateCriteria($params) 
	{
		$criteria = "";
        $retorno = "";
        if(count($params) == 2){
            foreach ($params as $key => $value) {
                $criteria = $criteria . $key . " = '" . $value . "' AND ";
                $retorno = substr($criteria, 0, -5);
            }
        }else {
            foreach ($params as $key => $value) {
                $criteria = $criteria . $key . " LIKE '%" . $value . "%' OR ";
                $retorno = substr($criteria, 0, -4);
            }
        }
		return 	$retorno;
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
        return "UPDATE user SET " . $crit . " WHERE firstName='".$params["firstName"]."'OR lastName='".$params['lastName']."'OR country = '".$params['country']."'";

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
        $result = $conn->query("DELETE FROM user WHERE id = ".$params["id"]);
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