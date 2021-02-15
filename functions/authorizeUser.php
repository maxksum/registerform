<?php

include('../models/user.php');

$userdata = utf8_encode($_POST['userdata']);
$userdata = json_decode($userdata);

$errors['iserror'] = User::authorizeUser($userdata->login, $userdata->psw);

if (!$errors['iserror']) {

  $userInfo = User::getUserByLogin($userdata->login);
  $userInfo = json_decode($userInfo);

  $user = new User($userInfo->login, $userInfo->psw, $userInfo->email, $userInfo->name);

  echo json_encode($user->loginUser());
} else {
  echo json_encode($errors);
}

?>
