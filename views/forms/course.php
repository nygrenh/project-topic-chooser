<label>Course Name</label>
<input class="form-control" placeholder="Course Name" type="text" name="name" value="<?php echo htmlspecialchars($data->course->getName()); ?>"/>
<input type="hidden" name="id" value="<?php echo htmlspecialchars($data->course->getId()); ?>">
