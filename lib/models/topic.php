<?php

require_once "lib/databaseconnection.php";

Class Topic {

  private $id;
  private $name;
  private $course_id;
  private $summary;
  private $description;
  private $errors = array();

  public function __construct($id, $name, $course_id, $summary, $description) {
    $this->id = $id;
    $this->name = $name;
    $this->course_id = $course_id;
    $this->summary = $summary;
    $this->description = $description;
  }

  public static function findTopics($course_id) {
    $sql = "select * from topic where course_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($course_id));

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $topic = new Topic($result->id, $result->name, $result->course_id, $result->summary, $result->description);

      $results[] = $topic;
    }
    return $results;
  }

  public static function findTopic($id) {
    $sql = "select * from topic where id = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($id));
    $result = $query->fetchObject();
    $topic = new Topic($result->id, $result->name, $result->course_id, $result->summary, $result->description);
    return $topic;
  }

  public function insert() {
    $sql = "insert into topic(name, course_id, summary, description) values(?,?,?,?) returning id";
    $query = getDatabaseconnection()->prepare($sql);
    $ok = $query->execute(array($this->name, $this->course_id, $this->summary, $this->description));
    if($ok) {
      $this->id = $query->fetchColumn();
    }
    return $ok;
  }

  public function destroy() {
    $sql = "delete from topic WHERE id = ?";
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
      $this->errors['id'] = "Id should be greater than one";
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

  public function getCourseId() {
    return $this->course_id;
  }

  public function setCourseId($course_id) {
    $this->course_id = $course_id;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function setSummary($summary) {
    $this->summary = trim($summary);
    if ( $this->summary == "" ) {
      $this->errors['summary'] = "Summary can't be empty";
    } elseif ( strlen($summary) > 20 ) {
      $this->errors['summary'] = "Summary can't be over 20 characters";
    } else {
      unset($this->errors['summary']);
    }
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = trim($description);
    if ( $this->description == "" ) {
      $this->errors['description'] = "Description can't be empty";
    } elseif ( strlen($description) > 1000 ) {
      $this->errors['description'] = "Description can't be over 1000 characters";
    } else {
      unset($this->errors['description']);
    }
  }

  public function valid() {
    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }

}
