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
      <h1>Registration</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="login"><b>Login</b></label>
      <span class="error registererror" id="forlogin"></span>
      <input type="text" placeholder="Enter Login" name="login" id="login" required>


      <label for="psw"><b>Password</b></label>
      <span class="error registererror" id="forpassword"></span>
      <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

      <label for="psw-repeat"><b>Repeat Password</b></label>
      <span class="error registererror" id="forpasswordrepeat"></span>
      <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>

      <label for="email"><b>Email</b></label>
      <span class="error registererror" id="foremail"></span>
      <input type="text" placeholder="Enter Email" name="email" id="email" required>

      <label for="name"><b>Name</b></label>
      <span class="error registererror" id="forname"></span>
      <input type="text" placeholder="Enter Name" name="name" id="name" required>

      <input type="button" id="registerbtn" class="register btn" value="Register">
    </div>

    <div class="container signin">
      <p>Already have an account? <a href="auth.php">Sign in</a>.</p>
    </div>
  </form>

<script src="js/registration.js"></script>
</body>
</html>
