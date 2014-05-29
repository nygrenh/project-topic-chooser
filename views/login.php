<h1>Log in</h1>
<form action="newsession.php" method="POST">
  <label>Name</label>
  <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="<?php echo $data->user; ?>" />
  <label>Password</label>
  <input class="form-control" id="password" name="password" placeholder="Password" type="password" />
    <input class="btn btn-default" type="submit" value="Log in" />
</form>
