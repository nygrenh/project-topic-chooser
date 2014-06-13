<?php

require_once "lib/databaseconnection.php";

Class Course {

  private $id;
  private $name;
  private $errors = array();

  public function __construct($id, $name) {
    $this->id = $id;
    $this->name = $name;
  }

  public static function findAllCourses() {
    $sql = "select * from course ";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute();

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $course = new Course($result->id, $result->name);

      $results[] = $course;
    }
    return $results;
  }

  public static function findCourse($id) {
    $sql = "select * from course where id = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($id));
    $result = $query->fetchObject();
    if($result == null) {
      return null;
    }
    $course = new Course($result->id, $result->name);
    return $course;
  }

  public function insert() {
    $sql = "insert into course(name) values(?) returning id";
    $query = getDatabaseconnection()->prepare($sql);
    $ok = $query->execute(array($this->name));
    if($ok) {
      $this->id = $query->fetchColumn();
    }
    return $ok;
  }

  public function update() {
    $sql = "update course set name = ? where id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($this->getName(), $this->getId()));
  }

  public function destroy() {
    $sql = "delete from course WHERE id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($this->getId()));
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
    if ( !is_numeric($id) ) {
      $this->errors['id'] = "Id should be a number";
    } else if ( $id <= 0 ) {
      $this->errors['id'] = "Id should positive";
    } else if ( !preg_match('/^\d+$/', $id) ) {
      $this->errors['id'] = "Id should be an integer";
    } else {
      unset($this->errors['id']);
    }
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = trim($name);
    if ( $this->name == "" ) {
      $this->errors['name'] = "Name can't be empty";
    } elseif ( strlen($name) > 20 ) {
      $this->errors['name'] = "Name can't be over 20 characters";
    } else {
      unset($this->errors['name']);
    }
  }

  public function valid() {
    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }

}
