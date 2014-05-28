<?php
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
