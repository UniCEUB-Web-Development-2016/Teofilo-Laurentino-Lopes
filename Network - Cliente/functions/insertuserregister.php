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
?>

<script language="JavaScript">
    setTimeout("document.location = 'http://localhost/Network%20-%20Cliente/view/index.html'", 3500);
</script>
<h2><b>User inserted successfully!
You'll be redirecting to login page, please wait...</b></h2>
