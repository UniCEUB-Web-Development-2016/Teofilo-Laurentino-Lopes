<?php
// Point to where you downloaded the phar
include('httpful.phar');

$url = "http://localhost/Network/user/?firstName=".$_POST['firstName'].
    "&lastName=".$_POST['lastName'].
    "&country=".$_POST['country'].
    "&birthday=".$_POST['birthday'].
    "&email=".$_POST['email'].
    "&password=".$_POST['password'];

$response = \Httpful\Request::post($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/view/friends_user.html');
