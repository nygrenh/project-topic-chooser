<h1>New Project</h1>
<form action="createproject.php" method="POST">
  <label>Student Name</label>
  <input class="form-control" placeholder="Student Name" type="text" name="student" />
  <label>Hours</label>
  <input class="form-control" placeholder="Hours" type="text" name="hours"/>
  <label>Grade</label>
  <input class="form-control" placeholder="Grade" type="text" name="grade" />
  <input type="hidden" name="topic_id" value="<?php echo htmlspecialchars($data->topic_id); ?>">
  <div class='actions'>
    <input type="submit" class="btn btn-default" value="Create Project" />
  </div>
</form>
