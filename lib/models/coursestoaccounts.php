<?php

require_once "lib/models/account.php";
require_once "lib/models/course.php";

class CoursesToAccounts {

  private $account_id;
  private $course_id;

  public function __construct($account_id, $course_id) {
    $this->account_id = $account_id;
    $this->course_id = $course_id;
  }

  public static function findAccounts($course_id) {
    $sql = "select account_id from coursestoaccounts where course_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($course_id));

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $account = Account::findAccount($result->account_id);
      $results[] = $account;
    }
    return $results;
  }

  public static function findCourses($account_id) {
    $sql = "select course_id from coursestoaccounts where account_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($account_id));

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $course_id = Course::findCourse($result->course_id);
      $results[] = $course_id;
    }
    return $results;
  }

  public static function findAssociations($course_id, $account_id) {
    $sql = "select * from coursestoaccounts where course_id = ? and account_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($course_id, $account_id));

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $association = new CoursesToAccounts($result->account_id, $result->course_id);
      $results[] = $association;
    }
    return $results;
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

  public function insert() {
    $sql = "insert into coursestoaccounts(account_id, course_id) values(?, ?)";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($this->account_id, $this->course_id));
  }

  public function destroy() {
    $sql = "delete from coursestoaccounts where account_id = ? and course_id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($this->account_id, $this->course_id));
  }

}
