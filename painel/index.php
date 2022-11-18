<?php include('../assets/php/pdo.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Controle</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary position-fixed w-100 top-0" id="nav-menu" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a id="logo" class="navbar-brand" href="index.php">Danki Code</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSite"
        aria-controls="navbarSite" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSite">
        <ul id="header-menu" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#sobre" ref="sobre">Editar Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cadastro" ref="cadastro">Cadastrar Membro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#membros" ref="membros">Membros</a>
          </li>
        </ul>

        <ul class="navbar-nav">
          <li>
            <a class="nav-link" href="?sair"><i class="bi bi-power"></i> Sair</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="header" class="text-white p-2">
    <div class="container">
      <div class="row d-flex align-items-center justify-content-center text-center">
        <div class="col-md-6">
          <h2 class="m-0"><i class="bi bi-gear-fill"></i> Painel de Controle</h2>
        </div>
        <div class="col-md-6">
          <span>Seu último login foi em: 12/06/2022</span>
        </div>
      </div>
    </div>
  </header>

  <section id="bread">
    <div class="container bg-white rounded p-2 my-2">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Library</li>
        </ol>
      </nav>
    </div>
  </section>

  <main id="main">
    <div class="container">
      <div class="row">
        <aside class="col-md-3 mb-3 d-none d-md-block">
          <ul class="list-group position-sticky" id="ul-aside">
            <li class="list-group-item p-0 active"><a class="text-white p-2" href="#sobre" ref="sobre"><i
                  class="bi bi-pencil-fill"></i> Editar Sobre</a></li>
            <li class="list-group-item p-0"><a class=" p-2" href="#cadastro" ref="cadastro"><i
                  class="bi bi-pencil-fill"></i> Cadastrar Membro</a></li>
            <li class="list-group-item p-0"><a class="d-flex justify-content-between p-2" href="#membros" ref="membros">
                <div><i class="bi bi-clipboard2-check-fill"></i> Membros</div><span class="badge bg-secondary">2</span>
              </a></li>
          </ul>
        </aside>
        <div class="col-md-9 ">
          <?php
            if(isset($_POST['edit-about'])){
              echo '<div class="alert alert-success" role="alert">Código HTML de <b>sobre</b> editado com sucesso!</div>';
            }
          ?>
          <section id="sobre-section" class="card">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title m-0">Sobre</h5>
            </div>
            <div class="card-body">
              <form method="post">
                <div class="row mb-3">
                  <label for="code-html" class="col-sm-12 col-form-label">Código HTML:</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" id="code-html"><?= $sobre ?></textarea>
                  </div>
                </div>
                <div class="col-sm-12 text-end">
                  <input type="hidden" name="edit-about" value="">
                  <button type="submit" name="submit" class="btn btn-primary">Editar</button>
                </div>
              </form>
            </div>
          </section>

          <section id="cadastro-section" class="card my-3">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title m-0">Cadastrar Equipe:</h5>
            </div>
            <div class="card-body">
              <form>
                <div class="row mb-3">
                  <label for="name" class="col-sm-12 col-form-label">Nome Membro:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="name">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="code-html" class="col-sm-12 col-form-label">Descrição do Membro:</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" id="code-html"></textarea>
                  </div>
                </div>
                <div class="col-sm-12 text-end">
                  <button type="submit" class="btn btn-primary">Editar</button>
                </div>
              </form>
            </div>
          </section>

          <section id="membros-section" class="card my-3">
            <div class="card-header bg-primary text-white">
              <h5 class="card-title m-0">Membros da Equipe:</h5>
            </div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" class="w-25">ID</th>
                    <th scope="col" class="w-50">Nome</th>
                    <th scope="col" class="w-25"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i = 0; $i < 5; $i++) { ?>
                  <tr>
                    <td scope="row">1</td>
                    <td>Rhuan</td>
                    <td class="d-flex justify-content-between">
                      <button type="button" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                      <button type="button" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </div>
  </main>

  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>