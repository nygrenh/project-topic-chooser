<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';
  require_once "lib/databaseconnection.php";

  if(empty($_POST["name"])) {
    showView("views/login.php", array(
      'error' => 'Please give a name.'
    ));
  }

  $name = $_POST["name"];

  if(empty($_POST["password"])) {
    showView("views/login.php", array(
      'user' => $user,
      'error' => 'Please give a password.'
    ));
  }

  $password = $_POST["password"];

  $account = Account::findAccountWithCredentials($name, $password);

  if( $account == null ) {
    showView("views/login.php", array(
      'error' => 'Invalid name or password.'
    ));
  } else {
    $_SESSION['account'] = $account;
    header('Location: index.php');
  }
