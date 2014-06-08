<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $topic = Topic::findTopic($id);
    if($topic == null) {
      // invalid topic id
    } else {
      $topic->destroy();
      header('Location: index.php');
    }
  }
