<?php


include('UserLogin.php');

$userlogin_object = new UserLogin();


// UserLogin API Class
if($_GET["action"] == 'all_user')
{
	$data = $userlogin_object->fetch_all();
}

if($_GET["action"] == 'Register')
{
	$data = $userlogin_object->insert();
}

if($_GET["action"] == 'single_user')
{
	$data = $userlogin_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'update')
{
	$data = $userlogin_object->update();
}

if($_GET["action"] == 'delete')
{
	$data = $userlogin_object->delete($_GET["id"]);
}


echo json_encode($data);

?>