<label>Course Name</label>
<input class="form-control" placeholder="Course Name" type="text" name="name" value="<?php echo htmlspecialchars($data->course->getName()); ?>"/>
<input type="hidden" name="id" value="<?php echo htmlspecialchars($data->course->getId()); ?>">
<label>Course teachers</label>
<?php foreach($data->teachers as $teacher): ?>
  <div>
    <input type="checkbox" name="teacher-<?php echo htmlspecialchars($teacher->getName()); ?>"
    <?php if($data->coursesteachers[$teacher->getName()] == true): ?>checked="checked"<?php endif ?> >
    <label><?php echo htmlspecialchars($teacher->getName()); ?></label>
  </div>
<?php endforeach; ?>
