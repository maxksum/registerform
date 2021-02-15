<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: welcome.php");
}

?>
<!DOCTYPE html>
<html>
<head>
<link href="css/main.css" rel="stylesheet">
<script src="assets/jquery-1.11.1.min.js"></script>
</head>
<body>
  <form>
    <div class="container">
      <h1>Authorization</h1>
      <p>Please fill in this form to sign in.</p>
      <hr>

      <label for="login"><b>Login</b></label>
      <input type="text" placeholder="Enter Login" name="login" id="login" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <span class="error" id="autherror"></span>

      <input type="button" id="loginbtn" class="login btn" value="Log in">
    </div>

    <div class="container signin">
      <p>You don't have an account? <a href="index.php">Registration</a>.</p>
    </div>
  </form>

  <script src="js/login.js"></script>
</body>
</html>
