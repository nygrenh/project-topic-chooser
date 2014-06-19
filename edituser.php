<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $account = Account::findAccount($id);
    if($account==null) {
      setError('Invalid user id');
      header('Location: users.php');
    } else {
      showView("edituser", 2, array(
        'account'=> $account
      ));
    }
  }
