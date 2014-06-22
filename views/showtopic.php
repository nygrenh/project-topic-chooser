<h1> <?php echo htmlspecialchars($data->topic->getName()); ?> </h1>
<p>
  <?php echo htmlspecialchars($data->topic->getDescription()); ?>
</p>
<p> Average hours: <?php echo htmlspecialchars($data->topic->averageHours()); ?>.
  Average grade: <?php echo htmlspecialchars($data->topic->averageGrade()); ?>.
  Failure rate: <?php echo htmlspecialchars($data->topic->failureRate()); ?>%
</p>
<?php if (loggedIn()): ?>
  <h2> Completed projects </h2>
  <p><a href="newproject.php?topic_id=<?php echo htmlspecialchars($data->topic->getId()); ?>" class="btn btn-sm btn-default"> New Project </a></p>
  <table class="table table-hover">
    <tr>
      <th> Student </th>
      <th> Hours </th>
      <th> Grade </th>
      <th> </th>
      <th> </th>
    </tr>
    <tbody>
      <?php foreach($data->projects as $project): ?>
        <tr<?php if($project->getGrade() == 0): ?> class="disabled"<?php endif ?>>
          <td> <?php echo htmlspecialchars($project->getStudent()); ?> </td>
          <td> <?php echo htmlspecialchars($project->getHours()); ?> </td>
          <td> <?php echo htmlspecialchars($project->getGrade()); ?> </td>
          <?php if (loggedIn()): ?>
            <td> <a href="editproject.php?id=<?php echo htmlspecialchars($project->getId()); ?>"> Edit </a> </td>
            <td> <a href="destroyproject.php?id=<?php echo htmlspecialchars($project->getId()); ?>"> Destroy </a> </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
      <tr>
    </tbody>
  </table>
<?php endif; ?>
