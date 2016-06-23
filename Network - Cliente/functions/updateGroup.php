<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost/Network/group/?groupName=".$_POST['groupName']."&owner=".$_POST['owner']."&category=".$_POST['category'];
$response = \Httpful\Request::put($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/view/groups_user.html');