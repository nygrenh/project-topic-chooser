<?php
  require_once 'lib/common.php';
  if (loggedIn()) {
    $course_id = (int)$_GET['course_id'];
    showView("newtopic", 0, array(
      course_id => $course_id
    ));
  }
