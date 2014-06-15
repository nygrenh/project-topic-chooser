<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  $course = new Course();
  $course->setName($_POST['name']);
  if($course->valid()){
    $course->insert();
    setNotice('Course was succesfully created.');
    header('Location: topics.php?course_id='.$course->getId());
  } else {
    setError($course->getErrors());
    showView("newcourse", 0, array(
      'course' => $course
    ));
  }
