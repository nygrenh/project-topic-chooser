<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';
  require_once 'lib/models/account.php';

  if (loggedIn()) {
    $course = new Course();
    $teachers = Account::findAllTeachers();
    showView("newcourse",0, array(
      'course' => $course,
      'teachers' => $teachers
    ));
  }
