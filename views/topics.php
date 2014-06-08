<h1> Topics </h1>
<?php if (loggedIn()): ?>
  <p><a href="newtopic.php" class="btn btn-sm btn-default"> New Topic </a></p>
<?php endif; ?>
<table class="table table-hover">
  <tr>
    <th> Name </th>
    <th> Description </th>
    <?php if (loggedIn()): ?>
      <th> </th>
      <th> </th>
    <?php endif; ?>
  </tr>
  <tbody>
    <?php foreach($data->topics as $topic): ?>
      <tr>
        <td>
          <a href="showtopic.php?id=<?php echo htmlspecialchars($topic->getId()); ?>">
           <?php echo htmlspecialchars($topic->getName()); ?>
          </a> </td>
        <td> <?php echo htmlspecialchars($topic->getSummary()); ?> </td>
        <?php if (loggedIn()): ?>
          <td> <a href="edittopic.php?id=<?php echo htmlspecialchars($topic->getId()); ?>"> Edit </a> </td>
          <td> <a href="destroytopic.php?id=<?php echo htmlspecialchars($topic->getId()); ?>"> Destroy </a> </td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
