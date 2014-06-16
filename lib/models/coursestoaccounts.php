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

  public function getAccountId() {
    return $this->account_id;
  }

  public function setAccountId($account_id) {
    $this->account_id = $account_id;
    if ( !is_numeric($account_id) ) {
      $this->errors['account_id'] = "Account id should be a number";
    } else if ( $account_id <= 0 ) {
      $this->errors['account_id'] = "Account id should positive";
    } else if ( !preg_match('/^\d+$/', $account_id) ) {
      $this->errors['account_id'] = "Account id should be an integer";
    } else {
      unset($this->errors['account_id']);
    }
  }

  public function getCourseId() {
    return $this->course_id;
  }

  public function setCourseId($course_id) {
    $this->course_id = $course_id;
    if ( !is_numeric($course_id) ) {
      $this->errors['course_id'] = "Course id should be a number";
    } else if ( $course_id <= 0 ) {
      $this->errors['course_id'] = "Course id should positive";
    } else if ( !preg_match('/^\d+$/', $course_id) ) {
      $this->errors['course_id'] = "Course id should be an integer";
    } else {
      unset($this->errors['course_id']);
    }
  }

}
