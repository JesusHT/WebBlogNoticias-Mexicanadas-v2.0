<?php require 'includes/database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link href="resources/css/estilosgeneral.css" rel="stylesheet">
    <link href="resources/imagenes/favicon.ico" rel="icon">
    <title>Mexicanadas</title>
</head>
<body>
    <!-- Barra de navegación -->
    <header>
    <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light fixed-top navbar-custom">
            <div class="container-fluid" id="menu"></div>
        </nav>
    </header>
    <!-- Contenido -->
    <div class="container-xl">
        <div class="row">
            <div class="p-2 p-md-3 mb-2 text-white rounded bg-">
                <p class="textcoloraized">N O T I C I A S</p>
            </div>      
        </div>
    </div>
    <div class="container-sm">
        <div class="row justify-content-md-center">
            <div class="col-auto col-md-4 mb-3"> <!-- Primera columna-->
                <nav class="navbar navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded border border-secondary"> <!-- Aqui se pone el buscador -->
                    <div class="container-fluid">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                </nav>
                <div class="colore-carta3 card border border-secondary"> <!-- Aqui se pone la tarjeta de autor -->
                    <img src="resources/imagenes/nosotros.png" class="card-img-top border border-5" alt="...">
                    <div class="colore-carta3 card-body">
                        <h5 class="card-title">¡NOSOTROS SOMOS!</h5>
                        <p class="card-text"><small class="text-muted">C R E A D O R E S</small></p>
                        <p class="card-text">Nosotros somos el equipo de Mexicanadas.</p>
                        <a href="../php/creadores.php" class="btn btn-primary">Más</a>
                    </div>
                </div>
                <div class="card border-secondary mt-2 mb-2">
                    <div class="colore-carta3 card-body">
                        <h5 class="card-title">¡Contactanos!</h5>
                        <p class="card-text">Ponte en contacto con los creadores de la página.</p>
                        <a href="../php/contacto.php" class="btn btn-primary">Contactar</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"> <!-- segunda columna--></div>
            <div class="col-sm-7 mb-2"> <!-- tercera columna-->
                <?php
                    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
                    $numPosts = "SELECT id, title, autor, description, created_at, image FROM post WHERE id=1 ORDER BY id ASC limit 0,2";
                    $consulta= $conn->query($numPosts);
                    $idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
                ?>
                <?php foreach ($idPost as $lisId) { ?>
                    <div class="card border-secondary mb-2">
                        <img src="<?php echo substr($lisId['image'],0) ?>" class="imgs">
                        <div class="colore-carta3 card-body">
                            <div class="card-title fw-bold"><?php echo $lisId["created_at"]?></div>
                            <h5><div class="card-title fw-bold"><?php echo $lisId["title"]?></div></h5>
                            <h5><div class="card-title fw-bold fs-6">Autor: <?php echo $lisId["autor"]?></div></h5>
                            <p class="card-text"><?php echo $lisId["description"]?></p>
                            <form method="post" action="articulo.php"> 
                                <input type="hidden" name="txtid" id="txtid" value="<?php echo $lisId['id']; ?>" />
                                <input type="submit" name="accion" value="Ver más..." class="btn btn-primary mt-3"/>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Pie de pagína -->
    <footer class="py-3 my-4">
        <div class="container">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
        <p class="text-center text-muted">&copy; Company, Inc</p>
        </div>
    </footer>
    <!-- Scripts -->
    <script type="text/javascript" src="resources/js/menu.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>
</html>