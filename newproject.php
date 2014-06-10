<?php
  require_once 'lib/common.php';
  if (loggedIn()) {
    $topic_id = (int)$_GET['topic_id'];
    showView("newproject", 0, array(
      'topic_id' => $topic_id
    ));
  }
