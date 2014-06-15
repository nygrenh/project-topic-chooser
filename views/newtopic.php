<h1>New Topic</h1>
<form action="createtopic.php" method="POST">
  <label>Name</label>
  <input class="form-control" placeholder="Name" type="text" name="name" />
  <label>Summary</label>
  <input class="form-control" placeholder="Summary" type="text" name="summary" />
  <label>Description</label>
  <input class="form-control" placeholder="Description" type="text" name="description" />
  <input type="hidden" name="course_id" value="<?php echo htmlspecialchars($data->course_id); ?>">
  <div class='actions'>
    <p><input type="submit" class="btn btn-default" value="Create topic" /></p>
  </div>
</form>
</div>
