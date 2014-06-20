<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if (loggedIn()) {
    $account = Account::findAccountWithName($_SESSION['name']);
    $courses = $account->getCourses();
    showView("summary", 1, array(
      'courses' => $courses
    ));
  }
