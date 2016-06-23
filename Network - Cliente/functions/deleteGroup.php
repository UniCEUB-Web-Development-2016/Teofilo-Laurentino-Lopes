<?php
include('httpful.phar');
$url = "http://localhost/Network/group/?groupName=".$_POST['groupName']."&owner=".$_POST['owner']."&category=".$_POST['category'];


$response = \Httpful\Request::delete($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/groups_user.php');
