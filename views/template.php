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
          <li><a href="index.php">Courses</a></li>
          <?php if (loggedIn()): ?>
            <li><a href="summary.php">Summary</a></li>
            <?php if (admin()): ?>
              <li><a href="users.php">Users</a></li>
            <?php endif; ?>
            <li class="active"><a href="logout.php">Log out</a></li>
          <?php else: ?>
            <li class="active"><a href="login.php">Log in</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div id="container">
      <?php if (!empty($data->error)): ?>
        <div class="alert alert-danger"><?php echo $data->error; ?></div>
      <?php endif; ?>
      <?php require 'views/'.$page.'.php'; ?>
    </div>
  </body>
</html>
