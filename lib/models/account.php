<?php
class Account {

  private $id;
  private $name;
  private $password;

  public function __construct($id, $name, $password) {
    $this->id = $id;
    $this->name = $name;
    $this->password = $password;
  }

  public static function findAllAccounts() {
    $sql = "SELECT id, name, password FROM account";
    $query = getDatabaseconnection()->prepare($sql);
    $query->execute();

    $results = array();
    foreach ($query->fetchAll(PDO::FETCH_OBJ) as $result) {
      $account = new Account($result->id, $result->name, $result->password);

      $results[] = $account;
    }
    return $results;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
     $this->name = $name;
  }
}
