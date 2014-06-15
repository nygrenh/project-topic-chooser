<h1> Users </h1>
<p><a href="newuser.php" class="btn btn-sm btn-default"> New User </a></p>
<table class = "table table-hover">
  <tr>
    <th> Name </th>
    <th> Type </th>
    <th> </th>
    <th> </th>
  </tr>
  <tbody>
    <?php foreach($data->accounts as $account): ?>
      <tr>
        <td> <a href = "showuser.php?id=<?php echo htmlspecialchars($account->getId()); ?>">  <?php echo htmlspecialchars($account->getName()); ?> </a> </td>
        <td> <?php echo htmlspecialchars($account->getType()); ?> </td>
        <td> <a href="edituser.php?id=<?php echo htmlspecialchars($account->getId()); ?>"> Edit </a> </td>
        <td> <a href="destroyuser.php?id=<?php echo htmlspecialchars($account->getId()); ?>"> Destroy </a> </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
