<?php

require_once "lib/databaseconnection.php";

Class Topic {

  private $id;
  private $name;
  private $course_id;
  private $summary;
  private $description;

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

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
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
    $this->summary = $summary;
  }

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

}
