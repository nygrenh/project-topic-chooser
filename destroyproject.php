<?php
  require_once 'lib/common.php';
  require_once 'lib/models/project.php';

  if (loggedIn()) {
    $id = (int)$_GET['id'];
    $project = Project::findProject($id);
    $topic_id = $project->getTopicId();
    if($project == null) {
      setError('Invalid project id');
      header('Location: showtopic.php?id='.$topic_id);
    } else {
      $project->destroy();
      setNotice('Topic was succesfully destroyed.');
      header('Location: showtopic.php?id='.$topic_id);
    }
  }
