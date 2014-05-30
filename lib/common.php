<?php

session_start();

  function showView($page, $data = array()) {
    $data = (object)$data;
    require 'views/template.php';
    exit();
  }

  function isLoggedin(){
    return isset($_SESSION['account']);
  }
