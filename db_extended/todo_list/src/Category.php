<?php

class Category {
  private $name;
  private $id;

  function __construct($name, $id = null) {
    $this->name = $name;
    $this->id = $id;
  }

  function setName($new_name) {
    $this->name = (string) $new_name;
  }

  function getName() {
    return $this->name;
  }

  function getId() {
    return $this->id;
  }

  function save() {
    $GLOBALS['DB']->exec("INSERT INTO categories (name) VALUES ('{$this->getName()}')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function update($new_name) {
    $id = $this->getId();
    $GLOBALS['DB']->exec("UPDATE categories SET name = '$new_name' WHERE id = '$id'");
    $this->setName($new_name);
  }

  function addTask($task) {
    $category_id = $this->getId();
    $task_id = $task->getId();
    $GLOBALS['DB']->exec("INSERT INTO categories_tasks (category_id, task_id) VALUES ($category_id, $task_id)");
  }

  function getTasks() {
    $category_id = $this->getId();
    $query = $GLOBALS['DB']->query("SELECT task_id FROM categories_tasks WHERE category_id = $category_id");
    $task_ids = $query->fetchAll(PDO::FETCH_ASSOC);

    $tasks = array();
    foreach ($task_ids as $id) {
      $task_id = $id['task_id'];
      $result = $GLOBALS['DB']->query("SELECT * FROM tasks WHERE id = $task_id");
      $returned_task = $result->fetchAll(PDO::FETCH_ASSOC)[0];

      $description  = $returned_task['description'];
      $due_date     = $returned_task['due_date'];
      $id           = $returned_task['id'];
      $complete     = $returned_task['complete'];
      $new_task = new Task($description, $due_date, $id, $complete);

      array_push($tasks, $new_task);
    }
    return $tasks;
  }

  function delete() {
    $id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM categories WHERE id=$id");
    $GLOBALS['DB']->exec("DELETE FROM categories_tasks WHERE category_id=$id");
  }

  static function getAll() {
    $returned_categories = $GLOBALS['DB']->query("SELECT * FROM categories");
    $categories = array();

    foreach($returned_categories as $category) {
      $name = $category['name'];
      $id = $category['id'];
      $new_category = new Category($name, $id);
      array_push($categories, $new_category);
    }

    return $categories;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM categories");
  }

  static function find($search_id) {
    $found_category = null;
    $categories = Category::getAll();

    foreach ($categories as $category) {
      $category_id = $category->getId();
      if ($category_id == $search_id) {
        $found_category = $category;
      }
    }

    return $found_category;
  }
}

?>
