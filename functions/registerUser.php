<?php

include('../models/user.php');

$userdata = utf8_encode($_POST['userdata']);
$userdata = json_decode($userdata);

$user = new User($userdata->login, $userdata->psw, $userdata->email, $userdata->name);

$user->registerUser();

echo json_encode($user->loginUser());

?>
