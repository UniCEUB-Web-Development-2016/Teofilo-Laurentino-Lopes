<?php
include('httpful.phar');
$url = "http://localhost/Network/photo/?owner=".$_POST['owner']."&name_album=".$_POST['nameAlbum']."&description=".$_POST['description'];


$response = \Httpful\Request::delete($url)->send();

header('Location: http://localhost/Network%20-%20Cliente/photos_user.php');
