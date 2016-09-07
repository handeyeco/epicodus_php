<?php

class Job {
  private $business;
  private $title;
  public $city;
  public $start_year;
  public $end_year;

  function __construct ($business, $title, $city, $start_year, $end_year) {
    $this->business = $business;
    $this->title = $title;
    $this->city = $city;
    $this->start_year = $start_year;
    $this->end_year = $end_year;
  }

  function setBusiness ($business) {
    $this->business = (string) $business;
  }

  function getBusiness () {
    return $this->business;
  }

  function setTitle ($title) {
    $this->title = (string) $title;
  }

  function getTitle () {
    return $this->title;
  }

  function save () {
    array_push($_SESSION['job_list'], $this);
  }

  static function getAll () {
    return $_SESSION['job_list'];
  }

  static function deleteAll () {
    $_SESSION['job_list'] = array();
  }
}

?>
