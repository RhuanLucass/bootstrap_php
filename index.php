<?php
  include('assets/php/pdo.php');
  $sobre = $pdo->prepare("SELECT * FROM tb_sobre");
  $sobre->execute();
  $sobre = $sobre->fetch()['sobre'];  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BootStrap com PHP</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="bg-white d-flex flex-wrap align-items-center justify-content-between py-3 border-bottom position-sticky">
    <a class="mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="fs-4">Danki Code</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Sobre</a></li>
      <li class="nav-item"><a href="#" class="nav-link">Contato</a></li>
    </ul>
  </header>

  <main class="banner">
    <div class="overlay"></div>
    <div class="container d-flex align-items-center justify-content-center" id="chamada-banner">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2>&lt;Danki.Code&gt;</h2>
          <p class="text-white">Empresa voltada para o desenvolvimento web e marketing digital</p>
          <button type="button" id="button-main" class="btn btn-success">Saiba mais</button>
        </div>
      </div>
    </div>
  </main>
  <section id="cadastro-lead">
    <div class="container">
      <div class="row d-flex align-items-center text-center">
        <div class="col-md-6">
          <h3 class="text-white">Entre na nossa lista!</h3>
        </div>
        <div class="col-md-6">
          <form action="" method="post" class="d-flex justify-content-center">
            <input type="text" name="nome" placeholder="Nome">
            <button type="submit" class="btn btn-primary text-white">Enviar</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  
  <section class="services" id="section-services">
    <h2 class="py-4 text-center">Conheça nossa empresa</h2>
    <div class="container text-center">
      <div class="row"><?= $sobre; ?></div>
    </div>
  </section>

  <section id="team">
    <h2 class="py-2 text-center text-white">Equipe</h2>
    <div class="container py-3">
      <div class="row">
      <?php
        $members = $pdo->prepare("SELECT nome, descricao FROM tb_equipe");
        $members->execute();
        $allMembers = $members->fetchAll();
        foreach ($allMembers as $key => $value) {
      ?>
        <div class="col-md-6 mb-2">
          <div class="equipe-single p-2 rounded h-100">
            <div class="row h-100 d-flex align-items-center">
              <div class="col-lg-3 d-flex align-items-center justify-content-center">
                <div class="user-picture bg-secondary rounded-circle d-flex justify-content-center align-items-center"><i class="bi bi-person text-white"></i></div>
              </div>
              <div class="col-lg-9">
                <h4><?= $value['nome'] ?></h3>
                <p class="m-0"><?= $value['descricao'] ?></p>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>

  <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>