<?php
  require_once 'lib/common.php';
  require_once 'lib/models/project.php';

  if (loggedIn()) {
    $project = new Project();
    $project->setTopicId((int)$_GET['topic_id']);
    showView("newproject", 0, array(
      'project' => $project
    ));
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
