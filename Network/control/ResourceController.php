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
		return (new $this->controlMap[strtolower($request->get_resource())]())->register($request);
	}
	
	public function searchResource($request)
	{
		return (new $this->controlMap[strtolower($request->get_resource())]())->search($request);
	}

	public function updateResource($request)
	{
		return (new $this->controlMap[strtolower($request->get_resource())]())->update($request);
	}

	public function deleteResource($request)
	{
		return (new $this->controlMap[strtolower($request->get_resource())]())->delete($request);
	}
}