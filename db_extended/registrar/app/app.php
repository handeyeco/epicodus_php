<?php

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/../src/Course.php";
require_once __DIR__."/../src/Student.php";
require_once __DIR__."/../private/db_login.php";

$app = new Silex\Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  "twig.path" => __DIR__."/../views"
));

use Symfony\Component\HttpFoundation\Request;
Request::enableHttpMethodParameterOverride();

$app->get("/", function () use ($app) {
  return $app['twig']->render("index.html.twig", array(
    "students" => Student::getAll(),
    "courses" => Course::getAll()
  ));
});

$app->get("/student/{id}", function ($id) use ($app) {
  $student = Student::getById($id);

  return $app['twig']->render("student.html.twig", array(
    "student" => $student,
    "student_courses" => $student->getAllCourses(),
    "all_courses" => Course::getAll()
  ));
});

$app->get("/course/{id}", function ($id) use ($app) {
  $course = Course::getById($id);

  return $app['twig']->render("course.html.twig", array(
    "course" => $course,
    "course_students" => $course->getAllStudents(),
    "all_students" => Student::getAll()
  ));
});

$app->post("/student", function () use ($app) {
  $name       = $_POST['name'];
  $enrollment = $_POST['enrollment'];
  $student = new Student($name, $enrollment);
  $student->save();

  return $app['twig']->render("index.html.twig", array(
    "students" => Student::getAll(),
    "courses" => Course::getAll()
  ));
});

$app->post("/student/{id}", function ($id) use ($app) {
  $student = Student::getById($id);
  $course_id = $_POST['course_id'];
  $student->addCourse($course_id);

  return $app['twig']->render("student.html.twig", array(
    "student" => $student,
    "student_courses" => $student->getAllCourses(),
    "all_courses" => Course::getAll()
  ));
});

$app->post("/course", function () use ($app) {
  $name   = $_POST['name'];
  $number = $_POST['number'];
  $course = new Course($name, $number);
  $course->save();

  return $app['twig']->render("index.html.twig", array(
    "students" => Student::getAll(),
    "courses" => Course::getAll()
  ));
});

$app->post("/course/{id}", function ($id) use ($app) {
  $course = Course::getById($id);
  $student_id = $_POST['student_id'];
  $course->addStudent($student_id);

  return $app['twig']->render("course.html.twig", array(
    "course" => $course,
    "course_students" => $course->getAllStudents(),
    "all_students" => Student::getAll()
  ));
});

$app->delete("/", function () use ($app) {
  Student::deleteAll();
  Course::deleteAll();
  $GLOBALS['DB']->exec("DELETE FROM courses_students");

  return $app['twig']->render("index.html.twig", array(
    "students" => Student::getAll(),
    "courses" => Course::getAll()
  ));
});

return $app;

?>
