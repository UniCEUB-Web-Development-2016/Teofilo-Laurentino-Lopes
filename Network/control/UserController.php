<?php

include_once "model/Request.php";
include_once "model/User.php";
include_once "database/DatabaseConnector.php";

class UserController
{
    private $requiredParameters = array('firstName', 'lastName', 'age', 'country', 'birthday', 'email', 'login', 'password');

    public function register($request)
    {
        $params = $request->get_params();
        if ($this->isValid($params)) {
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
        } else {
            echo "Error 400: Bad Request";
        }
    }

    private function generateInsertQuery($user)
    {
        $query =  "INSERT INTO user (firstName, lastName, age, country, birthday, email, login, password)
						VALUES ('".$user->get_firstNameUser()."','".
            $user->get_lastNameUser()."','".
            $user->get_ageUser()."','".
            $user->get_countryUser()."','".
            $user->get_birthdayUser()."','".
			$user->get_emailUser()."','".
			$user->get_loginUser()."','".
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

	public function update($request)
	{
		if(!empty($_GET["id"]) && !empty($_GET["firstName"]) && !empty($_GET["lastName"]) && !empty($_GET["email"]) && !empty($_GET["age"])) {

            $name = addslashes(trim($_GET["firstName"]));
            $secondName = addslashes(trim($_GET["lastName"]));
            $email = addslashes(trim($_GET["email"]));
            $age = addslashes(trim($_GET["age"]));
            $id = addslashes(trim($_GET["id"]));

            $params = $request->get_params();
            $db = new DatabaseConnector("localhost", "network", "mysql", "", "root", "");
            $conn = $db->getConnection();
            $result = $conn->prepare("UPDATE user SET firstName=:name, lastName=:secondName, email=:email, age=:age WHERE id=:id");
            $result->bindValue(":name", $name);
            $result->bindValue(":secondName", $secondName);
            $result->bindValue(":email", $email);
            $result->bindValue(":age", $age);
            $result->bindValue(":id", $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Usuário alterado com sucesso!";
            } else {
                echo "Usuário não atualizado";
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
            $result = $conn->prepare("DELETE FROM user WHERE id = ?");
            $result->bindValue(1, $id);
            $result->execute();
            if ($result->rowCount() > 0){
                echo "Usuário deletado com sucesso!";
            } else {
                echo "Usuário não deletado";
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
