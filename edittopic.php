<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $topic = Topic::findTopic($id);
    if($topic==null) {
      setError('Invalid topic id');
      header('Location: topics.php?course_id=1');
    } else {
      showView("edittopic", 0, array(
        'topic'=> $topic
      ));
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
