<?php 

class User
{

	private $firstName;
	private $lastName;
	private $age;
	private $country;
	private $login;
	private $birthday;
	private $password;


	public function __construct($firstName, $lastName, $age, $country, $login, $birhday, $password)
	{
		$this->set_firstNameUser($firstName);
		$this->set_lastNameUser($lastName);
		$this->set_ageUser($age);
		$this->set_countryUser($country);
		$this->set_loginUser($login);
		$this->set_birthdayUser($birhday);
		$this->set_passwordUser($password);
	}


	private function set_firstNameUser($firstName)
	{
		$this->firstName = $firstName;
	}

	public function get_firstNameUser()
	{
		return $this->firstName;
	}

	private function set_lastNameUser($lastName)
	{
		$this->lastName = $lastName;
	}

	public function get_lastNameUser()
	{
		return $this->lastName;
	}

	private function set_ageUser($age)
	{
		$this->age = $age;
	}

	public function get_ageUser()
	{
		return $this->age;
	}

	private function set_countryUser($country)
	{
		$this->country = $country;
	}

	public function get_countryUser()
	{
		return $this->country;
	}

	private function set_loginUser($login)
	{
		$this->login = $login;
	}

	public function get_loginUser()
	{
		return $this->login;
	}

	private function set_birthdayUser($birthday)
	{
		$this->birthday = $birthday;
	}

	public function get_birthdayUser()
	{
		return $this->birthday;
	}

	private function set_passwordUser($password)
	{
		$this->password = $password;
	}

	public function get_passwordUser()
	{
		return $this->password;
	}
}