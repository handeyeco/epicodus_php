<?php

class Store {

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
    $GLOBALS['DB']->exec("INSERT INTO stores (name) VALUES ('$name')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function delete() {
    $id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM stores WHERE id=$id");
    $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE store_id=$id");
  }

  function update($new_name) {
    $id = $this->getId();
    $GLOBALS['DB']->exec("UPDATE stores SET name='$new_name' WHERE id=$id");
    $this->setName($new_name);
  }

  function addBrand($brand_id) {
    $store_id = $this->getId();
    $GLOBALS['DB']->exec("INSERT INTO brands_stores (brand_id, store_id) VALUES ($brand_id, $store_id)");
  }

  function deleteBrand($brand_id) {
    $store_id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM brands_stores WHERE brand_id=$brand_id AND store_id=$store_id");
  }

  function getBrands() {
    $store_id = $this->getId();
    $result = array();
    $query = $GLOBALS['DB']->query(
      "SELECT brands.*
       FROM stores
       JOIN brands_stores ON (brands_stores.store_id = stores.id)
       JOIN brands ON (brands_stores.brand_id = brands.id)
       WHERE stores.id = $store_id"
    );

    foreach ($query as $brand) {
      $name = $brand['name'];
      $id   = $brand['id'];
      $new_brand = new Brand($name, $id);
      array_push($result, $new_brand);
    }

    return $result;
  }

  static function getAll() {
    $query = $GLOBALS['DB']->query("SELECT * FROM stores ORDER BY name");
    $result = array();

    foreach ($query as $store) {
      $name = $store['name'];
      $id   = $store['id'];
      $new_store = new Store($name, $id);
      array_push($result, $new_store);
    }

    return $result;
  }

  static function getById($search_id) {
    $query = Store::getAll();
    $result = null;

    foreach ($query as $store) {
      $store_id = $store->getId();
      if($store_id == $search_id) {
        $result = $store;
        break;
      }
    }

    return $result;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM stores");
    $GLOBALS['DB']->exec("DELETE FROM brands_stores");
  }

}

?>
