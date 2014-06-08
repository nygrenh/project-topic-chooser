<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $topic = Topic::findTopic($id);
    if($topic==null) {
      showView("", 0, array(
        'error' => 'Invalid topic id.'
      ));
    } else {
      showView("edittopic", 0, array(
        'topic'=> $topic
      ));
    }
  }
