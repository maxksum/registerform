<?php
include('../models/user.php');

$userdata = utf8_encode($_POST['userdata']);
$userdata = json_decode($userdata);

$user = new User($userdata->login, $userdata->psw, $userdata->email, $userdata->name);

$errors['iserror'] = false;
$errors['login'] = $user->checkLogin();
$errors['name'] = $user->checkName();
$errors['email'] = $user->checkEmail();
$errors['psw'] = $user->checkPassword();

if (!$errors['psw']) {
  $errors['psw_repeat'] = $user->checkPasswordRepeat($userdata->psw_repeat);
}

if (!$errors['login']) {
  $errors['login'] = $user->checkLoginUnique();
}

if (!$errors['email']) {
  $errors['email'] = $user->checkEmailUnique();
}

foreach ($errors as $error) {
  if ($error) {
    $errors['iserror'] = true;
  }
}

echo json_encode($errors);









/*
$errors['email'] = $user->checkEmail();
$errors['psw_repeat'] = $user->checkPasswordRepeat($_POST['psw_repeat']); */

?>
