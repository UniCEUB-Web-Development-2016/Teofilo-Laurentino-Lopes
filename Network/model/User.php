<?php 

class User
{

	private $firstName;
	private $lastName;
	private $country;
	private $birthday;
	private $email;
	private $password;

	public function __construct($firstName, $lastName, $country, $birthday, $email, $password)
	{
		$this->set_firstNameUser($firstName);
		$this->set_lastNameUser($lastName);
		$this->set_countryUser($country);
		$this->set_birthdayUser($birthday);
		$this->set_emailUser($email);
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

	private function set_countryUser($country)
	{
		$this->country = $country;
	}

	public function get_countryUser()
	{
		return $this->country;
	}

	private function set_birthdayUser($birthday)
	{
		$this->birthday = $birthday;
	}

	public function get_birthdayUser()
	{
		return $this->birthday;
	}
	
	private function set_emailUser($email)
	{
		$this->email = $email;
	}

	public function get_emailUser()
	{
		return $this->email;
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