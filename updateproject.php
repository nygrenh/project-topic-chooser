<?php
  require_once 'lib/common.php';
  require_once 'lib/models/project.php';

  if (loggedIn()) {
    $id = (int)$_POST['id'];
    $project = Project::findProject($id);
    if($project == null) {
      setError('Invalid project id');
      header('Location: index.php');
    } else {
      $project->setStudent($_POST['student']);
      $project->setHours($_POST['hours']);
      $project->setGrade($_POST['grade']);
      if($project->valid()){
        $project->update();
        setNotice('Project was succesfully updated.');
        header('Location: showtopic.php?id='.$project->getTopicId());
      } else {
        setError($project->getErrors());
        showView("editproject", 0, array(
          'project' => $project
        ));
      }
    }
  }
