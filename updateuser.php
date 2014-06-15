<?php
  require_once 'lib/common.php';
  require_once 'lib/models/account.php';

  if(loggedIn() && admin()){
    $id = (int)$_POST['id'];
    $account = Account::findAccount($id);
    if($account == null) {
      setError('Invalid account id');
      header('Location: users.php');
    } else {
      $account->setName($_POST['name']);
      $account->setPassword($_POST['password']);
      $account->setPasswordConfirmation($_POST['password_confirmation']);
      $account->setAdmin($_POST['administrator'] == 'on');
      if($account->valid()){
        $account->update();
        setNotice('User was succesfully updated.');
        header('Location: users.php');
      } else {
        setError($account->getErrors());
        showView("edituser", 0, array(
          'account' => $account,
        ));
      }
    }
  }
