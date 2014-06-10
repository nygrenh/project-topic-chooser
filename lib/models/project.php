<?php

require_once "lib/databaseconnection.php";

Class Project {

  private $id;
  private $topic_id;
  private $student;
  private $hours;
  private $grade;
  private $errors = array();

  public function __construct($id, $topic_id, $student, $hours, $grade) {
    $this->id = $id;
    $this->topic_id = $topic_id;
    $this->student = $student;
    $this->hours = $hours;
    $this->grade = $grade;
  }

  public static function findAllProjects($topic_id) {
    $sql = "select * from project where topic_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($topic_id));

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $project = new Project($result->id, $result->topic_id, $result->student, $result->hours, $result->grade);

      $results[] = $project;
    }
    return $results;
  }

  public static function findProject($id) {
    $sql = "select * from project where id = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($id));
    $result = $query->fetchObject();
    if($result == null) {
      return null;
    }
    $project = new Project($result->id, $result->topic_id, $result->hours, $result->grade);
    return $project;
  }

  public function insert() {
    $sql = "insert into project(student, topic_id, hours, grade) values(?,?,?,?) returning id";
    $query = getDatabaseconnection()->prepare($sql);
    $ok = $query->execute(array($this->student, $this->topic_id, $this->hours, $this->grade));
    if($ok) {
      $this->id = $query->fetchColumn();
    }
    return $ok;
  }

  public function update() {
    $sql = "update project set student = ?, hours = ?, grade = ? where id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($this->student, $this->hours, $this->grade));
  }

  public function destroy() {
    $sql = "delete from project WHERE id = ?";
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
      $this->errors['id'] = "Id should be positive";
    } else if ( !preg_match('/^\d+$/', $id) ) {
      $this->errors['id'] = "Id should be an integer";
    } else {
      unset($this->errors['id']);
    }
  }

  public function getTopicId() {
    return $this->topic_id;
  }

  public function setTopicId($topic_id) {
    $this->topic_id = $topic_id;
    if ( !is_numeric($topic_id) ) {
      $this->errors['topic_id'] = "Topic id should be a number";
    } else if ( $topic_id <= 0 ) {
      $this->errors['topic_id'] = "Topic id should be positive";
    } else if ( !preg_match('/^\d+$/', $topic_id) ) {
      $this->errors['topic_id'] = "Topic id should be an integer";
    } else {
      unset($this->errors['topic_id']);
    }
  }

  public function getStudent() {
    return $this->student;
  }

  public function setStudent($student) {
    $this->student = trim($student);
    if ( $this->student == "" ) {
      $this->errors['student'] = "Student name can't be empty";
    } elseif ( strlen($student) > 20 ) {
      $this->errors['student'] = "Student name can't be over 20 characters";
    } else {
      unset($this->errors['student']);
    }
  }

  public function getHours() {
    return $this->hours;
  }

  public function setHours($hours) {
    $this->hours = $hours;
    if ( !is_numeric($hours) ) {
      $this->errors['hours'] = "Hours should be a number";
    } else if ( $hours <= 0 ) {
      $this->errors['hours'] = "Hours should be positive";
    } else if ( !preg_match('/^\d+$/', $hours) ) {
      $this->errors['hours'] = "Hours should be an integer";
    } else {
      unset($this->errors['hours']);
    }
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setGrade($grade) {
    $this->grade = $grade;
    if ( !is_numeric($grade) ) {
      $this->errors['grade'] = "Grade should be a number";
    } else if ( $grade < 0 ) {
      $this->errors['grade'] = "Grade should be at least one";
    } else if ( $grade > 5 ) {
      $this->errors['grade'] = "Grade should be smaller than 6";
    } else if ( !preg_match('/^\d+$/', $grade) ) {
      $this->errors['grade'] = "Grade should be an integer";
    } else {
      unset($this->errors['grade']);
    }
  }

  public function valid() {
    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }

}
