<?php
  require_once 'lib/common.php';
  require_once 'lib/models/topic.php';

  if (loggedIn()) {
    $id = (int)$_POST['id'];
    $topic = Topic::findTopic($id);
    if($topic == null) {
      // invalid topic id
    } else {
      $topic->setName($_POST['name']);
      $topic->setDescription($_POST['description']);
      $topic->setSummary($_POST['summary']);
      if($topic->valid()){
        $topic->update();
        header('Location: index.php');
      } else {
        showView("edittopic", 0, array(
          'topic' => $topic,
          'error' => $topic->getErrors()
        ));
      }
    }
  }
