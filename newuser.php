<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if (loggedIn() && admin()) {
    $account = new Account();
    showView("newuser", 2, array(
      'account' => $account
    ));
  } else {
    setError("You can't do that!");
    header('Location: index.php');
  }
