<?php

class Task {
  private $description;
  private $due_date;
  private $id;
  private $complete;

  function __construct($description, $due_date, $id = null, $complete = 0) {
    $this->description  = $description;
    $this->due_date     = $due_date;
    $this->id           = $id;
    $this->complete     = $complete;
  }

  function getId() {
    return $this->id;
  }

  function setDescription($new_description) {
    $this->description = (string) $new_description;
  }

  function getDescription() {
    return $this->description;
  }

  function setDueDate($new_due_date) {
    $this->due_date = $new_due_date;
  }

  function getDueDate() {
    return $this->due_date;
  }

  function toggleComplete() {
    $id = $this->getId();
    $complete = $this->getComplete();

    $new_complete = $complete != 0 ? 0 : 1;

    $GLOBALS['DB']->exec("UPDATE tasks SET complete = $new_complete WHERE id = $id");
    $this->complete = $new_complete;
  }

  function getComplete() {
    return $this->complete;
  }

  function save() {
    $GLOBALS['DB']->exec("INSERT INTO tasks (description, due_date) VALUES ('{$this->getDescription()}', '{$this->getDueDate()}')");
    $this->id = $GLOBALS['DB']->lastInsertId();
  }

  function addCategory($category) {
    $category_id = $category->getId();
    $task_id = $this->getId();
    $GLOBALS['DB']->exec("INSERT INTO categories_tasks (category_id, task_id) VALUES ($category_id, $task_id)");
  }

  function getCategories() {
    $task_id = $this->getId();
    $query = $GLOBALS['DB']->query("SELECT category_id FROM categories_tasks WHERE task_id=$task_id");
    $category_ids = $query->fetchAll(PDO::FETCH_ASSOC);

    $categories = array();
    foreach ($category_ids as $id) {
      $category_id = $id['category_id'];
      $result = $GLOBALS['DB']->query("SELECT * FROM categories WHERE id=$category_id");
      $returned_category = $result->fetchAll(PDO::FETCH_ASSOC)[0];

      $name = $returned_category['name'];
      $id   = $returned_category['id'];
      $new_category = new Category($name, $id);
      array_push($categories, $new_category);
    }

    return $categories;
  }

  function delete() {
    $id = $this->getId();
    $GLOBALS['DB']->exec("DELETE FROM categories WHERE id=$id");
    $GLOBALS['DB']->exec("DELETE FROM categories_tasks WHERE task_id=$id");
  }

  static function getAll() {
    $returned_tasks = $GLOBALS['DB']->query("SELECT * FROM tasks ORDER BY due_date");
    $tasks = array();

    foreach ($returned_tasks as $task) {
      $description  = $task['description'];
      $due_date     = $task['due_date'];
      $id           = $task['id'];
      $complete     = $task['complete'];

      $new_task = new Task($description, $due_date, $id, $complete);
      array_push($tasks, $new_task);
    }

    return $tasks;
  }

  static function deleteAll() {
    $GLOBALS['DB']->exec("DELETE FROM tasks;");
  }

  static function find($search_id) {
    $found_task = null;
    $tasks = Task::getAll();
    foreach ($tasks as $task) {
      $task_id = $task->getId();
      if ($task_id == $search_id) {
        $found_task = $task;
      }
    }

    return $found_task;
  }
}

?>
