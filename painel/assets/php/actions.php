<?php
  if(isset($_POST['edit-about'])){
    if(isset($_POST['sobre'])){
      $sobre = $_POST['sobre'];
      $sql = $pdo->prepare("UPDATE tb_sobre SET sobre=?");
      $validation = $sql->execute(array($sobre));

      $sobre = $pdo->prepare("SELECT * FROM tb_sobre");
      $sobre->execute();
      $sobre = $sobre->fetch()['sobre'];

      if($validation === true)
        echo '<div class="alert alert-success" role="alert">Código HTML de <b>sobre</b> editado com sucesso!</div>';
      else
        echo '<div class="alert alert-danger" role="alert">Erro ao editar código HTML de <b>sobre</b>!</div>';

      
    }else
      echo '<div class="alert alert-danger" role="alert">Erro ao editar código HTML de <b>sobre</b>!</div>';
  }else if(isset($_POST['name-member'])){
    if(isset($_POST['name-member']) && isset($_POST['description'])){
      $name = $_POST['name-member'];
      $description = $_POST['description'];
      $sql = $pdo->prepare("INSERT INTO tb_equipe VALUES (null, ?, ?)");
      $validation = $sql->execute(array($name, $description));

      if($validation === true)
        echo '<div class="alert alert-success" role="alert">Membro da equipe cadastrado com sucesso!</div>';
      else
        echo '<div class="alert alert-danger" role="alert">Erro ao cadastrar membro!</div>';

    }else
      echo '<div class="alert alert-danger" role="alert">Erro ao editar código HTML de <b>sobre</b>!</div>';
  }
?>

