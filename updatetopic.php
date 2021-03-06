<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $id = (int)$_POST['id'];
    $topic = Topic::findTopic($id);
    if($topic == null) {
      setError('Invalid topic id');
      header('Location: topics.php?course_id='.$topic->getCourseId());
    } else {
      $topic->setName($_POST['name']);
      $topic->setDescription($_POST['description']);
      $topic->setSummary($_POST['summary']);
      if($topic->valid()){
        $topic->update();
        setNotice('Topic was succesfully updated.');
        header('Location: topics.php?course_id='.$topic->getCourseId());
      } else {
        setError($topic->getErrors());
        showView("edittopic", 0, array(
          'topic' => $topic
        ));
      }
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
