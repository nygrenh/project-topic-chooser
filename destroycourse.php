<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $course = Course::findCourse($id);
    if($course == null) {
      setError('Invalid course id');
    } else {
      $course->destroy();
      setNotice('Course was succesfully destroyed.');
    }
    header('Location: index.php');
  }
