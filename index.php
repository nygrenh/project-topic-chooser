<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  $courses = Course::findAllCourses();
  showView("index", 0, array(
    'courses' => $courses
  ));
