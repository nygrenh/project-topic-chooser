<?php
  require_once 'lib/common.php';
  require_once 'lib/models/course.php';

  if (loggedIn()) {
    $id = (int)$_POST['id'];
    $course = Course::findCourse($id);
    if($course == null) {
      setError('Invalid course id');
      header('Location: index.php');
    } else {
      $course->setName($_POST['name']);
      if($course->valid()){
        $course->update();
        // Update teacher associations
        $teachers = Account::findAllTeachers();
        foreach($teachers as $teacher) {
          if (isset($_POST['teacher-'.$teacher->getName()])) {
            if(!$course->hasTeacher($teacher)) {
              $course->addTeacher($teacher);
            }
          } else {
            $course->removeTeacher($teacher);
          }
        }
        setNotice('Course was succesfully updated.');
        header('Location: topics.php?course_id='.$id);
      } else {
        setError($course->getErrors());
        showView("editcourse", 0, array(
          'course' => $course
        ));
      }
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
