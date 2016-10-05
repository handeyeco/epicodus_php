<?php

class Brand {

  private $name;
  private $id;

  function __construct($name, $id = null) {
    $this->name = $name;
    $this->id   = $id;
  }

  function getName() {
    return $this->name;
  }

  function setName($new_name) {
    $this->name = (string) $new_name;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $name = $this->getName();
    $GLOBALS['DB']->exec("INSERT INTO brands (name) VALUES ('$name')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function delete() {
    $id = $this->getId();

    $GLOBALS['DB']->exec("DELETE FROM brands WHERE id=$id");
    $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE brand_id=$id");
  }

  function update($new_name) {
    $id = $this->getId();
    $GLOBALS['DB']->exec("UPDATE brands SET name='$new_name' WHERE id=$id");
    $this->setName($new_name);
  }

  function getStores() {
    $brand_id = $this->getId();
    $result = array();
    $query = $GLOBALS['DB']->query(
      "SELECT stores.*
       FROM brands
       JOIN brands_stores ON (brands_stores.brand_id = brands.id)
       JOIN stores ON (brands_stores.store_id = stores.id)
       WHERE brands.id = $brand_id"
    );

    foreach ($query as $store) {
      $name = $store['name'];
      $id   = $store['id'];
      $new_store = new Store($name, $id);
      array_push($result, $new_store);
    }

    return $result;
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM brands ORDER BY name");
    $result = array();

    foreach ($query as $brand) {
      $name = $brand['name'];
      $id   = $brand['id'];
      $new_brand = new Brand($name, $id);
      array_push($result, $new_brand);
    }

    return $result;
  }

  static function getById($search_id) {
    $query = Brand::getAll();
    $result = null;

    foreach ($query as $brand) {
      $brand_id = $brand->getId();
      if ($brand_id == $search_id) {
        $result = $brand;
        break;
      }
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM brands");
    $GLOBALS['DB']->exec("DELETE FROM brands_stores");
  }

}

?>
