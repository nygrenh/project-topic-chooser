<?php

require_once "lib/databaseconnection.php";
require_once "lib/models/coursestoaccounts.php";

class Account {

  private $id;
  private $name;
  private $admin;
  private $password;
  private $errors = array();

  public function __construct($id, $name, $admin, $password) {
    $this->id = $id;
    $this->name = $name;
    $this->admin = $admin;
    $this->password = $password;
  }

  public static function findAllAccounts() {
    $sql = "SELECT * FROM account";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute();

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $account = new Account($result->id, $result->name, $result->admin, $result->password);

      $results[] = $account;
    }
    return $results;
  }

  public static function findAllTeachers() {
    $sql = "SELECT * FROM account where admin = false";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute();

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $account = new Account($result->id, $result->name, $result->admin, $result->password);

      $results[] = $account;
    }
    return $results;
  }

  public static function findAccountWithCredentials($name, $password) {
    $sql = "select * from account where name = ? and password = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($name, $password));
    $result = $query->fetchObject();

    if($result == null) {
      return null;
    } else {
      return new Account($result->id, $result->name, $result->admin, $result->password);
    }
  }

  public static function findAccountWithName($name) {
    $sql = "select * from account where name = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($name));
    $result = $query->fetchObject();

    if($result == null) {
      return null;
    } else {
      return new Account($result->id, $result->name, $result->admin, $result->password);
    }
  }

  public static function findAccount($id) {
    $sql = "select * from account where id = ? limit 1";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute(array($id));
    $result = $query->fetchObject();

    if($result == null) {
      return null;
    } else {
      return new Account($result->id, $result->name, $result->admin, $result->password);
    }
  }

  public function insert() {
    $sql = "insert into account(name, admin, password) values(?, ?, ?) returning id";
    $query = getDatabaseconnection()->prepare($sql);
    // When casting booleans to strings PHP converts false to '' and psql doesn't like that
    $admin = $this->admin ? 't' : 'f';
    $ok = $query->execute(array($this->name, $admin, $this->password));
    if($ok) {
      $this->id = $query->fetchColumn();
    }
    return $ok;
  }

  public function update() {
    $sql = "update account set name = ?, admin = ?, password = ? where id = ?";
    $query = getDatabaseconnection()->prepare($sql);
    // When casting booleans to strings PHP converts false to '' and psql doesn't like that
    $admin = $this->admin ? 't' : 'f';
    $query->execute(array($this->getName(), $admin, $this->getPassword(), $this->getId()));
  }

  public function destroy() {
    $sql = "delete from account WHERE id = ?";
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
     } elseif ( strlen($name) > 60 ) {
       $this->errors['name'] = "Name can't be over 60 characters";
     } else {
       unset($this->errors['name']);
     }
  }

  public function getAdmin() {
    return $this->admin;
  }

  public function setAdmin($admin) {
     $this->admin = $admin;
     if( !is_bool($this->admin) ) {
       $this->errors['admin'] = "Admin should be a boolean.";
     } else {
       unset($this->errors['admin']);
     }
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
     $this->password = $password;
  }

  public function setPasswordConfirmation($password) {
     if($this->password != $password){
       $this->errors['password_confirmation'] = "Passwords don't match.";
     } else {
       unset($this->errors['password_confirmation']);
     }
  }

  public function getType(){
    if($this->admin) {
      return "Administrator";
    }
    return "Teacher";
  }

  public function valid() {
    return empty($this->errors);
  }

  public function getErrors() {
    return $this->errors;
  }

  public function getCourses() {
    return CoursesToAccounts::findCourses($this->id);
  }
}
