<?php
  require_once 'lib/common.php';
  unset($_SESSION['account']);
  unset($_SESSION['name']);
  unset($_SESSION['admin']);
  header('Location: index.php');
