<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $course = Course::findCourse($id);
    if($course==null) {
      setError('Invalid course id');
      header('Location: index.php');
    } else {
      showView("editcourse", 0, array(
        'course'=> $course
      ));
    }
  }
