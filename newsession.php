<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if(empty($_POST["name"])) {
    showView("login", 3, array(
      'error' => 'Please give a name.'
    ));
  }

  $name = $_POST["name"];

  if(empty($_POST["password"])) {
    showView("login", 3, array(
      'name' => $name,
      'error' => 'Please give a password.'
    ));
  }

  $password = $_POST["password"];

  $account = Account::findAccountWithCredentials($name, $password);

  if( $account == null ) {
    showView("login", 3, array(
      'name' => $name,
      'error' => 'Invalid name or password.'
    ));
  } else {
    $_SESSION['account'] = $account;
    $_SESSION['admin'] = $account->getAdmin();
    header('Location: index.php');
  }
