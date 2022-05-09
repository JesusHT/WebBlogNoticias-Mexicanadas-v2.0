<?php require 'includes/database.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/bootstrap.min.css">
    <link href="resources/css/estilosgeneral.css" rel="stylesheet">
    <link href="resources/assets/favicon.ico" rel="icon">
    <title>Mexicanadas</title>
</head>
<body>
    <!-- Barra de navegación fixed navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img class="img-fluid d-block mx-auto" style="width: 25pc" src="resources/assets/articuloblogrecorte.png">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll nav mb-3" id="pills-tab" role="tablist" style="--bs-scroll-height: 100px;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" href="#">General</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-politica-tab" data-bs-toggle="pill" data-bs-target="#pills-politica" type="button" role="tab" aria-controls="pills-politica" aria-selected="true" href="#">Politica</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-tecnologia-tab" data-bs-toggle="pill" data-bs-target="#pills-tecnologia" type="button" role="tab" aria-controls="pills-tecnologia" aria-selected="true" href="#">Tecnología</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-deportes-tab" data-bs-toggle="pill" data-bs-target="#pills-deportes" type="button" role="tab" aria-controls="pills-deportes" aria-selected="true" href="#">Deportes</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-cultura-tab" data-bs-toggle="pill" data-bs-target="#pills-cultura" type="button" role="tab" aria-controls="pills-cultura" aria-selected="true" href="#">Cultura</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-creadores-tab" data-bs-toggle="pill" data-bs-target="#pills-creadores" type="button" role="tab" aria-controls="pills-creadores" aria-selected="true" href="#">Creadores</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-contacto-tab" data-bs-toggle="pill" data-bs-target="#pills-contacto" type="button" role="tab" aria-controls="pills-contacto" aria-selected="true" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Contenido -->
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="container-xl">
                <div class="row">
                    <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">N O T I C I A S</p></div>      
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
                            <img src="resources/assets/nosotros.png" class="card-img-top border border-5" alt="...">
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
        </div>
        <div class="tab-pane fade" id="pills-politica" role="tabpanel" aria-labelledby="pills-politica-tab">
            <?php
                $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=1 AND status=1 ORDER BY id ASC limit 0,4 ";
                $consulta= $conn->query($numPosts);
                $idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
            <div class="container-xl">
                <div class="row">
                    <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">P O L I T I C A</p></div>      
                </div>
            </div>
            <div class="container-sm mb-4">
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
                            <div class="card shadow-sm bg-body rounded border border-secondary mb-2">
                                <img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
                                <div class="colore-carta3 card-body">
                                    <h5 class="card-title">Titulo del articulo</h5>
                                    <p class="card-text">Contenido del articulo.</p>
                                    <a href="#" class="btn btn-primary">Más</a>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <?php foreach ($idPost as $lisId) { ?>
                            <div class="card border-secondary mt-4 mb-2">
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-tecnologia" role="tabpanel" aria-labelledby="pills-tecnologia-tab">
            <?php
                $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=2 AND status=1 ORDER BY id ASC limit 0,4 ";
                $consulta= $conn->query($numPosts);
                $idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
            <div class="container-xl">
                <div class="row">
                    <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">T E C N O L O G Í A</p></div>      
                </div>
            </div>
            <div class="container-sm mb-4">
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
                            <div class="card shadow-sm bg-body rounded border border-secondary mb-2">
                                <img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
                                <div class="colore-carta3 card-body">
                                    <h5 class="card-title">Titulo del articulo</h5>
                                    <p class="card-text">Contenido del articulo.</p>
                                    <a href="#" class="btn btn-primary">Más</a>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <?php foreach ($idPost as $lisId) { ?>
                            <div class="card border-secondary mt-4 mb-2">
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-deportes" role="tabpanel" aria-labelledby="pills-deportes-tab">
            <?php
                $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=3 AND status=1 ORDER BY id ASC limit 0,4 ";
                $consulta= $conn->query($numPosts);
                $idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
            <div class="container-xl">
                <div class="row">
                    <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">D E P O R T E S</p></div>      
                </div>
            </div>
            <div class="container-sm mb-4">
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
                            <div class="card shadow-sm bg-body rounded border border-secondary mb-2">
                                <img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
                                <div class="colore-carta3 card-body">
                                    <h5 class="card-title">Titulo del articulo</h5>
                                    <p class="card-text">Contenido del articulo.</p>
                                    <a href="#" class="btn btn-primary">Más</a>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <?php foreach ($idPost as $lisId) { ?>
                            <div class="card border-secondary mt-4 mb-2">
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-cultura" role="tabpanel" aria-labelledby="pills-cultura-tab">
            <?php
                $numPosts = "SELECT id, title, description, image  FROM post WHERE category_id=4 AND status=1 ORDER BY id ASC limit 0,4 ";
                $consulta= $conn->query($numPosts);
                $idPost= $consulta->fetchAll(\PDO::FETCH_ASSOC);
            ?>
            <div class="container-xl">
                <div class="row">
                    <div class="p-2 p-md-3 mb-2 text-white rounded bg- mt-3"><p class="textcoloraized">C U L T U R A</p></div>      
                </div>
            </div>
            <div class="container-sm mb-4">
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
                            <div class="card shadow-sm bg-body rounded border border-secondary mb-2">
                                <img class="card-img-top" src="https://www.elfinanciero.com.mx/resizer/kgNM8XLpTdoJxt3kF5qvXksqQ9s=/400x225/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/elfinanciero/MG7PQV7DNVDG5PPBCSUPR5MCHY.jpeg">
                                <div class="colore-carta3 card-body">
                                    <h5 class="card-title">Titulo del articulo</h5>
                                    <p class="card-text">Contenido del articulo.</p>
                                    <a href="#" class="btn btn-primary">Más</a>
                                </div>
                            </div>
                        <?php endfor ?>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        <?php foreach ($idPost as $lisId) { ?>
                            <div class="card border-secondary mt-4 mb-2">
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
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-creadores" role="tabpanel" aria-labelledby="pills-creadores-tab">
            <div class="container-sm mt-5 mb-5">
                <div class="row">
                    <div class="col-sm-12 col-md-8">  <!-- Segunda columna --> 
                        <div class="card text-dark bg-light mb-3 border border-secondary"> <!-- Aqui se pone el articulo principal -->
                            <div class="colore-carta card-body">
                                <h5 class="card-title">¡NOSOTROS SOMOS!</h5>
                                <p class="card-text"><small class="text-muted">Facultad de ingenieria electromecanica - Ingenieria en Software</small></p>
                                <p class="colore-carta2 card-text shadow p-3 mb-5 bg-body rounded">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum, elit id bibendum maximus, eros nibh accumsan velit, vitae finibus ante quam eget augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat, mi eu porttitor porttitor, purus nisl iaculis felis, nec faucibus libero nunc sed nulla. Nunc est urna, eleifend sed pulvinar ut, is ante non velit tempor rutrum. Nam porta metus est, quis euismod magna congue.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum, elit id bibendum maximus, eros nibh accumsan velit, vitae finibus ante quam eget augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat, mi eu porttitor porttitor, purus nisl iaculis felis, nec faucibus libero nunc sed nulla. Nunc est urna, eleifend sed pulvinar ut, is ante non velit tempor rutrum. Nam porta metus est, quis euismod magna congue.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum, elit id bibendum maximus, eros nibh accumsan velit, vitae finibus ante quam eget augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat, mi eu porttitor porttitor, purus nisl iaculis felis, nec faucibus libero nunc sed nulla. Nunc est urna, eleifend sed pulvinar ut, is ante non velit tempor rutrum. Nam porta metus est, quis euismod magna congue.
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum, elit id bibendum maximus, eros nibh accumsan velit, vitae finibus ante quam eget augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat, mi eu porttitor porttitor, purus nisl iaculis felis, nec faucibus libero nunc sed nulla. Nunc est urna, eleifend sed pulvinar ut, is ante non velit tempor rutrum. Nam porta metus est, quis euismod magna congue.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla bibendum, elit id bibendum maximus, eros nibh accumsan velit, vitae finibus ante quam eget augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam volutpat, mi eu porttitor porttitor, purus nisl iaculis felis, nec faucibus libero nunc sed nulla. Nunc est urna, eleifend sed pulvinar ut, is ante non velit tempor rutrum. Nam porta metus est, quis euismod magna congue.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto col-md-4 mb-2"> <!-- Tercera columna -->
                        <div class="colore-carta3 card border border-secondary"> <!-- Aqui se pone la tarjeta de autor -->
                            <img src="resources/assets/nosotros.png" class="card-img-top border border-5" alt="...">
                            <div class="card-body"><p class="card-text"><small class="text-muted">Creadores</small></p></div>
                        </div>
                        <div class="colore-carta3 card border-secondary">
                            <div class="card-body">
                                <h5 class="card-title">¡Contactanos!</h5>
                                <p class="card-text">Ponte en contacto con los creadores de la página.</p>
                                <a href="#" class="btn btn-primary">Contactar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contacto" role="tabpanel" aria-labelledby="pills-contacto-tab">ggg</div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="resources/js/menu.js"></script>
    <script src="resources/js/bootstrap.bundle.min.js"></script>
</body>
</html>