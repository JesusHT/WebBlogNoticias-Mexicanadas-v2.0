<?php
require '../php/config/database.php';
$numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=2 AND status=1 ORDER BY id ASC limit 0,4 ";
$consulta= $conn->query($numPosts);
$idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tecnologia: Mexicanadas</title>
  <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
  <link href="../resources/css/estilosgeneral.css" rel="stylesheet">
  <link href="../resources/assets/favicon.ico" rel="icon">
</head>
<!--cambio-->
<!-- ---------------------------------------------------
                    BARRA DE NAVEGACIÓN
----------------------------------------------------- -->
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
    <div class="container-fluid" id="menu">
    </div>
  </nav>
</header>
<body style="background: url(../assets/tecnologiaBG.png);">
  <br><br><br><br>
<!-- ---------------------------------------------------
                    CONTENIDO
----------------------------------------------------- -->
<div class="container-xl">
    <div class="row">
        <div class="p-2 p-md-3 mb-2 text-white rounded bg-">
            <!--<img class="img-fluid d-block mx-auto" style="width: 30pc" src="../assets/politica1.gif">-->
            <p class="textcoloraized text-shadow">T E C N O L O G I A</p>
        </div>
    </div>
  </div>

  <div class="container-sm">
    <div class="row justify-content-md-center">

      <div class="col-auto col-md-4"> <!-- Primera columna-->
        <h2 class="text-center">Sugerencias</h2>
        <nav class="navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary"> <!-- Aqui se pone el buscador -->
            <div class="container-fluid">
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Buscar</button>
              </form>
            </div>
          </nav>

          <?php for ($i=0;$i < 6; $i++): ?>
			<div class="card shadow-sm bg-body rounded border border-secondary">
				<img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
              <div class="colore-carta3 card-body">
                <h5 class="card-title">Titulo del articulo</h5>
                <p class="card-text">Contenido del articulo.</p>
				<a href="#" class="btn btn-primary">Más</a>
			  </div>
            </div>
            <br>
          <?php endfor ?>
        </div>

        <div class="col-sm-1">

        </div>
          <div class="col-sm-7">
            <br><br>
            <?php foreach ($idPost as $lisId) { ?>
              <div class="card border-secondary">
                <div class="colore-carta card-body">
                  <h5 class="card-title"><?php echo $lisId['title']?></h5>
                  <p class="colore-carta3 card-text"><?php echo $lisId['description']?></p>
                  <form method="post" action="articulo.php"> 
                    <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisId['id']; ?>" />
                    <input type="submit" name="accion" value="Ver más..." class="btn btn-primary mt-3"/>
                  </form>
                  <img src="<?php echo substr($lisId['image'],0) ?>" class="card-img-bottom" alt="...">
                </div>
              </div>
              <br>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>
  <br><br><br>

	<!-- Footer/Pie de pagina -->

      <footer class="py-3 my-4">
        <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">&copy; {{< year >}} Company, Inc</p>
        </div>
      </footer>
  <script type="text/javascript" src="../js/menu.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
</body>
</html>
