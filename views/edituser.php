<h1>Edit User</h1>
<form action="updateuser.php" method="POST">
  <label>Name</label>
  <input class="form-control" placeholder="Name" type="text" name="name" value="<?php echo htmlspecialchars($data->account->getName()); ?>" />
  <label>Password</label>
  <input class="form-control" placeholder="Password" type="password" name="password" />
  <label>Password confirmation</label>
  <input class="form-control" placeholder="Password confirmation" type="password" name="password_confirmation" />
  <input type="checkbox" name="administrator" <?php if($data->account->getAdmin()): ?>checked="checked"<?php endif ?>> <label>Administrator</label>
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($data->account->getId()); ?>">
  <div class='actions'>
    <input type="submit" class="btn btn-default" value="Update User" />
  </div>
</form>
