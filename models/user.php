<?php
include_once('db.php');

class User {

    private const SALT = '18$MYas';
    public $login;
    private $password;
    public $email;
    public $name;

    public function __construct($login, $psw, $email, $name) {
      $this->login = $login;
      $this->email = $email;
      $this->name = $name;
      $this->password = $psw;
    }

    public function registerUser() {
      $xml = new XML();
      $psw = md5(self::SALT . $this->password);
      $newuser = $xml->xml->addChild('user');
      $newuser->addChild('login', $this->login);
      $newuser->addChild('name', $this->name);
      $newuser->addChild('email', $this->email);
      $newuser->addChild('password', $psw);
      $xml->save();
    }

    public function authorizeUser($login, $psw) {
      $xml = new XML();
      $error = 'Login or password entered incorrectly';

      foreach ($xml->xml->user as $user) {
         if ($login == $user->login) {
           if (md5(self::SALT . $psw) == $user->password) {
             $error = false;
           }
         }
      }
      return $error;
    }

    public function loginUser() {
      session_start();

      $_SESSION['login'] = $this->login;
      $_SESSION['name'] = $this->name;

      return true;
    }

    public function logoutUser() {
      session_start();
      $_SESSION = array();
      session_destroy();

      return true;
    }

    public function checkLogin() {
      if (preg_match("/^.{6,}$/", $this->login)) {
        if (!preg_match("/^[a-zA-Z\d]+$/", $this->login)) {
          return 'Login must contain only letters and numbers';
        } else {
          return false;
        }
      } else {
        return 'Login must contain minimum 6 characters';
      }
    }

    public function checkLoginUnique() {
      $xml = new XML();
      $error = false;

      foreach ($xml->xml->user->login as $login) {
         if ($this->login == $login) {
           $error = 'This login is not available';
         }
      }
      return $error;
    }

    public function checkPassword() {
      if (preg_match("/^.{6,}$/", $this->password)) {
        if (!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{6,}$/', $this->password)) {
          return 'Password must contain at least 1x number, 1x uppercase letter and special character';
        } else {
          return false;
        }
      } else {
        return 'Password must contain minimum 6 characters';
      }
    }

    public function checkEmail() {
      if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email format';
      } else {
        return false;
      }
    }

    public function checkEmailUnique() {
      $xml = new XML();
      $error = false;

      foreach ($xml->xml->user->email as $email) {
         if ($this->email == $email) {
           $error = 'This email is not available';
         }
      }
      return $error;
    }

    public function checkName() {
      if (preg_match("/^.{2,}$/", $this->name)) {
        if (!preg_match("/^[a-zA-Z\d]+$/", $this->name)) {
          return 'Name must contain only letters and numbers';
        } else {
          return false;
        }
      } else {
        return 'Name must contain minimum 2 characters';
      }
    }

    public function checkPasswordRepeat($psw_repeat) {
      if ($psw_repeat !== $this->password) {
        return 'Password mismatch';
      } else {
        return false;
      }
    }

    public function getUserByLogin($login) {
      $xml = new XML();

      return $xml->select($login);
    }
}

?>
