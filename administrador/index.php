<?php #require_once "../includes/validarSesion.php" #require_once "../includes/database.php"?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link href="../resources/assets/favicon.ico" rel="icon">
    <link rel="stylesheet" href="../resources/css/adminMenu.css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <title>Mexicanadas</title>
  </head>
  <body>
      <!-- Sidebar  -->
      <nav class="site-sidebar">
        <div class="scroller">
          <div class="m-2">
            <div class="sidebar-header text-center">
                <h4>Bienvenido <? //= $user['email']?></h4>
            </div>
            <ul class="nav nav-pills mb-3 flex-column" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" href="#">Administrador</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav" id="pills-borradores-tab" data-bs-toggle="pill" data-bs-target="#pills-borradores" type="button" role="tab" aria-controls="pills-borradores" aria-selected="true" href="#">Borradores</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav" id="pills-estadistica-tab" data-bs-toggle="pill" data-bs-target="#pills-estadistica" type="button" role="tab" aria-controls="pills-estadistica" aria-selected="true" href="#">Estadisticas</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav" id="pills-mensajes-tab" data-bs-toggle="pill" data-bs-target="#pills-mensajes" type="button" role="tab" aria-controls="pills-mensajes" aria-selected="true" href="#">Mensajes</a>
              </li>
              <li class="nav-item" role="presentation">
                  <a class="nav-link buttons-nav" href="../includes/logout.php">Cerrar sesion</a>
              </li>
              <li class="nav-item" role="presentation">
                <a class="nav-link buttons-nav article" id="pills-articulo-tab" data-bs-toggle="pill" data-bs-target="#pills-articulo" type="button" role="tab" aria-controls="pills-articulo" aria-selected="true" href="#"><i class="bi bi-plus"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="site-heading">
        <div class="m-3">
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">aaa</div>
            <div class="tab-pane fade" id="pills-borradores" role="tabpanel" aria-labelledby="pills-borradores-tab">bbb</div>
            <div class="tab-pane fade" id="pills-estadistica" role="tabpanel" aria-labelledby="pills-estadistica-tab">ccc</div>
            <div class="tab-pane fade" id="pills-mensajes" role="tabpanel" aria-labelledby="pills-mensajes-tab">ddd</div>
            <div class="tab-pane fade" id="pills-articulo" role="tabpanel" aria-labelledby="pills-articulo-tab">eee</div>
          </div>
        </div>
      </div>
  </body>
  <!-- Scripts -->
  <script src="../resources/js/bootstrap.bundle.min.js"></script>
</html>