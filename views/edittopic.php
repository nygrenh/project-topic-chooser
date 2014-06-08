<h1>Edit Topic</h1>
<form action="updatetopic.php" method="POST">
  <label>Name</label>
  <input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo $data->topic->getName(); ?>" />
  <label>Summary</label>
  <input class="form-control" placeholder="Summary" type="text" name="summary" value="<?php echo $data->topic->getSummary(); ?>" />
  <label>Description</label>
  <input class="form-control" placeholder="Description" type="text" name="description" value="<?php echo $data->topic->getDescription(); ?>"/>
  <input type="hidden" name="id" value="<?php echo $data->topic->getId(); ?>">
  <div class='actions'>
    <input type="submit" class="btn btn-default" value="Update topic" />
  </div>
</form>
