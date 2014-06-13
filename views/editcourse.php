<h1>Edit Course</h1>
<form action="updatecourse.php" method="POST">
    <label>Course Name</label>
    <input class="form-control" placeholder="Course Name" type="text" name="name" value="<?php echo htmlspecialchars($data->course->getName()); ?>"/>
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($data->course->getId()); ?>">
  <div class='actions'>
    <input type="submit" class="btn btn-default" value="Update course" />
  </div>
</form>
