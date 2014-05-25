<?php
//require_once sisällyttää annetun tiedoston vain kerran
require_once "lib/models/account.php";
require_once "lib/databaseconnection.php";

//Lista asioista array-tietotyyppiin laitettuna:
$list = Account::findAllAccounts();
?><!DOCTYPE HTML>
<html>
  <head>
    <title>Listaustesti</title>
  </head>
  <body>
    <h1>List of users</h1>
    <ul>
      <?php foreach($list as $thing): ?>
      <li><?php echo $thing->getName(); ?></li>
      <?php endforeach; ?>
    </ul>
  </body>
</html>
