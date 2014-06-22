<?php
  require_once 'lib/common.php';
  require_once 'lib/models/project.php';

  if (loggedIn()) {
    $project = new Project();
    $project->setStudent($_POST['student']);
    $project->setHours($_POST['hours']);
    $project->setGrade($_POST['grade']);
    $project->setTopicId($_POST['topic_id']);
    if($project->valid()){
      $project->insert();
      setNotice('Project was succesfully created.');
      header('Location: showtopic.php?id='.$project->getTopicId());
    } else {
      setError($project->getErrors());
      showView("newproject", 0, array(
        'project' => $project,
        'topic_id' => $project->getTopicId()
      ));
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
