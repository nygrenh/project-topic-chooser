<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  $topic = new Topic();
  $topic->setName($_POST['name']);
  $topic->setSummary($_POST['summary']);
  $topic->setDescription($_POST['description']);
  $topic->setCourseId(1);
  if($topic->valid()){
  	$topic->insert();
  	header('Location: index.php');
  } else {
  	showView("newtopic", 0, array(
  		'topic' => $topic,
  		'error' => $topic->getErrors()
  	));
  }
  
