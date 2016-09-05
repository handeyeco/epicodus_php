<?php

class Contact {
  private $name;
  private $email;

  function __construct($name, $email) {
    $this->name = $name;
    $this->email = $email;
  }

  function setName($name) {
    if ($name != "") {
      $this->name = $name;
    }
  }

  function getName() {
    return $this->name;
  }

  function setEmail($email) {
    if ($email != "") {
      $this->email = $email;
    }
  }

  function getEmail() {
    return $this->email;
  }
}

?>
