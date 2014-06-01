<?php
  require_once 'lib/common.php';
  if (loggedIn()) {
    showView("summary" );
  }
