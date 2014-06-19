<label>Name</label>
<input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo htmlspecialchars($data->topic->getName()); ?>" />
<label>Summary</label>
<input class="form-control" placeholder="Summary" type="text" name="summary" value="<?php echo htmlspecialchars($data->topic->getSummary()); ?>" />
<label>Description</label>
<input class="form-control" placeholder="Description" type="text" name="description" value="<?php echo htmlspecialchars($data->topic->getDescription()); ?>"/>
<input type="hidden" name="course_id" value="<?php echo htmlspecialchars($data->topic->getCourseId()); ?>">
<input type="hidden" name="id" value="<?php echo htmlspecialchars($data->topic->getId()); ?>">
