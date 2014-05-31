<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if(empty($_POST["name"])) {
    showView("login", array(
      'error' => 'Please give a name.'
    ));
  }

  $name = $_POST["name"];

  if(empty($_POST["password"])) {
    showView("login", array(
      'user' => $user,
      'error' => 'Please give a password.'
    ));
  }

  $password = $_POST["password"];

  $account = Account::findAccountWithCredentials($name, $password);

  if( $account == null ) {
    showView("login", array(
      'error' => 'Invalid name or password.'
    ));
  } else {
    $_SESSION['account'] = $account;
    header('Location: index.php');
  }
