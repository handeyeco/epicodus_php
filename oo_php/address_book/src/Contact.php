<?php

class Contact {
  private $name;
  private $number;
  private $address;

  function __construct ($name, $number, $address) {
    $this->name = (string) $name;
    $this->number = (string) $number;
    $this->address = (string) $address;
  }

  function setName ($name) {
    $this->name = (string) $name;
  }

  function getName () {
    return $this->name;
  }

  function setNumber ($number) {
    $this->number = (string) $number;
  }

  function getNumber () {
    return $this->number;
  }

  function setAddress ($address) {
    $this->address = (string) $address;
  }

  function getAddress () {
    return $this->address;
  }

  function saveContact () {
    array_push($_SESSION['list_of_contacts'], $this);
  }

  static function getAll () {
    return $_SESSION['list_of_contacts'];
  }

  static function deleteAll () {
    $_SESSION['list_of_contacts'] = array();
  }
}

?>
