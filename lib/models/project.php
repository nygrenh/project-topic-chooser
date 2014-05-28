<?php
Class Project {

  private $id;
  private $topic_id;
  private $student;
  private $hours;
  private $grade;

  public function __construct($id, $topic_id, $student, $hours, $grade) {
    $this->id = $id;
    $this->topic_id = $topic_id;
    $this->student = $student;
    $this->hours = $hours;
    $this->grade = $grade;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getTopicId() {
    return $this->topic_id;
  }

  public function setTopicId($topic_id) {
    $this->topic_id = $topic_id;
  }

  public function getStudent() {
    return $this->student;
  }

  public function setStudent($student) {
    $this->student = $student;
  }

  public function getHours() {
    return $this->hours;
  }

  public function setHours($hours) {
    $this->hours = $hours;
  }

  public function getGrade() {
    return $this->grade;
  }

  public function setGrade($grade) {
    $this->grade = $grade;
  }

}
