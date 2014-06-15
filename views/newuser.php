<h1>New User</h1>
<form action="createuser.php" method="POST">
  <label>Name</label>
  <input class="form-control" placeholder="Name" type="text" name="name" />
  <label>Password</label>
  <input class="form-control" placeholder="Password" type="password" name="password" />
  <label>Password confirmation</label>
  <input class="form-control" placeholder="Password confirmation" type="password" name="password_confirmation" />
  <input type="checkbox" name="administrator"> <label>Administrator</label>
  <div class='actions'>
    <input type="submit" class="btn btn-default" value="Create User" />
  </div>
</form>
