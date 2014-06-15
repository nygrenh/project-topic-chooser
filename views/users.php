<h1> Users </h1>
<p><a href="newuser.php" class="btn btn-sm btn-default"> New User </a></p>
<table class = "table table-hover">
  <tr>
    <th> Name </th>
    <th> Type </th>
    <?php if (admin()): ?>
      <th> </th>
      <th> </th>
    <?php endif; ?>
  </tr>
  <tbody>
    <?php foreach($data->accounts as $account): ?>
      <tr>
        <td> <a href = "showuser.php?id=<?php echo htmlspecialchars($account->getId()); ?>">  <?php echo htmlspecialchars($account->getName()); ?> </a> </td>
        <td> <?php echo htmlspecialchars($account->getType()); ?> </td>
        <?php if (admin()): ?>
          <td> <a href="edituser.php?id=<?php echo htmlspecialchars($account->getId()); ?>"> Edit </a> </td>
          <td> <a href="destroyuser.php?id=<?php echo htmlspecialchars($account->getId()); ?>"> Destroy </a> </td>
        <?php endif; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
