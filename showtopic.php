<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';
  require_once 'lib/models/project.php';

  $id = (int)$_GET['id'];
  $topic = Topic::findTopic($id);
  $projects = Project::findAllProjects($id);
  if($topic==null) {
    setError('Invalid topic id');
    header('Location: topics.php?course_id=1');
  } else {
    showView("showtopic", 0, array(
      'topic'=> $topic,
      'projects' => $projects
    ));
  }
