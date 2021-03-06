<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $topic = new Topic();
    $topic->setName($_POST['name']);
    $topic->setSummary($_POST['summary']);
    $topic->setDescription($_POST['description']);
    $topic->setCourseId($_POST['course_id']);
    if($topic->valid()){
    	$topic->insert();
      setNotice('Topic was succesfully created.');
    	header('Location: topics.php?course_id='.$topic->getCourseId());
    } else {
      setError($topic->getErrors());
    	showView("newtopic", 0, array(
    		'topic' => $topic,
    	));
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
