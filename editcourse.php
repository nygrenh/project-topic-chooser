<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $course = Course::findCourse($id);
    $teachers = Account::findAllTeachers();
    $coursesteachers = Array();
    foreach($course->getTeachers() as $teacher) {
      $coursesteachers[$teacher->getName()] = true;
    }
    if($course==null) {
      setError('Invalid course id');
      header('Location: index.php');
    } else {
      showView("editcourse", 0, array(
        'course'=> $course,
        'teachers' => $teachers,
        'coursesteachers' => $coursesteachers
      ));
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
