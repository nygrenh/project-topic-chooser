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
      <tr>
        <td> <a href = "topics.php?course_id=1"> Database Application </a> </td>
        <td> Teacher </td>
        <?php if (loggedIn()): ?>
          <td> <a href="editcourse.php?course_id=1"> Edit </a> </td>
          <td> <a href=""> Destroy </a> </td>
        <?php endif; ?>
      </tr>
    </tbody>
  </table>
