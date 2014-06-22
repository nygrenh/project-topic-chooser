<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $topic = new Topic();
    $topic->setCourseId((int)$_GET['course_id']);
    showView("newtopic", 0, array(
      'topic' => $topic
    ));
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
