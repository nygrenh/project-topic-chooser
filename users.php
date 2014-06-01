<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';
  if (admin()) {
    showView("users", "Users", array() );
  }
