<!DOCTYPE html>
  <html>

  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <ul class="nav navbar-nav">
          <li><a href="index.html">Courses</a></li>
          <li><a href="summary.html">Summary</a></li>
          <li><a href="users/index.html">Users</a></li>
          <?php if (!isLoggedIn()): ?>
            <li class="active"><a href="login.php">Log in</a></li>
          <?php else: ?>
            <li class="active"><a href="logout.php">Log out</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div id="container">
      <?php if (!empty($data->error)): ?>
        <div class="alert alert-danger"><?php echo $data->error; ?></div>
      <?php endif; ?>
      <?php require $page; ?>
    </div>
  </body>
</html>
