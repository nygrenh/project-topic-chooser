<?php

session_start();

  function showView($page, $tab=0, $data) {
    $data = (object)$data;
    require 'views/template.php';
    exit();
  }

  function loggedIn(){
    return isset($_SESSION['account']);
  }

  function admin(){
    return $_SESSION["admin"];
  }
