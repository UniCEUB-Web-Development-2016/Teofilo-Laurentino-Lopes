<?php
include('httpful.phar');
$url = "http://localhost/Network/user/?firstName=".$_POST['firstName'].
    "&lastName=".$_POST['lastName'].
    "&country=".$_POST['country'].
    "&birthday=".$_POST['birthday'].
    "&email=".$_POST['email'].
    "&password=".$_POST['password'];

$response = \Httpful\Request::delete($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/friends_user.php');
