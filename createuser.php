<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if (loggedIn() && admin()) {
    $account = new Account();
    $account->setName($_POST['name']);
    $account->setPassword($_POST['password']);
    $account->setPasswordConfirmation($_POST['password_confirmation']);
    $account->setAdmin($_POST['administrator'] == 'on');
    if($account->valid()){
      $account->insert();
      setNotice('User was succesfully created.');
      header('Location: users.php');
    } else {
      setError($account->getErrors());
      showView("newuser", 0, array(
        'account' => $account,
      ));
    }
  }
