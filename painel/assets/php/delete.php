<?php
  if(isset($_POST['id-member'])){
    include('../../../assets/php/pdo.php');
    $idMember = $_POST['id-member'];
    $sql = $pdo->prepare("DELETE FROM tb_equipe WHERE id=?");
    $sql->execute(array($idMember));
    echo $idMember;
  }


?>