<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Store.php";
require_once __DIR__."/../src/Brand.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->get("/", function () use ($app) {
  return $app['twig']->render("index.html.twig");
});

$app->get("/stores", function () use ($app) {
  return $app['twig']->render("stores.html.twig", array(
    "stores" => Store::getAll()
  ));
});

$app->get("/store/{id}", function ($id) use ($app) {
  $store = Store::getById($id);

  return $app['twig']->render("store.html.twig", array(
    "store" => $store,
    "brands" => $store->getBrands(),
    "all_brands" => Brand::getAll()
  ));
});

$app->get("/brands", function () use ($app) {
  return $app['twig']->render("brands.html.twig", array(
    "brands" => Brand::getAll()
  ));
});

$app->get("/brand/{id}", function ($id) use ($app) {
  $brand = Brand::getById($id);

  return $app['twig']->render("brand.html.twig", array(
    "brand" => $brand,
    "stores" => $brand->getStores()
  ));
});

$app->post("/stores", function () use ($app) {
  $name = $_POST['name'];
  $new_store = new Store($name);
  $new_store->save();

  return $app['twig']->render("stores.html.twig", array(
    "stores" => Store::getAll()
  ));
});

$app->post("/store/{store_id}", function ($store_id) use ($app) {
  $brand_id = $_POST['brand_id'];
  $store = Store::getById($store_id);
  $store->addBrand($brand_id);

  return $app['twig']->render("store.html.twig", array(
    "store" => $store,
    "brands" => $store->getBrands(),
    "all_brands" => Brand::getAll()
  ));
});

$app->post("/brands", function () use ($app) {
  $name = $_POST['name'];
  $new_brand = new Brand($name);
  $new_brand->save();

  return $app['twig']->render("brands.html.twig", array(
    "brands" => Brand::getAll()
  ));
});

$app->patch("/store/{id}", function ($id) use ($app) {
  $new_name = $_POST['name'];
  $store = Store::getById($id);
  $store->update($new_name);

  return $app['twig']->render("store.html.twig", array(
    "store" => $store,
    "brands" => $store->getBrands(),
    "all_brands" => Brand::getAll()
  ));
});

$app->patch("/brand/{id}", function ($id) use ($app) {
  $new_name = $_POST['name'];
  $brand = Brand::getById($id);
  $brand->update($new_name);

  return $app['twig']->render("brand.html.twig", array(
    "brand" => $brand,
    "stores" => $brand->getStores()
  ));
});

$app->delete("/store/{id}", function ($id) use ($app) {
  $store = Store::getById($id);
  $store->delete();

  return $app['twig']->render("stores.html.twig", array(
    "stores" => Store::getAll()
  ));
});

$app->delete("/brand/{id}", function ($id) use ($app) {
  $brand = Brand::getById($id);
  $brand->delete();

  return $app['twig']->render("brands.html.twig", array(
    "brands" => Brand::getAll()
  ));
});

return $app;

?>
