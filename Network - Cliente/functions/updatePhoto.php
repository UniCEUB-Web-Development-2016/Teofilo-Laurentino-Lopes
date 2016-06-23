<?php
// Point to where you downloaded the phar
include('httpful.phar');
$url = "http://localhost/Network/photo/?owner=".$_POST['owner']."&name_album=".$_POST['nameAlbum']."&description=".$_POST['description'];
$response = \Httpful\Request::put($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/view/photos_user.html');