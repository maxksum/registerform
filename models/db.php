<?php

class XML {

  private const FILE = '../db/users.xml';
  public $xml;

  function __construct()
  {
    if (file_exists(self::FILE)) {
      $this->xml = simplexml_load_file(self::FILE);
    }
  }

  function save() {
    $this->xml->asXML(XML::FILE);
  }

  function select($username) {
    foreach ($this->xml->user as $user) {
      if ($user->login == $username) {
        return json_encode($user);
      }
    }
  }
}

?>
