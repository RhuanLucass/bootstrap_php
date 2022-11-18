<?php
  $host = 'localhost';
  $dbname = 'bootstrap_php';
  $user = 'root';
  $pass = '';

  $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);
?>