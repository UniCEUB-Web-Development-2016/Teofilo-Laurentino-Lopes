<?php

class DBConnector
{

    private $ip;
    private $bd_name;
    private $bd_type;
    private $port;
    private $user;
    private $password;

    public function _construct($ip, $bd_name, $bd_type, $port, $user, $password)
    {

        $this->setIp($ip);
        $this->setbdname($bd_name);
        $this->setbdtype($bd_type);
        $this->setport($port);
        $this->setuser($user);
        $this->setpassword($password);

        public
        function getIp()
        {
            return $this->ip;
        }

        public
        function setIp($ip)
        {
            $this->ip = $ip;
        }

        public
        function getPassword()
        {
            return $this->password;
        }

        public
        function setPassword($password)
        {
            $this->password = $password;
        }

        public
        function getUser()
        {
            return $this->user;
        }

        public
        function setUser($user)
        {
            $this->user = $user;
        }

        public
        function getPort()
        {
            return $this->port;
        }

        public
        function setPort($port)
        {
            $this->port = $port;
        }

        public
        function getBdType()
        {
            return $this->bd_type;
        }

        public
        function setBdType($bd_type)
        {
            $this->bd_type = $bd_type;
        }

        public
        function getBdName()
        {
            return $this->bd_name;
        }

        public
        function setBdName($bd_name)
        {
            $this->bd_name = $bd_name;
        }


        public
        function getConnection()
        {
            try {
                return new PDO($this->getBdType() . 'dbname=' . $this->getBdName() . ';host=' . $this->getPort(), $this->getUser(), $this->getPassword());
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
}

        }
    }
}