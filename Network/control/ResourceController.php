<?php

include_once "model/Request.php";
include_once "control/UserController.php";
include_once "control/GroupController.php";
include_once "control/PhotoController.php";

class ResourceController
{

	private $controlMap = 
	[
		"user" => "UserController",
		"group" => "GroupController",
		"photo" => "PhotoController",
	];

	public function createResource($request)
	{
		return (new $this->controlMap[strtolower($request->get_resource())])->register($request);
	}
}