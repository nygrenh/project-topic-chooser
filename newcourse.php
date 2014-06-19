<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  if (loggedIn()) {
    $course = new Course();
    showView("newcourse",0, array(
      'course' => $course
    ));
  }
