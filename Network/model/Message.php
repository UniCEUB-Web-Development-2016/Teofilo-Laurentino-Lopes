<?php

class Message
{
    private $description;
    private $user;

    public function __construct($description, $user)
    {
        $this->set_descriptionMessage($description);
        $this->set_userMessage($user);
    }

    private function set_descriptionMessage($description)
    {
        $this->description = $description;
    }

    public function get_descriptionMessage()
    {
        return $this->description;
    }

    private function set_userMessage($user)
    {
        $this->user = $user;
    }

    public function get_userMessage()
    {
        return $this->user;
    }
}