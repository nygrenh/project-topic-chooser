<h1> <?php echo htmlspecialchars($data->topic->getName()); ?> </h1>
<p>
  <?php echo htmlspecialchars($data->topic->getDescription()); ?>
<p>
  Following data is still hardcoded...
<p> Average hours: 153.5
  Average grade: 4
</p>
<?php if (loggedIn()): ?>
  <h2> Completed projects </h2>
  <p><a href="newproject.php" class="btn btn-sm btn-default"> New Project </a></p>
  <table class="table table-hover">
    <tr>
      <th> Student </th>
      <th> Hours </th>
      <th> Grade </th>
      <th> </th>
      <th> </th>
    </tr>
    <tbody>
      <tr>
        <td> Student </td>
        <td> 300 </td>
        <td> 3 </td>
        <td> <a href="editproject.php?project_id=1"> Edit </a> </td>
        <td> <a href=""> Destroy </a> </td>
      </tr>
      <tr>
        <td> Another student </td>
        <td> 7 </td>
        <td> 5 </td>
        <td> <a href="editproject.php?project_id=2"> Edit </a> </td>
        <td> <a href=""> Destroy </a> </td>
      </tr>
    </tbody>
  </table>
<?php endif; ?>
