<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if (loggedIn() && admin()) {
    $id = (int)$_GET['id'];
    $account = Account::findAccount($id);
    if($account == null) {
      setError('Invalid user id');
      header('Location: users.php');
    } else {
      $account->destroy();
      setNotice('User was succesfully destroyed.');
      header('Location: users.php');
    }
  }
