<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';
  require_once 'lib/models/account.php';

  if (loggedIn()) {
    $course = new Course();
    $teachers = Account::findAllTeachers();
    // Select current user by default
    $coursesteachers = array($_SESSION['name'] => true);
    showView("newcourse",0, array(
      'course' => $course,
      'teachers' => $teachers,
      'coursesteachers' => $coursesteachers
    ));
  }
