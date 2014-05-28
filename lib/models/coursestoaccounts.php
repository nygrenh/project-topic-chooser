<?php
class CoursesToAccounts {

  private $id;
  private $account_id;
  private $course_id;

  public function __construct($id, $account_id, $course_id) {
    $this->id = $id;
    $this->account_id = $account_id;
    $this->course_id = $course_id;
  }

  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getAccountId() {
    return $this->account_id;
  }

  public function setAccountId($account_id) {
    $this->account_id = $account_id;
  }

  public function getCourseId() {
    return $this->course_id;
  }

  public function setCourseId($course_id) {
    $this->course_id = $course_id;
  }

}
