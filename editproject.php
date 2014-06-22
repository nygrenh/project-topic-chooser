<?php
  require_once 'lib/common.php';
  require_once 'lib/models/project.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $project = Project::findProject($id);
    if($project==null) {
      setError('Invalid project id');
      header('Location: index.php');
    } else {
      showView("editproject", 0, array(
        'project'=> $project
      ));
    }
  } else {
    setError("Please log in.");
    header('Location: login.php');
  }
