<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost/Network/message/?description=".$_POST['description']."&user=".$_POST['user'];
$response = \Httpful\Request::put($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/view/initial_page.html');