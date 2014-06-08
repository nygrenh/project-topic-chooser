<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if(empty($_POST["name"])) {
    setError('Please give a name.');
    showView("login", 3);
  }

  $name = $_POST["name"];

  if(empty($_POST["password"])) {
    setError('Please give a password.');
    showView("login", 3, array(
      'name' => $name,
    ));
  }

  $password = $_POST["password"];

  $account = Account::findAccountWithCredentials($name, $password);

  if( $account == null ) {
    setError('Invalid name or password.');
    showView("login", 3, array(
      'name' => $name,
    ));
  } else {
    $_SESSION['account'] = $account;
    $_SESSION['admin'] = $account->getAdmin();
    header('Location: index.php');
  }
