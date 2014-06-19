<label>Student Name</label>
<input class="form-control" placeholder="Student Name" type="text" name="student" value="<?php echo htmlspecialchars($data->project->getStudent()); ?>" />
<label>Hours</label>
<input class="form-control" placeholder="Hours" type="text" name="hours" value="<?php echo htmlspecialchars($data->project->getHours()); ?>" />
<label>Grade</label>
<input class="form-control" placeholder="Grade" type="text" name="grade" value="<?php echo htmlspecialchars($data->project->getGrade()); ?>" />
<input type="hidden" name="id" value="<?php echo htmlspecialchars($data->project->getId()); ?>">
<input type="hidden" name="topic_id" value="<?php echo htmlspecialchars($data->project->getTopicId()); ?>">
