<?php
  session_start();
  session_unset();
  session_destroy();

  header('Location: connexion.php');
  exit();

  setcookie('user', 'logged_out', time() +3600, '/', 'votresite.com', true, true)
?>