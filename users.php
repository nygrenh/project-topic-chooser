<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  $accounts = Account::findAllAccounts();
  if (loggedIn() && admin()) {
    showView("users", 2, array(
      'accounts' => $accounts
    ));
  } else {
    setError("You can't do that!");
    header('Location: index.php');
  }
