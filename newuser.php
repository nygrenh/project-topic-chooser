<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';
  if (loggedIn() && admin()) {
    showView("newuser", 2);
  }
