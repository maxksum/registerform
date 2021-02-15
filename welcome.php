<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: index.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="css/main.css" rel="stylesheet">
<script src="assets/jquery-1.11.1.min.js"></script>
</head>
<body>
  
  <div class="container">
    <h1>Hello, <span id="username"></span></h1>
    <hr>
  </div>

  <div class="container signin">
    <p>Do you want to log out? <a href="index.php" id="logoutbtn">Log out</a>.</p>
  </div>

<script src="js/logout.js"></script>
<script src="js/setName.js"></script>
</body>
</html>
