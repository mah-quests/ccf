<?php

//test_api.php

include('Mobalizer.php');

$mobalizer_object = new Mobalizer();


//MobalizerAPI Class

if($_GET["action"] == 'All')
{
	$data = $mobalizer_object->fetch_all();
}

if($_GET["action"] == 'Register')
{
	$data = $mobalizer_object->insert();
}

if($_GET["action"] == 'One')
{
	$data = $mobalizer_object->fetch_single($_GET["id"]);
}

if($_GET["action"] == 'Update')
{
	$data = $mobalizer_object->update();
}

if($_GET["action"] == 'Delete')
{
	$data = $mobalizer_object->delete($_GET["id"]);
}

echo json_encode($data);

?>