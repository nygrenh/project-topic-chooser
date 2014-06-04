<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  $course_id = (int)$_GET['course_id'];
  $topics = Topic::findTopics($course_id);
  showView("topics", 0, array(
    'topics' => $topics
  ));
