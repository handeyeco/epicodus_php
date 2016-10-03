<?php

class Flight {

  private $depart_time;
  private $origin_id;
  private $destination_id;
  private $status;
  private $id;

  function __construct($depart_time, $origin_id, $destination_id, $status, $id = null) {
    $this->depart_time   = $depart_time;
    $this->origin_id      = $origin_id;
    $this->destination_id = $destination_id;
    $this->status         = $status;
    $this->id             = $id;
  }

  function setStatus($new_status) {
    $this->status = (string) $new_status;
  }

  function getDepartTime() {
    return $this->depart_time;
  }

  function getOriginId() {
    return $this->origin_id;
  }

  function getDestinationId() {
    return $this->destination_id;
  }

  function getStatus() {
    return $this->status;
  }

  function getId() {
    return $this->id;
  }

  function updateStatus($new_status) {
    $id = $this->getId();
    $GLOBALS['DB']->exec("UPDATE flights SET status='$new_status' WHERE id=$id");
    $this->setStatus($new_status);
  }

  function save() {
    $depart_time    = $this->getDepartTime();
    $origin_id      = $this->getOriginId();
    $destination_id = $this->getDestinationId();
    $status         = $this->getStatus();

    $GLOBALS['DB']->exec("INSERT INTO flights (depart_time, origin_id, destination_id, status) VALUES ('$depart_time', $origin_id, $destination_id, '$status')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM flights ORDER BY destination_id, depart_time");
    $results = array();

    foreach ($query as $flight) {
      $depart_time    = $flight['depart_time'];
      $origin_id      = $flight['origin_id'];
      $destination_id = $flight['destination_id'];
      $status         = $flight['status'];
      $idea           = $flight['id'];

      $new_flight = new Flight($depart_time, $origin_id, $destination_id, $status, $idea);
      array_push($results, $new_flight);
    }

    return $results;
  }

  static function getById($search_id) {
    $query = $GLOBALS['DB']->query("SELECT * FROM flights WHERE id=$search_id");
    $results = array();

    foreach ($query as $flight) {
      $depart_time    = $flight['depart_time'];
      $origin_id      = $flight['origin_id'];
      $destination_id = $flight['destination_id'];
      $status         = $flight['status'];
      $idea           = $flight['id'];

      $new_flight = new Flight($depart_time, $origin_id, $destination_id, $status, $idea);
      array_push($results, $new_flight);
    }

    return $results[0];
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM flights");
  }

}

?>
