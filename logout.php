<?php
  require_once 'lib/common.php';
  unset($_SESSION['account']);
  header('Location: index.php');
