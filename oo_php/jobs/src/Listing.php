<?php

class Listing {
  public $business;
  public $title;
  public $pay;
  private $contact;

  function __construct($business, $title, $pay, $contact) {
    $this->business = $business;
    $this->title = $title;
    $this->pay = $pay;
    $this->contact = $contact;
  }

  function setContact($contact) {
    if ($contact->name && $contact->email) {
      $this->contact = $contact;
    }
  }

  function getContact() {
    return $this->contact;
  }
}

?>
