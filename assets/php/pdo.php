<?php
  $host = 'localhost';
  $dbname = 'bootstrap_php';
  $user = 'root';
  $pass = '';

  $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $pass);

  $sobre = $pdo->prepare("SELECT * FROM tb_sobre");
  $sobre->execute();
  $sobre = $sobre->fetch()['sobre'];
?>