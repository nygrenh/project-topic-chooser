<h1> Courses </h1>
  <?php if (loggedIn()): ?>
    <p><a href="newcourse.php" class="btn btn-sm btn-default"> New Course </a></p>
  <?php endif; ?>
  <table class="table table-hover">
    <tr>
      <th> Name </th>
      <th> Teacher </th>
      <?php if (loggedIn()): ?>
        <th> </th>
        <th> </th>
      <?php endif; ?>
    </tr>
    <tbody>
      <?php foreach($data->courses as $course): ?>
        <tr>
          <td> <a href = "topics.php?course_id=<?php echo htmlspecialchars($course->getId()); ?>">  <?php echo htmlspecialchars($course->getName()); ?> </a> </td>
          <td> Teacher </td>
          <?php if (loggedIn()): ?>
            <td> <a href="editcourse.php?id=<?php echo htmlspecialchars($course->getId()); ?>"> Edit </a> </td>
            <td> <a href="destroycourse.php?id=<?php echo htmlspecialchars($course->getId()); ?>"> Destroy </a> </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
