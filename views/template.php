<!DOCTYPE html>
  <html>

  <head>
    <title>Project Topic Chooser</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <ul class="nav navbar-nav">
          <li <?php if ($tab==0): ?> class="active" <?php endif; ?>>
            <a href="index.php">Courses</a>
          </li>
          <?php if (loggedIn()): ?>
            <li <?php if ($tab==1): ?> class="active" <?php endif; ?>>
              <a href="summary.php">Summary</a>
            </li>
            <?php if (admin()): ?>
              <li <?php if ($tab==2): ?> class="active" <?php endif; ?>>
                <a href="users.php">Users</a>
              </li>
            <?php endif; ?>
            <li <?php if ($tab==3): ?> class="active" <?php endif; ?>>
              <a href="logout.php">Log out</a>
            </li>
          <?php else: ?>
            <li <?php if ($tab==3): ?> class="active" <?php endif; ?>>
              <a href="login.php">Log in</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>

    <div id="container">
      <?php $errors = $_SESSION['message']; ?>
      <?php unset($_SESSION['message']); ?>
      <?php if ($errors != null):?>
        <div class="alert alert-<?php echo $_SESSION['message_type']; ?>">
        <ul>
          <?php if (is_array($errors)): ?>
            <?php foreach($errors as $error): ?>
              <li><?php echo $error; ?></li>
            <?php endforeach; ?>
          <?php else: ?>
            <li><?php echo $errors; ?></li>
          <?php endif; ?>
        </ul>
        </div>
      <?php endif; ?>
      <?php require 'views/'.$page.'.php'; ?>
    </div>
  </body>
</html>
