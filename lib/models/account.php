<?php
class Account {

  private $id;
  private $name;
  private $admin;
  private $password;

  public function __construct($id, $name, $admin, $password) {
    $this->id = $id;
    $this->name = $name;
    $this->admin = $admin;
    $this->password = $password;
  }

  public static function findAllAccounts() {
    $sql = "SELECT id, name, password FROM account";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute();

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $account = new Account($result->id, $result->name, $result->admin, $result->password);

      $results[] = $account;
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

  public function getAdmin() {
    return $this->admin;
  }

  public function setAdmin($admin) {
     $this->admin = $admin;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
     $this->password = $password;
  }
}
